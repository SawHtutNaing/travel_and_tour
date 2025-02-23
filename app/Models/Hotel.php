<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    protected $fillable = ['name', 'location', 'image', 'amount_per_day', 'price_adjustment', 'adjustment_type'];

    public function getImageAttribute($value)
    {

        return $value ? Storage::url($value) : asset('default/hotel_default.jpg');
    }

    public function getAdjustmentTypeAttribute($value)
    {

        if ($this->disableAdjustmentTypeAccessor) {
            return $this->attributes['adjustment_type']; // Return raw value from DB
        }

        return $value == 1 ? 'Discount' : 'Mark Up';
    }

    //enucu
}
