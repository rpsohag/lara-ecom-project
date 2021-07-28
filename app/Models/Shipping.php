<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo('App\Models\Ship_Country', 'country_id');
    }
    public function division()
    {
        return $this->belongsTo('App\Models\Ship_Division', 'division_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\Ship_District', 'district_id');
    }
    public function thana()
    {
        return $this->belongsTo('App\Models\Ship_Upzilla', 'thana_id');
    }
}
