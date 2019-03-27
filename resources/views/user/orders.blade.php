@extends('layouts.app')


@section('content')




<!-- Titlebar
================================================== -->
@if(!Request::has('platform'))
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{ auth()->user()->name }} - Orders</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Orders</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

@endif


<!-- Content
================================================== -->
<div class="container">
	<div class="row">


		@include('user.partials.sidebar')
        
		<div class="col-md-8">
			
			@foreach($orders as $order)

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


			@endforeach

		</div>


	</div>
      
		

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


@endsection