<?php

namespace App;

use App\Traits\{Reviewable, Favouritable};
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

use Carbon\Carbon;

class Event extends Model
{
    
    use CrudTrait;
    

    use Reviewable;

    use Favouritable;
    
    protected $guarded = [];

    protected $with = ['favourites'];

    protected $appends = ['favouritesCount', 'isFavourited', 'avg_rating'];


   public function getRouteKeyName()
   {
     return 'slug';
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   } 
    

   public function people()
   {
      return $this->belongsToMany(User::class);
   } 
   


   public function photos()
   {
      return $this->hasMany(EventPhoto::class);
   }
   

   public function orders()
   {
      return $this->hasMany(EventPayment::class);
   }


   public function photosPath()
   {
        return '/events/' . $this->slug . '/photos';   
   }


   public function setEventTypeAttribute($value)
   {
        $this->attributes['event_type'] = json_encode($value);
   }

   public function setVenueTypeAttribute($value)
   {
        $this->attributes['venue_type'] = json_encode($value);
   }

   public function setPackagesAttribute($value)
   {
        $this->attributes['packages'] = json_encode($value);
   }

   public function setFacilitiesAttribute($value)
   {
        $this->attributes['facilities'] = json_encode($value);
   }

   public function setPoliciesAttribute($value)
   {
        $this->attributes['policies'] = json_encode($value);
   }

   public function setTimingsAttribute($value)
   {
        $this->attributes['timings'] = json_encode($value);
   }

   public function getDatesAttribute()
   {
        return explode(',', $this->attributes['dates']);
   }

   public function getTimingsAttribute()
   {
        return json_decode($this->attributes['timings'], true);
   }

   public function getPackagesAttribute()
   {
        return json_decode($this->attributes['packages'], true);
   }

   public function getPoliciesAttribute()
   {
        return json_decode($this->attributes['policies'], true);
   }

   public function getEventTypeAttribute($value)
   {
        return json_decode($this->attributes['event_type']);
   }

   public function getStartDateAttribute()
   {
        $dates = explode(',', $this->attributes['dates']);

        return (new Carbon( current($dates) ))->toDateString();
   }

   public function getEndDateAttribute()
   {
        $dates = explode(',', $this->attributes['dates']);

        return (new Carbon( end($dates) ));
   }

   public function getStartingPriceAttribute()
   {
        return $this->packages[0]['price'];
   }

   public function getEventDatesAttribute()
   { 
   	   $dates = explode(',', $this->attributes['dates']);

   	 
       $starts = (new Carbon( current($dates) ))->format('M j');

 
   	   $ends = (new Carbon( end($dates) ))->format('M j');

   	   return $starts . " - " . $ends;

   }

   public function getEventTimingsAttribute()
   {
    
   	   $date = current(explode(',', $this->attributes['dates']));
       $timings = json_decode($this->attributes['timings'], true);

   	   $starts = $timings[$date]['start'];
   	   $ends = $timings[$date]['end'];

   	   return $starts . " - " . $ends;

   }

   public function getStartTimeAttribute()
   {
    
       $date = current(explode(',', $this->attributes['dates']));
       $timings = json_decode($this->attributes['timings'], true);

       $starts = $timings[$date]['start'];

       return $starts;

   }

   public function getTicketsSoldAttribute()
   {
        
       $count = 0;

       foreach ($this->orders as $key => $order) {
          $count += $order->count;
       }
      
       return $count;
   }


    public function getTicketsCountAttribute()
   {
        
       $count = 0;

       $packages = json_decode($this->attributes['packages'], true);

       foreach ($packages as $key => $package) {
          $count += $package['count'];
       }
      
       return $count;
   }

   public function getSalesAttribute()
   {
        
       $sales = 0;

       foreach ($this->orders as $key => $order) {
          $sales += $order->amount;
       }
      
       return $sales;
   }


    public function getUserEmailAttribute()
    {
        return $this->user->email;
    }
}
