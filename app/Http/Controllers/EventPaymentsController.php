<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventPayment;
use App\Mail\BookedTicket;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;  

class EventPaymentsController extends Controller
{
    public function buyPackage(Request $request, Event $event, $index)
	{
		  $count = $request->get('count');
		  $amount = $request->get('amount');

		  $package = $event->packages[$index];

		  $order = EventPayment::create(['event_id' => $event->id, 
		  						'user_id' => auth()->id(),
		  						'count' => $count,
		  						'amount'=> $amount,
		  						'package' => $index]);

	      $parameters = [
      
	        'tid' => '1233221223322',
	        
	        'order_id' => $order->id,
	        
	        'amount' => $amount,

	        'purpose' => 'Buy ' . $count . ' ' . $package['name']  . ' Passes',

	        'buyer_name' => \Auth::user()->name,

	        'email' => \Auth::user()->email,

	        'phone' => '9922367414',

	        'redirect_url' => env('APP_URL') . '/payments/response/order:' . $order->id
	        
	      ];
	      
	      $order = Indipay::prepare($parameters);

	      return Indipay::process($order);
	}

    public function response(Request $request, $oid)
    
    { 
        // For default Gateway
        $response = Indipay::response($request);
        
        $order = EventPayment::find($oid);
        
        if(!$response->success)
        {
        	$order->success = 0;
        	$order->save();
        	return view('events.payments.failure');

        }

        $order->success = 1;
        $order->save();
        
        $event = Event::find($order->event_id);

        $package = $event->packages[$order->package];

        $invoice = \PDF::loadView('invoices.event_pass', compact('order', 'event', 'package'));

        $invoiceData = $invoice->output();

        $message = new BookedTicket($event, $order);

        $message->attachData($invoiceData, 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);

        \Mail::to(auth()->user())->send($message);



        return view('events.payments.success', compact('order', 'event', 'package'));


    }  


    public function download(Request $request, $oid)
    
    { 
        
        
        $order = EventPayment::find($oid);
      
        
        $event = Event::find($order->event_id);

        $package = $event->packages[$order->package];

        $invoice = \PDF::loadView('invoices.event_pass', compact('order', 'event', 'package'));

        return $invoice->stream("invoice-" . $order->id . ".pdf");


    }  
}
