<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorFavouritesController extends Controller
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
    
    public function store(Vendor $vendor)
    {
    	if($vendor->isFavourited())
    	{
          $vendor->unfavourite();
        } 
        else {
          $vendor->favourite();
        } 
         

        if(request()->wantsJson())
        {
            return response([], 200);
        }

        return back();
    }

    public function destroy(Event $event)
    {
        $vendor->unfavourite();

        if(request()->wantsJson())
        {
            return response([], 204);
        }

        return back();
    }
}
