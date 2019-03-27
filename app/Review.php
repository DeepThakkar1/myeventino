<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = [ 'comment', 'rating', 'reviewable_id', 'reviewable_type', 'user_id' ];
    /**
     * Get all of the owning reviewable models.
     */
    public function reviewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
