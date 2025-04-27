<?php

namespace App\Livewire;

use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class HotelManagement extends Component
{
    public $search;

    public $search_kw;

    public function filter()
    {

        $this->search = $this->search_kw;
    }

    public function delete(Hotel $hotel)
    {

        $existingImagePath =
            str_replace('/storage/', '', $hotel->image);

        if (Storage::disk('public')->exists($existingImagePath)) {
            Storage::disk('public')->delete($existingImagePath);
        }
        $hotel->delete();
        $this->render();
    }

    public function mount() {}

    public function render()
    {



        $hotels = Hotel::
        when($this->search_kw, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'location',
                    'like',
                    '%' . $this->search . '%'
                );
        })
            ->paginate(10);

        return view(
            'livewire.hotel-management',
            [
                'hotels' => $hotels,
            ]

        );
    }
}
