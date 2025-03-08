<?php

namespace App\Livewire;

use App\Models\Package;
use App\Models\TripRoute;
use App\Models\Vehicle;
use App\VehicleType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class TripRouteDetails extends Component
{
    use WithFileUploads;

    public $trip_route;

    public $imagePreview;

    public $name;

    public $vehicle_type;

    public $amount;

    public $start_location;

    public $end_location;

    public $image;

    public $vehicleTypes;

    public $selectedVehicleType;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'vehicle_type' => 'required|integer',
            // 'vehicle_type' => ['required', 'string', Rule::in(VehicleType::values())], // Check if vehicle_type is a valid enum value

            'amount' => 'required|numeric',
            'start_location' => 'required|string',
            'end_location' => 'required|string',
            'image' => 'nullable|image|max:1024', // Optional, 1MB max
        ];
    }

    // Load trip_route for edit
    // public function mount($trip_route_id = null)

    // {

    //     if ($trip_route_id) {
    //         $trip_route = TripRoute::find($trip_route_id);
    //         $this->trip_route = $trip_route;
    //         $this->name = $trip_route->name;
    //         // $this->vehicle_type =    VehicleType::getValueFromKeyword($trip_route->vehicle_type);
    //         $this->vehicle_type =   VehicleType::getCaseByValue($trip_route->vehicle_type);

    //         // $this->vehicle_type =  VehicleTy ;
    //         $this->amount = $trip_route->amount;
    //         $this->start_location = $trip_route->start_location;
    //         $this->end_location = $trip_route->end_location;
    //         $this->imagePreview = $trip_route->image; // Load existing image
    //     }
    //     $this->vehicleTypes = VehicleType::cases();
    // }

    public function mount($trip_route_id = null)
    {
        if ($trip_route_id) {
            $trip_route = TripRoute::find($trip_route_id);
            $this->trip_route = $trip_route;
            $this->name = $trip_route->name;

            // Set the vehicle_type as a string
            $this->vehicle_type = $trip_route->vehicle_type;

            $this->amount = $trip_route->amount;
            $this->start_location = $trip_route->start_location;
            $this->end_location = $trip_route->end_location;
            $this->imagePreview = $trip_route->image; // Load existing image
        }
        $this->vehicleTypes = VehicleType::cases();
    }

    public function save()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'vehicle_type' => $this->vehicle_type, // Ensure this is a string
            'amount' => $this->amount,
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,
        ];


        if ($this->image) {

            if ($this->trip_route && $this->trip_route->image) {
                $existingImagePath = str_replace('/storage/', '', $this->trip_route->image);
                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
            }

            $data['image'] = $this->image->store('vehicle_images', 'public');
        }else{
            $data['image'] = null ;
        }


        if ($this->trip_route) {
            $this->trip_route->update($data);
        } else {
            TripRoute::create($data);
        }

        // Reset form
        $this->reset();

        return redirect()->route('trips_routes');
    }

    public function updatedImage()
    {
        // Update the image preview when the user selects a new image
        if ($this->image) {
            $this->imagePreview = $this->image->temporaryUrl();
        }
    }



    public function removeImage()
    {
        // Reset the image and the preview
        $this->image = null;
        $this->imagePreview = null;
    }

    public function render()
    {

        return view('livewire.trip-route-details');
    }
}
