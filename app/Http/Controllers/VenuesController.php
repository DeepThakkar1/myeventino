<?php

namespace App\Http\Controllers;


use App\{Venue, User, VenueSection};
use Illuminate\Http\Request;
use App\Http\Requests\SubmitVenueRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;



class VenuesController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['preview', 'update', 'edit']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $venues = Venue::latest();

        if($request->has('venue_type') && $request->get('venue_type') != 'all' && $request->get('venue_type') != '0')
        {
            $venues = $venues->where('venue_type', 'LIKE', '%'. $request->get('venue_type') . '%');
        }


        if($request->has('location'))
        {
            $venues = $venues->where('venue_name', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('address', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('city', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('state', 'LIKE', '%'. $request->get('location') . '%');
        }

        if($request->has('area'))
        {
            $venues = $venues->where('total_area', '>=', $request->get('area'));
        }
        
        if($request->has('facilities'))
        {
            foreach ($request->get('facilities') as $key => $facility) {
               $venues = $venues->where('facilities', 'LIKE', '%'. $facility . '%'); 
            }
        }

        if($request->has('parameters'))
        {
            foreach ($request->get('parameters') as $key => $parameter) {
               $venues = $venues->where('parameters', 'LIKE', '%'. $parameter . '%'); 
            }
        }

        $venues = $venues->get();

        
        if($request->has('people'))
        {
             $venues = $venues->filter(function($venue) use ($request){
                return $venue->max_cap >= $request->get('people');
             });

        }

        if($request->has('minprice'))
        {
             $venues = $venues->filter(function($venue) use ($request){
                return $venue->serves_from >= $request->get('minprice');
             });

        }

        if($request->has('maxprice'))
        {
             $venues = $venues->filter(function($venue) use ($request){
                return $venue->serves_from <= $request->get('maxprice');
             });

        }

        if($request->has('rating'))
        {
             $venues = $venues->filter(function($venue) use ($request){
                return $venue->avg_rating >= $request->get('rating');
             });
        }

        



         return view('venues.index', compact('venues'));
    }
    
    public function filter()
    {
         
         return view('venues.filter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmitVenueRequest $request)
    {
        
        $data = $request->all();

        $data['slug'] = str_slug($data['venue_name']);
        
        $data['user_id'] = User::findOrCreate($data);

        $venue = Venue::create($data);

        flash('Venue Registered on Eventino!', 'Venue has been successfully registered on Eventino!Please check the mail that has been sent to you for your account password to add further details!');

        return redirect('/venues/' . $venue->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        $venue->load('photos', 'sections');
        
        return view('venues.show.index', compact('venue'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmitVenueRequest $request, Venue $venue)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['venue_name']);

        $venue->update($data);

        flash('Venue Successfully Updated!', 'Venue has been successfully updated on Eventino!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Venue $venue)
    {
        $venue->delete();

        if($request->wantsJson())
        {
            return response([], 200);
        }    
 
        return back();
    }


}
