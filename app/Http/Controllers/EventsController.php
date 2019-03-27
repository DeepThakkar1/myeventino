<?php

namespace App\Http\Controllers;

use App\{Event, User};
use Illuminate\Http\Request;
use App\Http\Requests\SubmitEventRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::latest();

        if($request->has('event_type') && $request->get('event_type') != 'all' && $request->get('event_type') != '0')
        {
            
             $events = $events->where('event_type', 'LIKE', '%'. $request->get('event_type') . '%'); 
           
        }

         if($request->has('venue_type') && $request->get('venue_type') != 'all' && $request->get('venue_type') != '0')
        {
            $events = $events->where('venue_type', 'LIKE', '%'. $request->get('venue_type') . '%');
        }


        if($request->has('location'))
        {
            $events = $events->where('name', 'LIKE', '%'. $request->get('name') . '%')
                   ->orWhere('address', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('city', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('state', 'LIKE', '%'. $request->get('location') . '%');
        }

        if($request->has('facilities'))
        {
            foreach ($request->get('facilities') as $key => $facility) {
               $events = $events->where('facilities', 'LIKE', '%'. $facility . '%'); 
            }
        }


        $events = $events->get();

        if($request->has('dates'))
        {
            
             $events = $events->filter(function($event) use ($request){

                return count(array_intersect($event->dates, explode(',', $request->get('dates')))) > 0;
             });
       
        }

        if($request->has('event_time') && $request->get('event_time') != 'all')
        { 
          
             $events = $events->filter(function($event) use ($request){
                
                 $hour = (new Carbon($event->start_date . $event->start_time))->hour;

             return $hour >= $request->get('event_time');


             });

        }

        
        if($request->has('minprice'))
        {
             $events = $events->filter(function($event) use ($request){
                return $event->starting_price >= $request->get('minprice');
             });

        }

        if($request->has('maxprice'))
        {
             $events = $events->filter(function($event) use ($request){
                return $event->starting_price <= $request->get('maxprice');
             });

        }

        if($request->has('rating'))
        {
             $events = $events->filter(function($event) use ($request){
                return $event->avg_rating >= $request->get('rating');
             });

             
        }
        

        
        

        return view('events.index', compact('events'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
         
         return view('events.filter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmitEventRequest $request)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);
        
        $data['user_id'] = User::findOrCreate($data);

        $event = Event::create($data);

        flash('Event Registered on Eventino!', 'Event has been successfully registered on Eventino!Please add timings and packages for each day of the event to make it publicly visible!');

        return redirect('/events/' . $event->slug . '/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event->load('photos');
        
        return view('events.show.index', compact('event'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage(Event $event)
    {
        $event->load('orders');
        return view('events.manage.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dates(Request $request, Event $event)
    {
        $event->dates = $request->get('dates');
        
        $event->timings = sub_array($event->timings, $event->dates);



        
        $event->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/events/' . $event->slug . '/manage#timings')->with('msg', 'updated');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function timings(Request $request, Event $event)
    {
        $timings = [];




        foreach($event->dates as $date)
        {
            $date = trim($date);
            $timings[$date] = [
                               'start' => $request->get("{$date}-start"),
                               'end' => $request->get("{$date}-end")
                              ];    
        }
       
        $event->timings = $timings;
        
        $event->save();

        return redirect('/events/' . $event->slug . '/manage#timings')->with('msg', 'updated');
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function packages(Request $request, Event $event)
    {
        $packages = $event->packages ? $event->packages : [];

        $packages[] = $request->except('_token');

        $event->packages = $packages;
       
        
        $event->save();

        return redirect('/events/' . $event->slug . '/manage#packages')->with('msg', 'updated');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePackage(Request $request, Event $event, $index)
    {
        $packages = $event->packages;

        $packages[$index] = $request->get('data');

        $event->packages = $packages;
        
        $event->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/events/' . $event->slug . '/manage#packages')->with('msg', 'updated');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePackage(Request $request, Event $event, $index)
    {
        $packages = $event->packages;

        unset($packages[$index]);

        $event->packages = array_values($packages);
        
        $event->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/events/' . $event->slug . '/manage#packages')->with('msg', 'updated');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function policies(Request $request, Event $event)
    {
        $policies = $event->policies ? $event->policies : [];

        $policies[] = $request->get('term');

        $event->policies = $policies;
       
        
        $event->save();

        return redirect('/events/' . $event->slug . '/manage#terms')->with('msg', 'updated');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePolicy(Request $request, Event $event, $index)
    {
        $policies = $event->policies;

        unset($policies[$index]);

        $event->policies = array_values($policies);
        
        $event->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/events/' . $event->slug . '/manage#policies')->with('msg', 'updated');


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePolicy(Request $request, Event $event, $index)
    {
        $policies = $event->policies;

        $policies[$index] = $request->get('value');

        $event->policies = array_values($policies);
        
        $event->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/events/' . $event->slug . '/manage#policies')->with('msg', 'updated');


    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmitEventRequest $request, Event $event)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $event->update($data);

        flash('Event Successfully Updated!', 'Event has been successfully updated on Eventino!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $event->delete();

        if($request->wantsJson())
        {
            return response([], 200);
        }    
 
        return back();
    }
}
