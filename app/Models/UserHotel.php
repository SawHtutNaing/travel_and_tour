<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHotel extends Model
{

    protected $fillable = ['total_amout', 'start_date','end_date','user_id','hotel_id'];
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
