<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PackageManagement extends Component
{
    public function delete(Package $package)
    {
        $existingImagePath =
            str_replace('/storage/', '', $package->image);

        if (Storage::disk('public')->exists($existingImagePath)) {
            Storage::disk('public')->delete($existingImagePath);
        }

        $package->delete();
        $this->render();
    }



    public function render()
    {
        $packages = Package::query()->paginate(20);

        return view('livewire.package-management', compact('packages'));
    }
}
