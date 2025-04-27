<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentCarJourney extends Model
{
    //
    protected $fillable = [
        'user_id',
        'journey_route_id',
        'vehicle_rent_id',
        'total_amount' ,
        'total_km'
    ];



    public function journey_route(){
        return $this->belongsTo(JourneyRoute::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->belongsTo(VehicleRent::class , 'vehicle_rent_id' , 'id');
    }

public function getUserAttribute(){
    return $this->user()->first()->name;

}


public function getJourneyRouteAttribute(){
    return $this->journey_route()->first()->point_one . ' - ' . $this->journey_route()->first()->point_two;
}

public function getCarAttribute(){
    return $this->car()->first()->name;


}

public function vehicleRent(){
    return $this->belongsTo(VehicleRent::class , 'vehicle_rent_id' , 'id');
}

public function journeyRouteRs(){
    return $this->belongsTo(JourneyRoute::class , 'journey_route_id' , 'id');
}
}
