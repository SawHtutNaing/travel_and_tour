<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\UserPackage;

class PackageRegister extends Component
{
    public $no_of_person ;
    public $total_amount ;
    public $package;
    public function mount(Package $package){
        $this->package = $package;
    }

    public function updatedNoOfPerson(){
        $this->total_amount = $this->package->total_amount * $this->no_of_person;
        
    }   
    public function registerPackage(){
        UserPackage::create([
            'user_id' => auth()->id(),
            'package_id' => $this->package->id,
            'total_amount' => $this->total_amount,
            'no_of_person' => $this->no_of_person,
        ]);

        
        return redirect()->route('index');
        
    }
    public function render()
    {


        return view('livewire.package-register')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
