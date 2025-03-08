<?php

namespace App\Livewire;

use App\Models\VehicleRent;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class VehicleRentManagement extends Component
{


    public $search;

    public $search_kw;


    public function delete(VehicleRent $vehicleRent)
    {

        $existingImagePath =
            str_replace('/storage/', '', $vehicleRent->image);

        if (Storage::disk('public')->exists($existingImagePath)) {
            Storage::disk('public')->delete($existingImagePath);
        }
        $vehicleRent->delete();
        $this->render();
    }



    public function filter()
    {

        $this->search = $this->search_kw;
    }

    public function render()
    {

        $vehicle_rents = VehicleRent::when($this->search_kw, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

               ;
        })
            ->paginate(10);



        return view('livewire.vehicle-rent-management' , compact('vehicle_rents'));
    }
}
