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
				
				<a href="{{ url()->previous() }}" class="back-to-listings"></a>
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
	   @can('update', $event)
    <form action="{{ $event->photosPath() }}" class="dropzone dz-clickable"><div class="dz-default dz-message"><span><i class="sl sl-icon-plus"></i> Click here or drop files to upload</span></div>
      {{ csrf_field() }}
    </form>
  @endcan

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">

		
     <div class="margin-bottom-35">
       
       <ul class="nav nav-pills" id="mytabs">
		  <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Details</a></li>
		  <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Venue</a></li>
		  <li role="presentation"><a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">Buy Tickets</a></li>
		  <li role="presentation"><a href="#terms" aria-controls="terms" role="tab" data-toggle="tab"">T &amp; C</a></li>
		  <li role="presentation"><a href="#people" aria-controls="people" role="tab" data-toggle="tab"">People Going</a></li>
		   <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"">Reviews</a></li>
		</ul>

	  </div>
	  

	

					  <!-- Tab panes -->
				  <div class="tab-content" id="manage-tabs">
				    <div role="tabpanel" class="tab-pane active" id="basic">
				    	@include('events.show.basic')
				    </div>
				    <div role="tabpanel" class="tab-pane" id="location">
				    	@include('events.show.location')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="packages">
				    	@include('events.show.packages')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="terms">
				    	@include('events.show.terms')
				    </div>
				     <div role="tabpanel" class="tab-pane " id="people">
				    	@include('events.show.people')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="reviews">
				    	@include('events.show.reviews')
				    </div>
				    

				    
				  </div>
			
		</div>
		<!-- Property Description / End -->


		<!-- Sidebar -->
		<div class="col-lg-4 col-md-5">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-30">
					<button id="share" data-toggle="modal" data-target="#shareModal" class="widget-button"><i class="fa fa-share"></i> Share</button>

			          @if(Auth::check())
			         
			           @if(!$event->isFavourited)
			            <button id="favourite" onclick="toggleFavourite()" class="widget-button save" data-save-title="Save" data-saved-title="Saved"><span class="like-icon"></span></button>

			          @else
			            <button id="unfavourite" onclick="toggleFavourite()" class="widget-button save liked" data-save-title="Save" data-saved-title="Saved"><span class="like-icon liked"></span></button>

			          @endif  
			        @endif
				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				<div class="widget">

					<!-- Agent Widget -->
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo"><img src="/images/avatar4.png" alt="" /></div>
							<div class="agent-details">
								<h4><a href="#">{{ $event->contact_name }}</a></h4>
								<span><i class="sl sl-icon-call-in"></i>{{ $event->phone }}</span>
							</div>
							<div class="clearfix"></div>
						</div>

			            <input type="text" value="Website : {{ $event->website }}" readonly>

			           
			           @can('update', $event)
			            <a href="/events/{{$event->slug}}/manage#basic" class="button fullwidth margin-top-5"><i class="fa fa-edit"></i> Edit Contact Info</a>
			           @else
			            @if(Auth::check())

			               <i id="isGoingTo" data-val="{{ auth()->user()->isGoingTo($event) }}"></i>
			              
			           		<a id="going-here" onclick='goingHere("{{$event->slug}}")' class="button fullwidth margin-top-5">
			           		   <i class="fa fa-check-circle"></i> I'm Going Here
			           		</a>

			           		<a id="not-going-here" onclick='notGoingHere("{{$event->slug}}")' class="button fullwidth margin-top-5 hidden">
			           		   <i class="fa fa-check-circle"></i> I'm Not Going Here
			           		</a>

			           		
			           	  	
			           	@else
			           		<a href="/login" class="button fullwidth margin-top-5"> Login to tell people about this</a>
			           	@endif
			           @endcan 
					</div>
					<!-- Agent Widget / End -->

				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				<div class="widget">
					<h5 class="margin-bottom-35">Sponsered</h5>

					<div class="listing-carousel outer">
						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-01.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-02.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-03.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->
					</div>

				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">You need an account!</h4>
      </div>
      <div class="modal-body">
     
      
        <strong>Please Login/Register to buy these passes!<a href="/login">Login Here</a></strong>
    
      </div>
     
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sharing Url</h4>
      </div>
      <div class="modal-body">
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-link"></i></div>
      
        <input type="text" class="form-control" readonly value="https://www.myeventino.com/events/{{$event->slug}}">
    </div>
      </div>
     
    </div>
  </div>
</div>


@if($event->packages)
@foreach($event->packages as $index => $package)




