<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeachParam extends Model
{
    protected $fillable = [
        'type', 'name', 'label', 'label_type', 'created_by', 'updated_by'
    ];

    public function values() {
        return $this->hasMany('App\BeachValue', 'param_id');
    }
}
