<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeachMeta extends Model
{
    protected $fillable = ['key', 'value', 'beach_id', 'field_title'];
}
