<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hotel;

class AllHotels extends Component
{
    // use WithPagination;

  
    public $search = '';
    

    public $min_amount  ,  $max_amount; 
 
    
    
   
    public function render()
    {
        $hotels = Hotel::when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'location',
                    'like',
                    '%' . $this->search . '%'
                )
                
                
                ;


        })

        ->when($this->min_amount && $this->max_amount, function ($q) {
            $q->whereBetween('amount_per_day', [$this->min_amount, $this->max_amount]);
        })
        
            ->paginate(10);
       

        
        

        return view('livewire.all-hotels' , compact('hotels'))
        ->extends('layouts.master')
        ->section('content')
        ;
    }



}   