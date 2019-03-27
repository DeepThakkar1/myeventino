<div class="col-md-10">
	

	<div class="submit-page"> 

	 

	  <div class="widget">

		<!-- Agent Widget -->
		<div class="agent-widget sales">

		      <div class="row">
		      	<div class="col-md-8">
		      		<p>Tickets Sold : {{ $event->tickets_sold }} / {{ $event->tickets_count }}</p>
		      	</div>

		      	<div class="col-md-4">
		      		<p>Amount Earned : &#8377 {{ $event->sales }}</p>
		      	</div>
		      </div>	


           
          
          
            
		</div>
		<!-- Agent Widget / End -->

	</div>

	@foreach($event->orders as $order)

	<div class="widget">

		<!-- Agent Widget -->
			<div class="agent-widget">

			 <p style="font-size: 18px;"><b>Order Id : #{{ $order->id }} | {{ $order->created_at->diffForHumans() }}</b></p>
			       		    <hr/>

			       <div class="row">
			       		<div class="col-md-10">

			       		    <h4 style="font-weight: bold;font-size: 20px;">{{ $order->user->name }}</h4> 
			       		    <p >{{ $order->user->email }}</p>

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

			       <h2  class="text-center ticket price">Total : &#8377 {{ $order->amount }}</h2>


	           
	          
	          
	            
			</div>
			<!-- Agent Widget / End -->

		</div>

	@endforeach
	
    </div>


</div>