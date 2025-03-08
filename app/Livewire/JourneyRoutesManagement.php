<?php

namespace App\Livewire;

use App\Models\JourneyRoute;
use Livewire\Component;

class JourneyRoutesManagement extends Component
{

    public $search;

    public $search_kw;

    public function filter()
    {

        $this->search = $this->search_kw;
    }


    public function delete(JourneyRoute $journeyRoute)
    {




        $journeyRoute->delete();
        $this->render();
    }



    public function render()
    {

        $journey_routes = JourneyRoute::when($this->search_kw, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')

                ->orWhere(
                    'location',
                    'like',
                    '%' . $this->search . '%'
                );
        })
            ->paginate(10);



        return view('livewire.journey-routes-management' , compact('journey_routes'));
    }
}
