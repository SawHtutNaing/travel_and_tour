<?php

namespace App\Livewire;

use Livewire\Component;

class RentCarJourney extends Component
{

    public function  mount($trip_route)
    {
        dd($trip_route);
    }
    public function render()
    {
        return view('livewire.rent-car-journey')
        ->extends('layouts.master')
        ->section('content')
        ;

    }
}
