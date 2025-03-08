<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Package extends Model
{
    protected $fillable = ['name', 'description', 'start_location', 'end_location', 'image', 'total_amount'];

    public function getImageAttribute($value)
    {

        return $value ? Storage::url($value) : asset('default/hotel_default.jpg');
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'package_hotels')
            ->withPivot(['days', 'start_date', 'end_date', 'amount', 'actual_amount'])
            ->withTimestamps();
    }


    public function tripRoutes()
    {
        return $this->belongsToMany(TripRoute::class, 'package_trip_routes')
            ->withPivot(['amount','date'])
            ->withTimestamps();
    }



    public function package_hotels()
    {
        return $this->hasMany(PackageHotel::class);
    }

    public function package_trip_routes(){
        return $this->hasMany(PackageTripRoute::class);
    }




}
