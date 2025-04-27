<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TripRoute;

class AllTripRoutes extends Component
{


    public $search;
    public $min_amount  ,  $max_amount; 
    
    

    public function  mount(){
        
    }
    public function render()
    {

        

        $trip_routes = TripRoute::when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'start_location',
                    'like',
                    '%' . $this->search . '%'
                )

                ->orWhere(
                    'end_location',
                    'like',
                    '%' . $this->search . '%'
                )
                
                
                ;


        })

        

        ->when($this->min_amount && $this->max_amount, function ($q) {
            $q->whereBetween('amount', [$this->min_amount, $this->max_amount]);
        })
        
            ->paginate(10);


        return view('livewire.all-trip-routes' , compact('trip_routes'))
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
