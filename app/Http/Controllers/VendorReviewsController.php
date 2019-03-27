<?php

namespace App\Http\Controllers;

use App\{Vendor, Review};
use Illuminate\Http\Request;

class VendorReviewsController extends Controller
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
    
    public function index(Vendor $vendor)
    {
    	$reviews = $vendor->reviews;
    	return view('vendors.reviews.index', compact('vendor', 'reviews'));
    }

    public function store(Request $request, Vendor $vendor)
    {

    	$this->validate($request, [
    			'rating' => 'required'
    		]);
        

    	$data = $request->all();

    	$data['user_id'] = auth()->id();   

    	$vendor->reviews()->create($data);

    	return redirect("/vendors/{$vendor->slug}#reviews");


    }


    public function update(Request $request, Vendor $vendor, $id)
    {
    	$this->validate($request, [
    			'rating' => 'required'
    		]);

        $review = Review::find($id);

    	$review->update($request->all());

    	return redirect("/vendors/{$vendor->slug}#reviews");


    }


    public function destroy(Request $request, Vendor $vendor, $id)
    {
    	$review = Review::find($id);

    	$review->delete();

    	return redirect("/vendors/{$vendor->slug}#reviews");
    }
}
