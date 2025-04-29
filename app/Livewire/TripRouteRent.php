<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserTripRoutes;
use App\Models\TripRoute;

class TripRouteRent extends Component
{


    public $rent_date ;
    public $trip_route;
    public function mount( TripRoute $trip_route )
{
$this->trip_route = $trip_route;

}
    public function tripRouteRent(){

        $this->validate([
            'rent_date' => 'required|date',
        ]);

        UserTripRoutes::create([
            'rent_date' => $this->rent_date ,
            'user_id' => auth()->id(),
            'trip_route_id' => $this->trip_route->id
        ]);

        return redirect()->route('user.trip_rotues');
    }

    public function render()
    {
        return view('livewire.trip-route-rent')

        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
