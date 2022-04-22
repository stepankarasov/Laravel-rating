<?php

namespace Nagy\LaravelRating\Traits\Rate;

use Nagy\LaravelRating\Models\Rating;

trait Rateable
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable')->typeRate();
    }

    public function ratingsAvg()
    {
        return round($this->ratings()->avg('value') ?? 0,2);
    }

    public function ratingsCount()
    {
        return $this->ratings()->count();
    }
}
