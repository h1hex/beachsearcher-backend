<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const REVIEW_STATUS_ARCHIVED = 0;
    const REVIEW_STATUS_MODERATION = 9;
    const REVIEW_STATUS_PUBLISHED = 10;

    const REVIEW_TYPE_REVIEW = 1;
    const REVIEW_TYPE_QUESTION = 2;
    const REVIEW_TYPE_STORY = 3;
    const REVIEW_TYPE_ANSWER = 4;

    protected $fillable = [
        'beach_id', 'user_id', 'rating', 'text', 'status', 'type', 'reply_to'
    ];
}
