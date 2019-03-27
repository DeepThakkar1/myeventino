<?php

namespace App\Http\Controllers;

use App\VenuePhoto;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoUploadRequest;



class VenuePhotosController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoUploadRequest $request, Venue $venue)
    {
        
        $photo = VenuePhoto::fromFileAndVenue($request->file('file'), $venue);

        return $photo->saveWithResponse();
    
    }
}
