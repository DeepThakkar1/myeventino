<?php

namespace App\Http\Controllers;

use App\{Venue, VenueSection};
use Illuminate\Http\Request;

class VenueSectionsController extends Controller
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
    	return view('venues.sections.index', compact('venue'));
    }

    public function store(Request $request, Venue $venue)
    {
    	$this->validate($request, [
    			'name' => 'required',
    			'type' => 'required',
    			'theatre_capacity' => 'required',
    			'floating_capacity' => 'required',
    			'cluster_capacity'  => 'required',
    			'area' => 'required',
    			'price' => 'required',
    			'price_person' => 'required'
    		]);


    	$venue->sections()->create($request->all());

    	return back();


    }


    public function update(Request $request, Venue $venue, $sectionId)
    {
    	$this->validate($request, [
    			'name' => 'required',
    			'type' => 'required',
    			'theatre_capacity' => 'required',
    			'floating_capacity' => 'required',
    			'cluster_capacity'  => 'required',
    			'area' => 'required',
    			'price' => 'required',
    			'price_person' => 'required'
    		]);
        
        $section = VenueSection::find($sectionId);

    	$section->update($request->all());

    	return back();


    }


}
