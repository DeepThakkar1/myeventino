<?php

namespace App\Http\Controllers;

use App\VendorPhoto;
use App\Vendor;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoUploadRequest;

class VendorPhotosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoUploadRequest $request, Vendor $vendor)
    {
        
        $photo = VendorPhoto::fromFileAndVendor($request->file('file'), $vendor);

        return $photo->saveWithResponse();
    
    }
}
