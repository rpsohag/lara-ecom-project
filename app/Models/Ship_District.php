<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_District extends Model
{
    use HasFactory;

    public function district(){
        return $this->hasMany(Ship_District::class, 'district_id','id');
    }
}
