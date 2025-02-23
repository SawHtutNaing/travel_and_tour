<?php

namespace App\Livewire;

use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackageDetails extends Component
{
    use WithFileUploads;

    public $package_id;

    public $name;

    public $description;

    public $start_location;

    public $end_location;

    public $total_amount;

    public $image;

    public $imagePreview; // Temporary preview

    public $package;

    public function mount($packageId = null)
    {

        $package = Package::find($packageId);
        if ($package) {
            $this->package = $package;
            $this->package_id = $package->id;
            $this->name = $package->name;
            $this->description = $package->description;
            $this->start_location = $package->start_location;
            $this->end_location = $package->end_location;
            $this->total_amount = $package->total_amount;
            $this->imagePreview = $package->image; // Load existing image

        }
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required',
        'start_location' => 'required|string|max:255',
        'end_location' => 'required|string|max:255',
        'total_amount' => 'required|numeric|min:0',
    ];

    public function render()
    {
        return view('livewire.package-details');
    }

    public function create()
    {
        $this->resetInputFields();
    }

    public function updatedImage()
    {

        // Update the image preview when the user selects a new image
        if ($this->image) {
            $this->imagePreview = $this->image->temporaryUrl();
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description, // Ensure this is a string
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,

            'total_amount' => $this->total_amount,
            'image' => $this->package_id ? 'nullable|image|max:2048' : 'required|image|max:2048',



        ];

        // Handle image update or removal
        if ($this->image) {
            if ($this->package && $this->package->image) {
                $existingImagePath = str_replace('/storage/', '', $this->package->image);
                if (Storage::disk('public')->exists($existingImagePath)) {
                    Storage::disk('public')->delete($existingImagePath);
                }
            }
            // Store the new image
            $data['image'] = $this->image->store('package_images', 'public');
        } elseif ($this->package && $this->package->image) {

            // If no new image, keep the existing image

            if (!$this->image) {
                $data['image'] = null;
            }

            // $data['image']  = str_replace('/storage/', '', $this->package->image);
        }

        if ($this->package) {
            $this->package->update($data);
        } else {
            Package::create($data);
        }

        // Reset form
        $this->reset();

        return redirect()->route('packages');
    }

    public function removeImage()
    {
        // Reset the image and the preview
        $this->image = null;
        $this->imagePreview = null;
    }
}
