<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTripRoutes extends Model
{
   protected $fillable = ['user_id','trip_route_id','rent_date'];


   public function tripRoute()
   {
       return $this->belongsTo(TripRoute::class, 'trip_rotue_id');
   }
}
