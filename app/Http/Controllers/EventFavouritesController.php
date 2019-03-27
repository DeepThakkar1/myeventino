<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventFavouritesController extends Controller
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
    
    public function store(Event $event)
    {
    	if($event->isFavourited())
    	{
          $event->unfavourite();
        } 
        else {
          $event->favourite();
        } 
         

        if(request()->wantsJson())
        {
            return response([], 200);
        }

        return back();
    }

    public function destroy(Event $event)
    {
        $event->unfavourite();

        if(request()->wantsJson())
        {
            return response([], 204);
        }

        return back();
    }

}
