<!-- Widget -->

@if($event->packages)


@if(!Auth::check())
 <div id="notice-package" class="alert alert-success">Please Login/Register to buy passes for this event!</div>
@endif

@foreach($event->packages as $index => $package)


	<div class="widget">

		<!-- Agent Widget -->
		<div class="agent-widget">

		       <div class="row">
		       		<div class="col-md-4">
		       			<h2 class="package-title">{{ $package['name'] }} <span style="font-size: 18px;">{{ ucwords($package['ticket_type']) }}</span></h2>	
		       			<p style="font-size: 18px;margin-bottom: 2px;">
		       			    Ticket For : {{ $package['ticket_for'] }} {{ str_plural('Person', $package['ticket_for'])}} 
		       			</p>

		       			<p>
		       				@foreach($package['days'] as $date)
		                      <span style="display: inline;color: white;font-size: 12px;" class="badge">{{ $date }}</span> 
		                    @endforeach
		       			</p>
						
		       		</div>
		       		<div class="col-md-4 ticket_counter">

		       			<p>

		       			    <span><button onclick="decrementCounter({{$index}}, {{$package['price']}})" class="btn"><i class="fa fa-minus-circle"></i></button></span>

		       			    <span class="value" id="counter-{{$index}}">0</span>	

		       			    <span><button onclick="incrementCounter({{$index}}, {{$package['price']}})" class="btn"></a><i class="fa fa-plus-circle"></i></button></span>

		       			</p>	

		       			<i class="hidden" id="maxcount-{{$index}}" data-val="{{ $package['count'] }}"></i>
		       			
		       		</div>
		       		<div class="col-md-4"> 

		       		  <hr class="visible-xs">

		       		  <h2 style="margin-top: 0px;color: #192942;font-weight: bold;" class="text-center">&#8377 {{ $package['price'] }}</h2>
		       					
           		      <a href="#" class="button fullwidth margin-top-5"   data-toggle="modal" 
           		      		data-target="{{ Auth::check() ? '#paymentModal' : '#loginModal' }}" > Book Now</a>
		       		</div>

		       </div>
			


           
          
          
            
		</div>
		<!-- Agent Widget / End -->

	</div>

@endforeach





@endif