<?php

namespace App\Http\Controllers;

use App\EventPhoto;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoUploadRequest;

class EventPhotosController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoUploadRequest $request, Event $event)
    {
        
        $photo = EventPhoto::fromFileAndEvent($request->file('file'), $event);

        return $photo->saveWithResponse();
    
    }
}
