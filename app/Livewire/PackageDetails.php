<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Package;
use App\Models\Hotel;
use App\Models\PackageHotel;
use App\Models\PackageTripRoute;
use App\Models\TripRoute;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class PackageDetails extends Component
{
    use WithFileUploads;

    public $package_id, $name, $description, $start_location, $end_location, $total_amount, $image, $imagePreview;
    public $package;

    // Multi-Hotel Selection
    public $hotels = [];
    public $tripRoutes = [];
    public $hotelDetails = [];
    public $tripRouteDetails = [];

    public $allTripRoutes;
    public function mount($packageId = null)
    {

        $this->allTripRoutes  = TripRoute::all();
        $package = Package::find($packageId);

        if ($package) {
            $this->package = $package;
            $this->package_id = $package->id;
            $this->name = $package->name;
            $this->description = $package->description;
            $this->start_location = $package->start_location;
            $this->end_location = $package->end_location;
            $this->total_amount = $package->total_amount;
            $this->imagePreview = $package->image;

            $this->hotels = $package->package_hotels->toArray();
            $this->tripRoutes = $package->package_trip_routes->toArray();
        }
    }

    public function addHotelRow()
    {
        $this->hotels[] = [
            'hotel_id' => '',
            'days' => '',
            'start_date' => '',
            'end_date' => '',
            'actual_amount' => '',
            'amount' => '',
        ];
    }

    public function addTripRouteRow()
    {
        $this->tripRoutes[] = [
            'trip_route_id' => '',
            'amount' => '',
            'date' => ''
        ];
    }


    public function removeTripRouteRow($index)
    {
        unset($this->tripRoutes[$index]);
        $this->tripRoutes = array_values($this->tripRoutes);
    }



    public function removeHotelRow($index)
    {
        unset($this->hotels[$index]);
        $this->hotels = array_values($this->hotels);
    }

    public function save()
    {
        // $validated = $this->validate([
        //     // 'name' => 'required|string|max:255',
        //     // 'deschotelIdription' => 'required',
        //     // 'start_location' => 'required|string|max:255',
        //     // 'end_location' => 'required|string|max:255',
        //     // 'total_amount' => 'required|numeric|min:0',
        //     // 'hotels.*' => 'nullable|exists:hotels,id',
        //     // 'hotels.*.days' => 'required|integer|min:1',
        //     // 'hotels.*.start_date' => 'required|date',
        //     // 'hotels.*.end_date' => 'required|date|after:hotels.*.start_date',
        //     // 'hotels.*.actual_amount' => 'required|numeric|min:0',
        //     // 'hotels.*.amount' => 'required|numeric|min:0',
        // ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,
            'total_amount' => $this->total_amount,
        ];

        if ($this->image) {
            if ($this->package && $this->package->image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->package->image));
            }
            $data['image'] = $this->image->store('package_images', 'public');
        }

        $package = Package::updateOrCreate(['id' => $this->package_id], $data);



        $package->hotels()->detach();

        foreach ($this->hotels as $index => $hotel) {
            PackageHotel::create([
                'package_id' => $package->id,
                'hotel_id' => $this->hotels[$index]['hotel_id'],
                'days' => $this->hotels[$index]['days'],
                'start_date' => $this->hotels[$index]['start_date'],
                'end_date' => $this->hotels[$index]['end_date'],
                'actual_amount' => $this->hotels[$index]['actual_amount'],
                'amount' => $this->hotels[$index]['amount'],
            ]);
        }

        $package->tripRoutes()->detach();

        foreach ($this->tripRoutes as $index => $hotel) {
            PackageTripRoute::create([
                'package_id' => $package->id,
                'trip_route_id' => $this->tripRoutes[$index]['trip_route_id'],
                'amount' => $this->tripRoutes[$index]['amount'],
                'date' =>  $this->tripRoutes[$index]['date'],
            ]);
        }
        $this->reset();
        return redirect()->route('admin.packages');
    }

    public function removeImage()
    {
        $this->image = null;
        $this->imagePreview = null;
    }
    public function updateHotelPrice(){
        if(count($this->hotels) > 0 ){
            foreach($this->hotels as $index => $hotel){
                if($hotel['hotel_id'] && $hotel['start_date'] && $hotel['end_date'] ){

                    $currentHotel =  Hotel::find($hotel['hotel_id'])->first();
                    $startDate = Carbon::parse($hotel['start_date']);
                    $endDate = Carbon::parse($hotel['end_date']);
                    $dayDiff = $startDate->diffInDays($endDate);

                    $this->hotels[$index]['days'] = $dayDiff;

                    $amount_per_day = $currentHotel->amount_per_day;
                    $this->hotels[$index]['actual_amount']  = $dayDiff * $amount_per_day;
                    $currentHotel->disableAdjustmentTypeAccessor = true;

                    $type = $currentHotel->adjustment_type ;

                    $price_adjustment = $currentHotel->price_adjustment ;
$totalAdjust = (int) ($price_adjustment * $dayDiff) ;
                    if($type == 1)
                    {

                        (int)$this->hotels[$index]['amount'] = $this->hotels[$index]['actual_amount'] - $totalAdjust   ;

                    }
                    if($type == 2 ){
                        (int)$this->hotels[$index]['amount'] = $this->hotels[$index]['actual_amount'] +   $totalAdjust;
                    }

                }
            }
        }
    }
    public function render()
    {
        // dd($this->hotels );
        $this->updateHotelPrice();
        return view('livewire.package-details', [
            'availableHotels' => Hotel::all(),
        ]);
    }
}
