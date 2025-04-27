<?php

namespace App\Livewire;

use App\Models\RentCarJourney;
use Livewire\Component;

class RentCarJourneyAll extends Component
{
    public $user ;


    public function mount()
    {
        $this->user = auth()->user();
        // my_car_rent_journy

    }
    public function render()
    {
        $car_rent_journy = $this->user->rentCarJourneys()
        ->with('journey_route', 'car')
        ->when($this->search_kw, function ($q) {
            $q->where(function ($q) {
                $q->orWhereHas('car', function ($q) {
                    $q->where('name', 'like', '%' . $this->search_kw . '%');
                })
                ->orWhereHas('journey_route', function ($q) {
                    $q->where('point_one', 'like', '%' . $this->search_kw . '%')
                      ->orWhere('point_two', 'like', '%' . $this->search_kw . '%');
                });
            });
        })
        ->paginate(10);

        return view('livewire.rent-car-journey-all' , compact('car_rent_journy'))
        ->extends('layouts.master')
        ->section('content')

        ;
    }
    public $search;

    public $search_kw;

    public function filter()
    {

        $this->search = $this->search_kw;

    }

    public function delete( RentCarJourney $car_rent_journy)
    {
        $car_rent_journy->delete();
        $this->render();
    }
}
