<?php

namespace App\Http\Controllers;

use App\{Event, Review};
use Illuminate\Http\Request;

class EventReviewsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(Event $event)
    {
    	$reviews = $event->reviews;
    	return view('events.reviews.index', compact('event', 'reviews'));
    }

    public function store(Request $request, Event $event)
    {

    	$this->validate($request, [
    			'rating' => 'required'
    		]);
        

    	$data = $request->all();

    	$data['user_id'] = auth()->id();   

    	$event->reviews()->create($data);

    	return redirect("/events/{$event->slug}#reviews");


    }


    public function update(Request $request, Event $event, $id)
    {
    	$this->validate($request, [
    			'rating' => 'required'
    		]);

        $review = Review::find($id);

    	$review->update($request->all());

    	return redirect("/events/{$event->slug}#reviews");


    }


    public function destroy(Request $request, event $event, $id)
    {
    	$review = Review::find($id);

    	$review->delete();

    	return redirect("/events/{$event->slug}#reviews");
    }
}
