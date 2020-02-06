<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = ['beach_id', 'feels_like', 'temp_min', 'temp_max', 'date', 'temp_water', 'weather_icon', 'weather_desc', 'sig_height_m'];
}
