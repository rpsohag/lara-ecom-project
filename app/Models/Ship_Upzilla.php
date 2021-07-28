<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Upzilla extends Model
{
    use HasFactory;

    
    public function thana(){
        return $this->hasMany(Ship_Upzilla::class, 'thana_id','id');
    }
}
