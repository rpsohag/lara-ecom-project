<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Country extends Model
{
    use HasFactory;

    public function country(){
        return $this->hasMany(Ship_Country::class, 'country_id','id');
    }
}
