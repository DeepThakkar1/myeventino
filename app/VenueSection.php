<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueSection extends Model
{
     
	protected $fillable = 
	    ['name', 'type', 'theatre_capacity', 'floating_capacity', 'cluster_capacity', 'price_person', 'price', 'area', 'venue_id', 'exclusive_features'];


	public function venue()
	{
		return $this->belongsTo(Venue::class);
	}


}