<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="100" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-weight: bold;">Book Tickets</h4>
      </div>
      <div class="modal-body">
        <h4><b>{{ $event->name }}</b></h4>
        <p><i class="fa fa-map-marker"></i> {{ $event->address }}</p>

        <hr>
             <form action="/events/{{ $event->slug }}/package/{{$index}}/buy" method="POST">
        
		       <div class="row" > 
		       		<div class="col-md-6">
		       			<h2 class="package-title"><span id="ticket-name-{{$index}}">{{ $package['name'] }}</span> <span style="font-size: 18px;" id="ticket-type-{{$index}}">{{ ucwords($package['ticket_type']) }}</span></h2>	
		       			<p style="font-size: 18px;margin-bottom: 2px;">
		       			    Ticket For : {{ $package['ticket_for'] }} {{ str_plural('Person', $package['ticket_for'])}} 
		       			</p>

		       			<p>
		       				@foreach($package['days'] as $date)
		                      <span style="display: inline;color: white;font-size: 12px;" class="badge">{{ $date }}</span> 
		                    @endforeach
		       			</p>
						
		       		</div>
		       		<div class="col-md-6 ticket_counter">

		       			<p>

		       			    <span><button onclick="decrementCounter({{$index}}, {{$package['price']}})" class="btn"><i class="fa fa-minus-circle"></i></button></span>

		       			    <span class="value" id="modal-counter-{{$index}}">0</span>	

		       			    <span><button onclick="incrementCounter({{$index}}, {{$package['price']}})" class="btn"></a><i class="fa fa-plus-circle"></i></button></span>

		       			</p>	

		       			
		       		</div>
		       		

		       </div>

		       <hr class="">

		       <h2  class="text-center price">Total : &#8377 <span  id="total-{{$index}}">0.0</span></h2>
		       {{ csrf_field() }}
		       <input type="hidden" name="amount" id="amount-{{$index}}" value="0">
		       <input type="hidden" name="count" id="count-{{$index}}" value="0">
		       					
      </div>
      <div class="modal-footer">
        <button type="button" class="button close-btn" data-dismiss="modal">Cancel</button>
        <button type="submit" class="button">Make Payment</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach

@endif


@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">

       
       if($('#isGoingTo').length)
       {
       		if($('#isGoingTo').data('val'))
       		{
       			 $('#going-here').addClass('hidden');
               $('#not-going-here').removeClass('hidden');
       		} else {
       			 $('#going-here').removeClass('hidden');
                $('#not-going-here').addClass('hidden');
       			  
       		}
       }
      
 


       // Javascript to enable link to tab
		var url = document.location.toString();
		if (url.match('#')) {
		    $('.nav-pills a[href="#' + url.split('#')[1] ).tab('show');

		} //add a suffix

		// Change hash for page-reload
		$('.nav-pills a').on('shown.bs.tab', function (e) {
		    window.location.hash = e.target.hash;
		    window.scrollTo( 0, 0 );
		    
		})



    function toggleFavourite(argument) {

      axios.post("/events/{{ $event->slug }}/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

    function decrementCounter(index, price) {

   		var val = parseInt($('#counter-' + index).html()) ;
         
        if(val > 0) {
   		  $('#counter-' + index).html(val - 1);
   		  $('#modal-counter-' + index).html(val - 1);	
   		  $('#count-' + index).val(val - 1);	

   		  $('#total-' + index).html(price * (val - 1));
   		  $('#amount-' + index).val(price * (val - 1));
        }
      	
    }

   function incrementCounter(index, price) {

   		var val = parseInt($('#counter-' + index).html()) ;
        var max = $('#maxcount-' + index).data('val');


        if(val < max)
        {
        	$('#counter-' + index).html(val + 1);
        	$('#modal-counter-' + index).html(val + 1);
        	$('#count-' + index).val(val + 1);

        	$('#total-' + index).html(price * (val + 1));	
        	$('#amount-' + index).val(price * (val + 1));
        }
   		
      	
    }


    function goingHere(slug) {

   	 axios.post("/user/goingto/" + slug, {})
      .then(function (response) {
        console.log(response);
        $('#going-here').addClass('hidden');
        $('#not-going-here').removeClass('hidden');

      })
      .catch(function (error) {
        console.log(error);
      });

        
      	
    }


     function notGoingHere(slug) {

   	 axios.delete("/user/goingto/" + slug, {})
      .then(function (response) {
        console.log(response);
        $('#going-here').removeClass('hidden');
        $('#not-going-here').addClass('hidden');
      })
      .catch(function (error) {
        console.log(error);
      });

        
      	
    }
   
	   $(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});



     

    

</script>

@endsection

