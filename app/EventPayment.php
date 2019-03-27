<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPayment extends Model
{
    protected $fillable = ['event_id', 'user_id', 'amount', 'count', 'package'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }

    public function package()
    {
    	return $this->event->packages[$this->package];
    }
}
