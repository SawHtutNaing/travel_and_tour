<?php

namespace App\Livewire;

use App\Models\Hotel;
use App\Models\UserHotel;
use Livewire\Component;

class HotelBooking extends Component
{

    public $hotel ;
    public $total_amount ;
    public $start_date ;
    public $end_date;

    public function mount(Hotel $hotel){

        
        $this->hotel = $hotel;
        
    }

    public function calculateTotalAmount(){
        if($this->start_date && $this->end_date){  // Check if both dates are provided before calculating total amount.
            
            $this->total_amount = $this->hotel->amount_per_day * $this->calculateDays();
            

        }
        else{
            $this->total_amount = 0;
        }
        
    }
    public function calculateDays(){
        return (new \DateTime($this->end_date))->diff(new \DateTime($this->start_date))->days;
    }
    public function updatedStartDate($value){
        $this->calculateTotalAmount();
    }
    public function updatedEndDate($value){
        $this->calculateTotalAmount();
    }


    public function bookHotel(){
        UserHotel::create([
            'total_amout' => $this->total_amount , 
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'hotel_id' => $this->hotel->id,
            'user_id' => auth()->id()  // Assuming authenticated user is the one booking the hotel
        ]);


        $this->reset(['total_amount','start_date','end_date']);
        session()->flash('success','Hotel Booked Successfully');
        return redirect()->route('index');

    }
    public function render()
    {
        return view('livewire.hotel-booking')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
