<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beach extends Model
{
    const BEACH_STATUS_ARCHIVED = 0;
    const BEACH_STATUS_DRAFT = 9;
    const BEACH_STATUS_PUBLISHED = 10;

    protected $fillable = ['title', 'lat', 'lon',
        'pictures', 'panoramas',
        'short_description',
        'city_id', 'poi_img',
        'status', 'created_by', 'modified_by'];


    public function values() {
        return $this->hasMany('App\BeachValue');
    }
}
