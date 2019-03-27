<?php

namespace App\Http\Controllers;


use App\{Venue, Review};
use Illuminate\Http\Request;

class VenueReviewsController extends Controller
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
    
    public function index(Venue $venue)
    {
    	$reviews = $venue->reviews;
    	return view('venues.reviews.index', compact('venue', 'reviews'));
    }

    public function store(Request $request, Venue $venue)
    {

    	$this->validate($request, [
    			'rating' => 'required'
    		]);
        

    	$data = $request->all();

    	$data['user_id'] = auth()->id();   

    	$venue->reviews()->create($data);

    	return back();


    }


    public function update(Request $request, Venue $venue, $id)
    {
    	$this->validate($request, [
    			'rating' => 'required'
    		]);

        $review = Review::find($id);

    	$review->update($request->all());

    	return back();


    }


    public function destroy(Request $request, Venue $venue, $id)
    {
    	$review = Review::find($id);

    	$review->delete();

    	return back();
    }
}
