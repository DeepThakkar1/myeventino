<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenueFavouritesController extends Controller
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
    
    public function store(Venue $venue)
    {
    	if($venue->isFavourited())
    	{
          $venue->unfavourite();
        } 
        else {
          $venue->favourite();
        } 
         

        if(request()->wantsJson())
        {
            return response([], 200);
        }

        return back();
    }

    public function destroy(Venue $venue)
    {
        $venue->unfavourite();

        if(request()->wantsJson())
        {
            return response([], 204);
        }

        return back();
    }

}
