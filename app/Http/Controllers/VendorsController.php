<?php

namespace App\Http\Controllers;


use App\{User, Vendor};
use Illuminate\Http\Request;
use App\Http\Requests\SubmitVendorRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $vendors = Vendor::latest();
        
        if($request->has('vendor_types') && $request->get('vendor_types') != 'all' && $request->get('vendor_types') != '0')
        {
            
               $vendors = $vendors->where('vendor_types', 'LIKE', '%'. $request->get('vendor_types') . '%'); 
            
        }

       

        if($request->has('location'))
        {
            $vendors = $vendors->where('name', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('address', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('city', 'LIKE', '%'. $request->get('location') . '%')
                   ->orWhere('state', 'LIKE', '%'. $request->get('location') . '%');
        }

        if($request->has('facilities'))
        {
            foreach ($request->get('facilities') as $key => $facility) {
               $vendors = $vendors->where('facilities', 'LIKE', '%'. $facility . '%'); 
            }
        }


        
        $vendors = $vendors->get();

        if($request->has('experience'))
        {
             $vendors = $vendors->filter(function($vendor) use ($request){
                return $vendor->experience >= $request->get('experience');

             });

        }


        if($request->has('rating'))
        {
             $vendors = $vendors->filter(function($vendor) use ($request){
                return $vendor->avg_rating >= $request->get('rating');
             });

        }

        if($request->has('minprice'))
        {
             $vendors = $vendors->filter(function($vendor) use ($request){
                return $vendor->starting_package >= $request->get('minprice');
             });

        }

        if($request->has('maxprice'))
        {
             $vendors = $vendors->filter(function($vendor) use ($request){
                return $vendor->starting_package <= $request->get('maxprice');
             });


        }

        return view('vendors.index', compact('vendors'));
    }


    public function filter()
    {
        return view('vendors.filter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmitVendorRequest $request)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);
        
        $data['user_id'] = User::findOrCreate($data);

        $vendor = Vendor::create($data);

        flash('You are now a Vendor on vendorino!', 'Your business was successfully listed on Myvendorino!You can now start promoting your self and get paid directly here for your services!');

        return redirect('/vendors/' . $vendor->slug . '/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $vendor->load('photos');
        
        return view('vendors.show.index', compact('vendor'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage(Vendor $vendor)
    {
        return view('vendors.manage.index', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmitVendorRequest $request, Vendor $vendor)
    {
        $data = $request->all();

        $data['slug'] = str_slug($data['name']);

        $vendor->update($data);

        flash('Vendor Profile Successfully Updated!', 'Vendor Profile has been successfully updated on vendorino!!');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function policies(Request $request, Vendor $vendor)
    {
        $policies = $vendor->policies ? $vendor->policies : [];

        $policies[] = $request->get('term');

        $vendor->policies = $policies;
       
        
        $vendor->save();

        return redirect('/vendors/' . $vendor->slug . '/manage#terms')->with('msg', 'updated');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePolicy(Request $request, Vendor $vendor, $index)
    {
        $policies = $vendor->policies;

        unset($policies[$index]);

        $vendor->policies = array_values($policies);
        
        $vendor->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/vendors/' . $vendor->slug . '/manage#policies')->with('msg', 'updated');


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePolicy(Request $request, Vendor $vendor, $index)
    {
        $policies = $vendor->policies;

        $policies[$index] = $request->get('value');

        $vendor->policies = array_values($policies);
        
        $vendor->save();

        if($request->wantsJson())
        {
            return response([], 200);
        }

        return redirect('/vendors/' . $vendor->slug . '/manage#policies')->with('msg', 'updated');


    }



   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vendor $vendor)
    {
        $vendor->delete();

        if($request->wantsJson())
        {
            return response([], 200);
        }    
 
        return back();
    }
}
