@extends('layouts.app')


@section('css')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.min.css" />

@endsection


@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar" class="margin-bottom-20">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<a href="listings-list-with-sidebar.html" class="back-to-listings"></a>
				<div class="property-title">
					<h2>{{ $event->name }} </h2>
					
						@foreach($event->event_type as $type)
	                      <span style="display: inline;color: white;font-size: 12px;" class="badge">{{ ucwords($type) }}</span> 
	                     @endforeach
					
				</div>

				<div class="property-pricing">
					<div>&#8377 {{ $event->starting_price }} onwards</div>
					<div class="sub-price">Event For : {{ count($event->dates) }} Days</div>
				</div>


			</div>
		</div>
	</div>
</div>




<div class="container">
	<div class="row">
	
         

		<!-- Property Description -->
		<div class="col-lg-12 col-md-12">

		<div id="notice-payment" class="alert alert-success">Your Payment was <b>successfull</b>!Your ticket to event is bundled as invoice and further information is sent to you on your <b>E-mail</b>!</div>

		
     <div class="margin-bottom-35">

	
      <div class="widget">

		<!-- Agent Widget -->
			<div class="agent-widget">

			 <p style="font-size: 18px;"><b>Order Id : #{{ $order->id }} | {{ $order->created_at->diffForHumans() }}</b></p>
			       		    <hr/>

			       <div class="row">
			       		<div class="col-md-10">

			       		    <h4 style="font-weight: bold;font-size: 20px;">{{ $order->event->name }}</h4> 
			       		    <p >{{ $order->event->event_dates }}</p>

			       			<h2 class="package-title">{{ $order->package()['name'] }} <span style="font-size: 18px;">{{ ucwords($order->package()['ticket_type']) }}</span></h2>	
			       			<p style="font-size: 18px;margin-bottom: 2px;">
			       			    Ticket For : {{ $order->package()['ticket_for'] }} {{ str_plural('Person', $order->package()['ticket_for'])}} 
			       			</p>

			       			<p>
			       				@foreach($order->package()['days'] as $date)
			                      <span style="display: inline;color: white;font-size: 12px;" class="badge">{{ $date }}</span> 
			                    @endforeach
			       			</p>
							
			       		</div>
			       		<div class="col-md-2 ticket_counter">
	                       <p>
			       			<span class="value" style="line-height: 40px;">{{ $order->count }} {{ str_plural('Ticket', $order->count) }}</span>
			       		</p>	
			       			
			       		</div>
			       		
			       		

			       </div>

			       <hr class="">

			       <h2  class="ticket price">Total : &#8377 {{ $order->amount }} </h2>

			        <hr class="">

			        <div>

			        <a href="/invoice/download/{{$order->id}}" target="_blank" class="button" style="margin: 0 auto;">Download Invoice</a>

                    </div>


	           
	          
	          
	            
			</div>
			<!-- Agent Widget / End -->

		</div>

			
		</div>
		<!-- Property Description / End -->

		</div>


		

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>




@endsection


