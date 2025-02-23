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
}
