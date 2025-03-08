<?php

namespace App\Livewire;

use App\Models\VehicleRent;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class VehicleRentDetails extends Component
{
    public $imagePreview;
    public $image;
    use WithFileUploads;


public $name ,$amount_per_km ,$seat ;
public $vehicle ;
    public function mount($id = null)
    {
        $this->vehicle = VehicleRent::find($id);
        if ($this->vehicle) {
            $this->name = $this->vehicle->name;
            $this->amount_per_km =$this->vehicle->amount_per_km;
            $this->seat =$this->vehicle->seat;
            $this->imagePreview = $this->vehicle->image;

        }
    }


    public function updatedImage()
    {
        if ($this->image) {
            $this->imagePreview = $this->image->temporaryUrl();
        }
    }



    public function removeImage()
    {
        $this->image = null;
        $this->imagePreview = null;
    }



    public function save()
    {

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'seat' => 'required|integer',
            'amount_per_km' => 'required|numeric|min:0',
            'image' =>  'nullable|image|max:2048',

        ]);




        if ($this->image) {


            if ($this->vehicle) {

                $existingImagePath =
                    str_replace('/storage/', '', $this->vehicle->image);

                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
            }
            $this->image = $this->image ?  $this->image->store('rent_images', 'public') : null ;




        }


        // If updating
        if ($this->vehicle) {
            $vehicle = VehicleRent::findOrFail($this->vehicle->id);
            $vehicle->update([
                'name' => $this->name,
 'seat' => $this->seat ,
 'amount_per_km' => $this->amount_per_km ,
                'image' => $this->image,
            ]);
        } else {
            VehicleRent::create([
                'name' => $this->name,
                'seat' => $this->seat ,
                'amount_per_km' => $this->amount_per_km ,
                               'image' => $this->image,


            ]);
        }

     $this->reset('name' , 'seat' , 'amount_per_km','image');

        return redirect()->route('admin.vehicle-rent');
    }





    public function render()
    {
        return view('livewire.vehicle-rent-details');
    }
}
