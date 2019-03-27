<?php

namespace App\Traits;

use App\Review;

trait Reviewable {


	 /**
     * Get all of the models's reviews.
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable')->latest();
    }	

    public function getAvgRatingAttribute()
    {
    	return round($this->reviews()->avg('rating'), 1);
    }



}