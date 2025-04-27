<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Package;
class AllPackage extends Component
{

    
    public $search;
    public function mount(){

        
    }
    public function render()
    {

        $packages = Package::when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'description',
                    'like',
                    '%' . $this->search . '%'
                )
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
            ->paginate(10);;


        return view('livewire.all-package' , compact('packages'))
        
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
