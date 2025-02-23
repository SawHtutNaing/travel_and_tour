<?php

namespace App\Models;

use App\VehicleType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TripRoute extends Model
{
    protected $fillable = ['name', 'vehicle_type', 'amount', 'start_location', 'end_location', 'image'];

    protected $casts = [
        'vehicle_type' => VehicleType::class,
    ];

    // protected function vehicleType(): Attribute
    // {

    //     return Attribute::make(
    //         get: fn($value) => VehicleType::tryFrom($value)?->label(), // Convert to string
    //         set: fn($value) => is_numeric($value) ? VehicleType::from((int) $value) : $value // Convert back to Enum
    //     );
    // }

    public function getImageAttribute($value)
    {

        return $value ? Storage::url($value) : asset('default/hotel_default.jpg');
    }
}
