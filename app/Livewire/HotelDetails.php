<?php

namespace App\Livewire;

use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class HotelDetails extends Component
{
    use WithFileUploads;

    public $hotel_id;

    public $hotel_name;

    public $hotel_location;

    public $amount_per_day;

    public $hotel_image;

    public $imagePreview; // Temporary preview
    public $price_adjustment, $adjustment_type;
    // Load hotel for edit
    public $hotel;

    public function mount($hotelId = null)
    {
        $hotel = Hotel::find($hotelId);
        if ($hotel) {
            $this->hotel = $hotel;
            $this->hotel_id = $hotel->id;
            $this->hotel_name = $hotel->name;
            $this->hotel_location = $hotel->location;
            $this->amount_per_day = $hotel->amount_per_day;
            $this->imagePreview = $hotel->image; // Load existing image
            $hotel->disableAdjustmentTypeAccessor = true;
            $this->price_adjustment = $hotel->price_adjustment;
            $this->adjustment_type = $hotel->adjustment_type;
        }
    }

    public function updatedHotelImage()
    {
        if ($this->hotel_image) {
            $this->imagePreview = $this->hotel_image->temporaryUrl();
        }
    }

    public function removeImage()
    {
        $this->hotel_image = null;
        $this->imagePreview = null;
    }

    public function save()
    {

        $validated = $this->validate([
            'hotel_name' => 'required|string|max:255',
            'hotel_location' => 'required|string',
            'amount_per_day' => 'required|numeric|min:0',
            'price_adjustment' => 'required|numeric|min:0',
            'adjustment_type' => 'required',

            'hotel_image' => $this->hotel_id ? 'nullable|image|max:2048' : 'nullable|image|max:2048',

        ]);

        // if ($this->hotel_image) {
        //     $this->hotel_image = $this->hotel_image->store('hotel_images', 'public');
        // }


        if ($this->hotel_image) {
            // If there's a new image uploaded, check if there's an existing image and remove it
            if ($this->hotel_id) {

                $existingImagePath =
                    str_replace('/storage/', '', $this->hotel->image);

                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
            }

            // Store the new image and get its path
            $this->hotel_image = $this->hotel_image->store('hotel_images', 'public');
        } elseif (! $this->hotel_id) {
            // If the hotel is being created and no image is provided, add validation error
            // $this->addError('hotel_image', 'The hotel image is required.');
            $this->hotel_image  = null;

            // return;
        } else {

            $this->hotel_image = str_replace('/storage/', '', $this->imagePreview);
        }

        // If updating
        if ($this->hotel_id) {
            $hotel = Hotel::findOrFail($this->hotel_id);
            $hotel->update([
                'name' => $this->hotel_name,
                'location' => $this->hotel_location,
                'amount_per_day' => $this->amount_per_day,
                'image' => $this->hotel_image,
                'price_adjustment' => $this->price_adjustment,
                'adjustment_type' => $this->adjustment_type,

            ]);
        } else {
            // If creating new
            Hotel::create([
                'name' => $this->hotel_name,
                'location' => $this->hotel_location,
                'amount_per_day' => $this->amount_per_day,
                'image' => $this->hotel_image,
                'price_adjustment' => $this->price_adjustment,
                'adjustment_type' => $this->adjustment_type,


            ]);
        }

        // Clear form after save
        $this->reset(['hotel_id', 'hotel_name', 'hotel_location', 'amount_per_day', 'hotel_image', 'imagePreview']);
        redirect()->route('hotels');
    }

    public function render()
    {
        return view('livewire.hotel-details');
    }
}
