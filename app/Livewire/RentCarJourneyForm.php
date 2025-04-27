<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VehicleRent;
use App\Models\JourneyRoute;


class RentCarJourneyForm extends Component
{

    public $vehiclesRent ;
    public $journeys;
    public $vehicle_id;
    public $journey_id;
    public $user ;
    public $total_amount;


public $rent_car_journey_id;
    public function mount($rent_car_journey_id = null )
    {
        $this->user = auth()->user();
        $this->vehiclesRent = VehicleRent::all();
        $this->journeys = JourneyRoute::all();

        if($rent_car_journey_id) {
            $rent_car_journey = $this->user->my_car_rent_journy()->find($rent_car_journey_id);
            if($rent_car_journey) {
                $this->rent_car_journey_id = $rent_car_journey->id;
                $this->vehicle_id = $rent_car_journey->vehicle_rent_id;
                $this->journey_id = $rent_car_journey->journey_route_id;
                $this->total_amount = $rent_car_journey->total_amount;
            } else {
                $this->rent_car_journey_id = null;
                $this->vehicle_id = null;
                $this->journey_id = null;
                $this->total_amount = 0;
            }
        } else {
            $this->rent_car_journey_id = null;
        }


    }

    public function render()
    {
        return view('livewire.rent-car-journey-form')
        ->extends('layouts.master')
        ->section('content')
        ;
    }

    public function submit()
    {
        $this->validate([
            'vehicle_id' => 'required',
            'journey_id' => 'required',
        ]);

        $this->user->rentCarJourneys()->create([
            'vehicle_rent_id' => $this->vehicle_id,
            'journey_route_id' => $this->journey_id,
            'total_amount' => $this->total_amount,
            'total_km' => $this->journeys->find($this->journey_id)->distance,
            'user_id' => $this->user->id,
        ]);

        session()->flash('message', 'Journey created successfully.');
        return redirect()->route('user.trip_route_all');
    }

    public function updated($propertyName)
    {
        if($propertyName == 'vehicle_id' || $propertyName == 'journey_id') {
            if($this->vehicle_id && $this->journey_id) {

                $this->total_amount = $this->vehiclesRent->find($this->vehicle_id)->amount_per_km * $this->journeys->find($this->journey_id)->distance;
            }
        }
    }



}
