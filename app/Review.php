<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const REVIEW_STATUS_ARCHIVED = 0;
    const REVIEW_STATUS_MODERATION = 9;
    const REVIEW_STATUS_PUBLISHED = 10;

    protected $fillable = [
        'beach_id', 'user_id', 'rating', 'text', 'status'
    ];
}
