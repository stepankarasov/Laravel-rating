<?php

namespace Nagy\LaravelRating\Traits\Like;

use Nagy\LaravelRating\LaravelRating;
use Nagy\LaravelRating\Models\Rating;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Rating::class, 'rateable')->typeLike();
    }

    public function likesDislikesCount()
    {
        return $this->likes()->count();
    }

    public function likesCount()
    {
        return $this->likes()->where('value', 1)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('value', 0)->count();
    }


    /**
     * Eager loading
     */

    public function scopeWithLikesCount($query)
    {
        return $query->withCount(['likes as likes_count' => function($query){
            $query->where('type', LaravelRating::TYPE_LIKE)
                ->where('value',1);
        }]);       
    }

    public function scopeWithDislikesCount($query)
    {
        return $query->withCount(['likes as dislikes_count' => function($query){
            $query->where('type', LaravelRating::TYPE_LIKE)
                ->where('value',0);
        }]);
    }
}
