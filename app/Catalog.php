<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['parent_id', 'name', 'label', 'value', 'created_by', 'modified_by'];

    public function scopeSubCatalogs($query, $parent_id) {
        return $query->where('parent_id', $parent_id)->get();
    }

    public function values() {
        return $this->hasMany('App\BeachValue', 'catalog_id');
    }
}
