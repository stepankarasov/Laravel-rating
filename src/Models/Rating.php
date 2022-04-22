<?php

namespace Nagy\LaravelRating\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\LaravelRating;

class Rating extends Model
{
    protected $guarded = [];

    protected $table = 'ratings';

    public function model()
    {
        return $this->morphTo();
    }

    public function rateable()
    {
        return $this->morphTo();
    }

    public function scopeTypeVote($query){
        return $query->where('type', LaravelRating::TYPE_VOTE);
    }

    public function scopeTypeRate($query){
        return $query->where('type', LaravelRating::TYPE_RATE);
    }

    public function scopeTypeLike($query)
    {
        return $query->where('type', LaravelRating::TYPE_LIKE);
    }
}
