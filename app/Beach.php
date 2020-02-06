<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beach extends Model
{
    const BEACH_STATUS_ARCHIVED = 0;
    const BEACH_STATUS_DRAFT = 9;
    const BEACH_STATUS_PUBLISHED = 10;

    protected $fillable = ['title', 'lat', 'lon', 'rating', 'location', 'specifications',
        'pictures', 'panoramas', 'video_url',
        'length', 'width', 'quality_beach', 'quality_water', 'other_specifications',
        'short_description',
        'cover', 'city_id', 'poi_img',
        'status', 'created_by', 'modified_by'];


    public function metas()
    {
        return $this->hasMany('App\BeachMeta');
    }
}
