<?php

namespace App\Livewire;

use App\Models\TripRoute;
use App\VehicleType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TripRouteManagement extends Component
{
    public $search;

    public $search_kw;

    public $selectedVehicleType;

    public $SearchselectedVehicleType;

    public $vehicleTypes;

    public function mount()
    {
        $this->vehicleTypes = VehicleType::cases();
    }

    public function filter()
    {

        $this->search = $this->search_kw;
        $this->selectedVehicleType = $this->SearchselectedVehicleType;
    }

    public function delete(TripRoute $trip_route)
    {

        $existingImagePath =
            str_replace('/storage/', '', $trip_route->image);

        if (Storage::disk('public')->exists($existingImagePath)) {
            Storage::disk('public')->delete($existingImagePath);
        }

        $trip_route->delete();
        $this->render();
    }

    public function render()
    {
        $trip_routes = TripRoute::when($this->search_kw, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'start_location',
                    'like',
                    '%' . $this->search . '%'
                )
                ->orWhere(
                    'end_location',
                    'like',
                    '%' . $this->search . '%'
                );
        })
            ->when($this->selectedVehicleType, function ($q) {

                $q->where('vehicle_type', $this->selectedVehicleType);
            })

            ->paginate(10);

        return view('livewire.trip-routes-management', compact('trip_routes'));
    }
}
