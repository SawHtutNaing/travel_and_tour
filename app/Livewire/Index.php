<?php

namespace App\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\Attributes\Layout;
use  App\Models\Package;
use  App\Models\TripRoute;


class Index extends Component
{


    public $hotels ;
    public $packages;
    public function mount(){
        $this->hotels = Hotel::inRandomOrder()->limit(4)->get();
        $this->packages =  Package::inRandomOrder()->limit(4)->get();
        $this->tripRoutes = TripRoute::inRandomOrder()->limit(4)->get();
    }
    public function render()
    {


        return view('livewire.index')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
