@extends('layouts.app')


@section('css')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.min.css" />

@endsection


@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="property-titlebar margin-bottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<a href="/venues" class="back-to-listings"></a>
				<div class="property-title">
					<h2>{{ $venue->venue_name }} <span class="property-badge">Best For {{ json_decode($venue->best_for)[0] }}</span> 
            @can('update', $venue)
             <a href="/venues/{{$venue->slug}}/edit#basic" ><i class="fa fa-edit"></i></a>
            @endcan 
             </h2>
					<span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							<?= substr( $venue->address , 0, 60); ?>...
						</a>
					</span>
        
          
				</div>

				<div class="property-pricing">
					<div><small style="color: #ccc;font-size: 14px">Starts from</small> &#8377 {{ $venue->starts_from }}</div>
					<div class="sub-price"><small style="color: #ccc;font-size: 14px">Serves from</small> &#8377 {{ $venue->serves_from }} / plate</div>
				</div>


			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Slider -->
<div class="fullwidth-property-slider margin-bottom-50">
	  @foreach($venue->photos as $photo)
      <a href="{{ $photo->path }}" data-background-image="{{ $photo->path }}" class="item mfp-gallery"></a>
    @endforeach 
</div>


<div class="container">
	<div class="row">

  @can('update', $venue)
    <form action="{{ $venue->photosPath() }}" class="dropzone dz-clickable"><div class="dz-default dz-message"><span><i class="sl sl-icon-plus"></i> Click here or drop files to upload</span></div>
      {{ csrf_field() }}
    </form>
  @endcan

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">
			<div class="property-description">

				<!-- Main Features -->
				<ul class="property-main-features">
					<li>Area <span>{{ $venue->total_area }} sq.ft.</span></li>
					<li>Rating <span><i class="fa fa-star"></i> {{ $venue->avg_rating }}</span></li>
					<li>Capacity <span>{{ $venue->min_cap }}-{{ $venue->max_cap }}</span></li>
					<li>Reviews <span>{{ count($venue->reviews) }}</span></li>
				</ul>
               
               @if(Request::has('platform'))
                     

					<!-- Widget -->
					<div class="widget margin-top-35">
                  
						<!-- Agent Widget -->
						<div class="agent-widget">
							<div class="agent-title">
								<div class="agent-photo"><img src="/images/avatar4.png" alt="" /></div>
								<div class="agent-details">
									<h4><a href="#">{{ $venue->contact_name }}</a></h4>
									<span><i class="fa fa-phone"></i>{{ $venue->phone }}</span>
								</div>
								<div class="clearfix"></div>
							</div>

							<button class="button fullwidth margin-top-5">Get Price &amp; Availability</button>
						</div>
						<!-- Agent Widget / End -->

					</div>
					<!-- Widget / End -->

				@endif


				<!-- Description -->
				<h3 class="desc-headline">Description 
           @can('update', $venue) 
          <a href="/venues/{{$venue->slug}}/edit#details" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit Description</a>
          @endcan
        </h3>
				<div class="show-more">
					<p>
						{{ $venue->description }}
					</p>

					

					<a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
				</div>



				<h3 class="desc-headline">Sections 
          @can('update', $venue) 
           <a href="/venues/{{$venue->slug}}/sections/" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit Sections</a>
          @endcan 
        </h3>
				<div class="">

			<!-- Toggles Container -->
			<div class="style-2">

				@forelse($venue->sections as $index => $section)

          @include('venues.partials.section')

        @empty
            

        @endforelse

			</div>
			<!-- Toggles Container / End -->
		</div>

				

				<h3 class="desc-headline">Facilities Offered 
         @can('update', $venue)
           <a href="/venues/{{$venue->slug}}/edit#facilities" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit Facilities</a>
         @endcan
        </h3>
				<ul class="property-features facilities margin-top-0">

  				 @if(Request::has('platform')) 
  				   <div class="logo-carousel">
  				 @endif

              @foreach(json_decode($venue->facilities) as $facility)

                @if(View::exists("venues.facilities.$facility"))
                     @include("venues.facilities.$facility")
                @endif
                 

              @endforeach

           @if(Request::has('platform'))
             </div>
           @endif
				</ul>

  
			<!-- Ratings To Be Added Later -->


					<!-- Features -->
				<h3 class="desc-headline">Features</h3>
				<ul class="property-features checkboxes margin-top-0">
				  @if(in_array("air_conditioning", json_decode($venue->facilities)))
					<li>Air Conditioning</li>
			      @endif
			       @if(in_array("pool", json_decode($venue->facilities)))
					<li>Swimming Pool</li>
			      @endif
			      @if(in_array("clubhouse", json_decode($venue->facilities)))
					<li>Clubhouse</li>
			      @endif
			      @if(in_array("laundry", json_decode($venue->facilities)))
					<li>Laundry</li>
			      @endif
			      @if(in_array("valet", json_decode($venue->facilities)))
					<li>Valet Parking</li>
			      @endif	

			      <?php $exclusive = explode(',', $venue->exclusive_features); 	?>
			      @foreach($exclusive as $item)
					<li>{{ $item }}</li>
				  @endforeach	
				</ul>

					<!-- Features -->
				<h3 class="desc-headline">Food Available 

          @can('update', $venue)
            <a href="/venues/{{$venue->slug}}/edit#food" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit</a>
          @endcan
          
        </h3>

				<ul class="property-features checkboxes margin-top-0">
				 <?php $foods = json_decode($venue->food_available); ?>
				 @if($foods != null)
			      @foreach($foods as $item)
					<li>{{ ucwords($item) }}</li>
				  @endforeach
				 @endif 	
				</ul>
                

				<h3 class="desc-headline">Seating Capacity</h3>
                <ul class="property-features margin-top-0">
                   <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/theatre.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Theatre Capacity</b><br>
                      {{ $venue->theatre_cap }} People
                     </div> 
                     </div> 
                   </li>

                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/floating.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Floating Capacity</b><br>
                      {{ $venue->floating_cap }} People
                     </div> 
                     </div> 
                   </li>

                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/cluster.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Cluster Capacity</b><br>
                      {{ $venue->cluster_cap }} People
                     </div> 
                     </div> 
                   </li>
					
				</ul>


                <h3 class="desc-headline">Venue Policies 
                 @can('update', $venue)
                  <a href="/venues/{{$venue->slug}}/edit#policies" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit Policies</a>
                 @endcan 
                </h3>
				

        <ul class="property-features terms margin-top-0">
					<li>Liquor Allowed : {!! in_array("liquor_allowed", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					<li>DJ Allowed : {!! in_array("dj_allowed", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					@if(in_array("liquor_allowed", json_decode($venue->parameters)))
					  <li>External Liquor : {!! in_array("external_liquor", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					@endif
					<li>External Catering :{!! in_array("external_catering", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
					@if(in_array("dj_allowed", json_decode($venue->parameters)))
					  <li>External DJ: {!! in_array("external_dj", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
					@endif
					<li>External Decorator : {!! in_array("external_decorator", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
				    @if($venue->rooms > 0)
					<li>Rooms : <span class="danger">Charged Seperately</span></li>
					@endif
					
				</ul>


                
                



				


				<!-- Location -->
				<h3 class="desc-headline no-border" id="location">Location 
          @can('update', $venue)
           <a href="/venues/{{$venue->slug}}/edit#location" style="font-size: 16px;" ><i class="fa fa-edit"></i> Edit Location</a>
          @endcan
        </h3>
				<div id="propertyMap-container">
					<div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
       
       
       <h3 class="desc-headline">Reviews &amp; Ratings</h3>
       @if(Auth::check()) 
           <form method="POST" action="/venues/{{$venue->slug}}/reviews">

             @include('layouts.errors')

             {{ csrf_field() }}
             <!-- Description -->
              <div class="form">
                <textarea placeholder="Write about this place..."  name="comment" cols="40" rows="3" id="comment" spellcheck="true">{{ old('comment') }}</textarea>
                </div>

                <input id="input-7-xs" name="rating" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>
            
                <div class="divider"></div>
                <button type="submit" class="button preview margin-top-5">Post Review <i class="fa fa-arrow-circle-right"></i></button>

              
           </form>

           @else

            <div class="notification notice large margin-bottom-55">
              <p>Login to review this place! <a href="/login"><b>Login Here</b></a></p>
            </div>

          @endif

       <hr/>

       @foreach($venue->reviews as $review)

          <div style="border: 1px solid #e3e3e3;padding: 15px;margin-top: 15px;">
            <h4>{{ $review->user->name }} <small>{{ $review->created_at->diffForHumans() }}</small>
            @if(auth()->id() == $review->user->id)
            <form action="/venues/{{$venue->slug}}/reviews/{{ $review->id }}" method="POST" class="pull-right">
              {{ csrf_field() }}
              
              {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-link"><i style="font-size: 22px;" class="fa fa-trash"></i></button>
              
            </form>
            @endif

            </h4>
            <hr/>
            <p>{{ $review->comment }}</p>

            <input id="input-8-xs" name="rating" class="rating rating-loading" data-display-only="true" data-readonly="true" value="{{ $review->rating }}" data-min="0" data-max="5" data-step="0.5" data-size="xs" data-show-clear="false">
            

          </div>



       @endforeach


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
         
           @if(!$venue->isFavourited)
            <button id="favourite" onclick="toggleFavourite()" class="widget-button save" data-save-title="Save" data-saved-title="Saved"><span class="like-icon"></span></button>

          @else
            <button id="unfavourite" onclick="toggleFavourite()" class="widget-button save liked" data-save-title="Save" data-saved-title="Saved"><span class="like-icon liked"></span></button>

          @endif  
        @endif
              
           
					
				</div>
				<!-- Widget / End -->

       @if(!Request::has('platform'))
				<!-- Widget -->
				<div class="widget">

					<!-- Agent Widget -->
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo"><img src="/images/avatar4.png" alt="" /></div>
							<div class="agent-details">
								<h4><a href="#">{{ $venue->contact_name }}</a></h4>
								<span><i class="fa fa-phone"></i>{{ $venue->phone }}</span><br>
							</div>
							<div class="clearfix"></div>
						</div>


            
            <input type="text" value="Landline : {{ $venue->landline }}" readonly>
            <input type="text" value="Website : {{ $venue->website }}" readonly>

           
           @can('update', $venue)
            <a href="/venues/{{$venue->slug}}/edit#contact" class="button fullwidth margin-top-5"><i class="fa fa-edit"></i> Edit Contact Info</a>
           @else
           	<a href="tel:{{ $venue->phone }}" class="button fullwidth margin-top-5">Get Price &amp; Availability</a>
           @endcan 
					</div>
					<!-- Agent Widget / End -->

				</div>
				<!-- Widget / End -->

				@endif


				<!-- Widget -->
				<div class="widget">
					<h3 class="margin-bottom-35">Sponsered</h3>

					<div class="listing-carousel outer">
						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Elite</span>
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

									<img src="/images/listing-03.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Elite</span>
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
										<span class="featured">Elite</span>
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
      
        <input type="text" class="form-control" readonly value="https://www.myeventino.com/venues/{{$venue->slug}}">
    </div>
      </div>
     
    </div>
  </div>
</div>


@endsection



@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    function toggleFavourite(argument) {

      axios.post("/venues/{{ $venue->slug }}/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection