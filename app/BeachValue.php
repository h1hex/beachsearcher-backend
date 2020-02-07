<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeachValue extends Model
{
    protected $fillable = [
        'beach_id', 'param_id', 'int', 'date', 'boolean', 'string', 'point', 'double'
    ];

    public function param() {
        return $this->belongsTo('App\BeachParam');
    }

    public function beach() {
        return $this->belongsTo('App\Beach');
    }
}
