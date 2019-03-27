<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;  

class PaymentsController extends Controller
{

	public function buyPackage(Request $request, Event $event, $index)
	{
		  $count = $request->get('count');
		  $amount = $request->get('amount');

		  $package = $event->packages[$index];

	      $parameters = [
      
	        'tid' => '1233221223322',
	        
	        'order_id' => '1232212',
	        
	        'amount' => $amount,

	        'purpose' => 'Buy ' . $count . ' ' . $package['name']  . ' Passes',

	        'buyer_name' => \Auth::user()->name,

	        'email' => \Auth::user()->email,

	        'phone' => \Auth::user()->profile->phone,

	        
	      ];
	      
	      $order = Indipay::prepare($parameters);

	      return Indipay::process($order);
	}

    public function response(Request $request)
    
    {
        // For default Gateway
        $response = Indipay::response($request);
        

        if(!$response->success)
        {
        	return view('events.payments.failure');
        }
        
        $event = $response->payment_request->purpose

        return view('events.payments.success');


    }  
}
