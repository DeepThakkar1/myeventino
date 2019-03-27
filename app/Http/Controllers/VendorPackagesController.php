<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Vendor, VendorPackage};

class VendorPackagesController extends Controller
{
     

     public function store(Request $request, Vendor $vendor)
     {
     	$this->validate($request, [
     			'name' => 'required',
     			'price' => 'required'

     		]);
        
     	$vendor->packages()->create($request->all());

     	return redirect('/vendors/' . $vendor->slug . '/manage#packages')->with('msg', 'updated');
     }



     public function update(Request $request, Vendor $vendor , VendorPackage $package)
     {

     		$this->validate($request, [
     			'name' => 'required',
     			'price' => 'required'

     		]);


     	    $package->update($request->all());

	     	if($request->wantsJson())
	     	{
	     		return response([], 200);
	     	}	

	     	return back();
		     	
     }

     public function destroy(Request $request, Vendor $vendor , VendorPackage $package)
     {
	     	$package->delete();

	     	if($request->wantsJson())
	     	{
	     		return response([], 200);
	     	}	

	     	return back();
     }
}
