<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'cost_id' , 'destination_city', 'destination_country', 'origin_city', 'origin_country', 'destination', 'transport_type', 'included_all_city', 'is_special'];

    public function setOriginCityAttribute($originCity)
    {
        $this->attributes['origin_city'] = $originCity;
        $this->attributes['origin'] = request()->origin_country . request()->origin_city;
    }

    public function setDestinationCityAttribute($destinationCity)
    {
        $this->attributes['destination_city'] = $destinationCity;
        $this->attributes['destination'] =  request()->destination_country . request()->destination_city;
    }
}
