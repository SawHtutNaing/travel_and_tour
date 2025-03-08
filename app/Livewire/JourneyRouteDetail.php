<?php

namespace App\Livewire;

use App\Models\JourneyRoute;
use Livewire\Component;

class JourneyRouteDetail extends Component
{



    public  $point_one , $point_two , $distance ;
public $journey_route;
    public function mount($id = null)
    {
        $journey_route = JourneyRoute::find($id);
        if ($journey_route) {
            $this->journey_route = $journey_route;
            $this->point_one = $journey_route->point_one;
            $this->point_two = $journey_route->point_two;
            $this->distance = $journey_route->distance;


        }
    }

    public function save()
    {

        $validated = $this->validate([
            'point_one' => 'required|string|max:255',
            'point_two' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
        ]);

        if ($this->journey_route) {
            $journey_route = JourneyRoute::findOrFail($this->journey_route->id);
            $journey_route->update([
                'point_one' => $this->point_one,
                'point_two' => $this->point_two,
                'distance' => $this->distance,



            ]);
        } else {
            // If creating new
            JourneyRoute::create([
                'point_one' => $this->point_one,
                'point_two' => $this->point_two,
                'distance' => $this->distance,


            ]);
        }

        // Clear form after save
        $this->reset(['point_one', 'point_two', 'distance']);
        redirect()->route('admin.journey_routes');
    }








    public function render()
    {
        return view('livewire.journey-route-detail');
    }
}
