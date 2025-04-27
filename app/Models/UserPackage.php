<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $fillable = ['total_amount', 'no_of_person','user_id','package_id'];

    public function package(){
        return $this->belongsTo(Package::class);
    }
    
}
