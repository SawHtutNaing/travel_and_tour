<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PackageManagement extends Component
{

    public $search;

    public $search_kw;

    public function filter()
    {

        $this->search = $this->search_kw;
    }


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
        $packages = Package::query()
        ->
        when($this->search_kw, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

               ;
        })
        ->paginate(20);

        return view('livewire.package-management', compact('packages'));
    }
}
