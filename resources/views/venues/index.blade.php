@extends('layouts.app')

@section('content')

<div class="clearfix"></div>
<!-- Header Container / End -->

@if(Request::has('platform'))
   <a href="/venues/filter"  class="float visible-xs">
	<i class="fa fa-filter my-float"></i>
	</a>
@else
	<a href="#" id="search-trigger" class="float visible-xs">
	<i class="fa fa-filter my-float"></i>
	</a>
@endif


<!-- Search
================================================== -->
<section id="search-panel" class="search margin-bottom-50 hidden-xs">
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<!-- Title -->
			<h3 class="search-title">Find a perfect venue</h3>

			<!-- Form -->
			<div class="main-search-box no-shadow">

			 <form method="GET">


				<!-- Row With Forms -->
				<div class="row with-forms">

					<!-- Status -->
					<div class="col-md-3">
						<select data-placeholder="Event Type" name="event_type" class="chosen-select-no-single" >
						 @if(Request::has('event_type'))
							<option value="0" {{ Request::get('event_type') == '0' ? 'selected' : '' }}>-- Event Type --</option>
							<option value="all" {{ Request::get('event_type') == 'all' ? 'selected' : '' }}>All</option>
                            <option value="wedding" {{ Request::get('event_type') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                            <option value="party" {{ Request::get('event_type') == 'party' ? 'selected' : '' }}>Party</option>
                            <option value="meetings" {{ Request::get('event_type') == 'meetings' ? 'selected' : '' }}>Meetings &amp; Conferences</option>
                            <option value="ceremonies" {{ Request::get('event_type') == 'ceremonies' ? 'selected' : '' }}>Ceremonies</option>
                            <option value="date" {{ Request::get('event_type') == 'date' ? 'selected' : '' }}>Date</option>
                            <option value="others" {{ Request::get('event_type') == 'others' ? 'selected' : '' }}>Others</option>

                          @else 

                            <option value="0">-- Event Type --</option>
                            <option value="all">All</option>
                            <option value="wedding" >Wedding</option>
                            <option value="party" >Party</option>
                            <option value="meetings">Meetings &amp; Conferences</option>
                            <option value="ceremonies">Ceremonies</option>
                            <option value="date">Date</option>
                            <option value="others">Others</option>  

                          @endif  
						</select>
					</div>

					<!-- Property Type -->
					<div class="col-md-3">
						<select data-placeholder="Venue Type" name="venue_type" class="chosen-select-no-single">
                           @if(Request::has('venue_type'))

							  <option value="0" {{ Request::get('venue_type') == '0' ? 'selected' : '' }}>-- Venue Type --</option>
							   <option value="all" {{ Request::get('venue_type') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="banquet" {{ Request::get('venue_type') == 'banquet' ? 'selected' : '' }}>Banquet</option>
                                <option value="lawns" {{ Request::get('venue_type') == 'lawns' ? 'selected' : '' }}>Lawns</option>
                                <option value="dome" {{ Request::get('venue_type') == 'dome' ? 'selected' : '' }}>Dome</option>
                                <option value="resort" {{ Request::get('venue_type') == 'resort' ? 'selected' : '' }}>Resorts</option>
                                <option value="plot" {{ Request::get('venue_type') == 'plot' ? 'selected' : '' }}>Plots</option>
                                <option value="conference" {{ Request::get('venue_type') == 'conference' ? 'selected' : '' }}>Conference Room</option>
                            @else
                               <option value="0" >-- Venue Type --</option>
                                <option value="all">All</option>
                                <option value="banquet" >Banquet</option>
                                <option value="lawns" >Lawns</option>
                                <option value="dome" >Dome</option>
                                <option value="conference" >Conference Room</option>
                                <option value="resort">Resorts</option>
                                <option value="plot">Plots</option>


                            @endif    
						</select>
					</div>

					<!-- Main Search Input -->
					<div class="col-md-6">
						<div class="main-search-input">
							<input type="text" name="location" placeholder="Enter address e.g. street, city or state" value="{{ Request::has('location') ? Request::get('location') : '' }}"/>
							<button class="button" type="submit">Search</button>
						</div>
					</div>

				</div>
				<!-- Row With Forms / End -->


				<!-- Row With Forms -->
				<div class="row with-forms">

					<!-- Min Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input ">
							<input type="text" name="area" value="{{ Request::get('area') }}" placeholder="Area Required" data-unit="Sq Ft">
							
						</div>
						<!-- Select Input / End -->

					</div>

					<!-- Max Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input">
							<input type="text" name="people" value="{{ Request::get('people') }}" placeholder="No. Of People" data-unit="Count">
						
						</div>
						<!-- Select Input / End -->

					</div>


					<!-- Min Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input ">
							<input type="text" name="minprice" value="{{ Request::get('minprice') }}" placeholder="Min Price/Person" data-unit="INR">
							
						</div>
						<!-- Select Input / End -->

					</div>


					<!-- Max Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input">
							<input type="text" name="maxprice" value="{{ Request::get('maxprice') }}" placeholder="Max Price/Person" data-unit="INR">
							
						</div>
						<!-- Select Input / End -->

					</div>

					<!-- Max Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input">
							<select data-placeholder="Rating" name="rating" class="chosen-select-no-single">
							 @if(Request::has('rating'))
							 	<option label="blank" value="0" {{ Request::get('rating') == '0' ? 'selected' : '' }}></option>	
							 	<option value="all" {{ Request::get('rating') == 'all' ? 'selected' : '' }} >All</option>
								<option value="1" {{ Request::get('rating') == '1' ? 'selected' : '' }} >1+ Star</option>
                                <option value="2" {{ Request::get('rating') == '2' ? 'selected' : '' }} >2+ Stars</option>
                                <option value="3" {{ Request::get('rating') == '3' ? 'selected' : '' }} >3+ Stars</option>
                                <option value="4" {{ Request::get('rating') == '4' ? 'selected' : '' }} >4+ Stars</option>
                                <option value="5" {{ Request::get('rating') == '5' ? 'selected' : '' }}>5 Star</option>
							 @else
							    <option label="blank" value="0"></option>	
								<option value="all">All</option>
								<option value="1">1+ Star</option>
                                <option value="2" >2+ Star</option>
                                <option value="3" >3+ Star</option>
                                <option value="4" >4+ Star</option>
                                <option value="5">5 Star</option>
                             @endif   
							</select>
						
						</div>
						<!-- Select Input / End -->

					</div>

				</div>
				<!-- Row With Forms / End -->


				<!-- More Search Options -->
				<a href="#" class="more-search-options-trigger margin-top-10" data-open-title="More Options" data-close-title="Less Options"></a>

				<div class="more-search-options relative">
					<div class="more-search-options-container">

						


						<!-- Checkboxes -->
						<div class="checkboxes in-row">

						 @if(Request::has('facilities'))
					
							<input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning" 
							{{ in_array('air_conditioning', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-2" >Air Conditioning</label>

							<input id="check-3" type="checkbox" name="facilities[]" value="pool"
							{{ in_array('pool', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-3">Swimming Pool</label>

							<input id="check-4" type="checkbox" name="facilities[]" value="parking"
							{{ in_array('parking', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-4">Ample Parking</label>

							<input id="check-5" type="checkbox" name="facilities[]" value="power"
							{{ in_array('power', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-5">Power Backup</label>	


							<input id="check-6" type="checkbox" name="facilities[]" value="outdoor_games"
							{{ in_array('outdoor_games', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-6">Outdoor Games</label>

							<input id="check-24" type="checkbox" name="facilities[]" value="clubhouse"
							{{ in_array('clubhouse', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-24">Club House</label>

							<input id="check-7" type="checkbox" name="facilities[]" value="stage"
							{{ in_array('stage', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-7">Stage</label>

							<input id="check-8" type="checkbox" name="facilities[]" value="pa"
							{{ in_array('pa', Request::get('facilities')) ? 'checked' : '' }}> 
							<label for="check-8">PA System</label>

							<input id="check-9" type="checkbox" name="facilities[]" value="multilingual_staff"
							{{ in_array('multilingual_staff', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-9">Multilingual Staff</label>

							

							<input id="check-10" type="checkbox" name="facilities[]" value="cctv"
							{{ in_array('cctv', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-10">CCTV</label>

							<input id="check-11" type="checkbox" name="facilities[]" value="restaurant"
							{{ in_array('restaurant', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-11">Restaurant</label>

							<input id="check-12" type="checkbox" name="facilities[]" value="laundry"
							{{ in_array('laundry', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-12">Laundry</label>

							<input id="check-13" type="checkbox" name="facilities[]" value="valet"
							{{ in_array('valet', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-13">Valet Parking</label>

							@else

								<input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning">
				<label for="check-2">Air Conditioning</label>

				<input id="check-3" type="checkbox" name="facilities[]" value="pool">
				<label for="check-3">Swimming Pool</label>

				<input id="check-4" type="checkbox" name="facilities[]" value="parking">
				<label for="check-4">Ample Parking</label>

				<input id="check-5" type="checkbox" name="facilities[]" value="power">
				<label for="check-5">Power Backup</label>	


				<input id="check-6" type="checkbox" name="facilities[]" value="outdoor_games">
				<label for="check-6">Outdoor Games</label>

				<input id="check-24" type="checkbox" name="facilities[]" value="clubhouse">
				<label for="check-24">Club House</label>

				<input id="check-7" type="checkbox" name="facilities[]" value="stage">
				<label for="check-7">Stage</label>

				<input id="check-8" type="checkbox" name="facilities[]" value="pa"> 
				<label for="check-8">PA System</label>

				<input id="check-9" type="checkbox" name="facilities[]" value="multilingual_staff">
				<label for="check-9">Multilingual Staff</label>

				

				<input id="check-10" type="checkbox" name="facilities[]" value="cctv">
				<label for="check-10">CCTV</label>

				<input id="check-11" type="checkbox" name="facilities[]" value="restaurant">
				<label for="check-11">Restaurant</label>

				<input id="check-12" type="checkbox" name="facilities[]" value="laundry">
				<label for="check-12">Laundry</label>

				<input id="check-13" type="checkbox" name="facilities[]" value="valet">
				<label for="check-13">Valet Parking</label>	

							@endif
					
						</div>
						<!-- Checkboxes / End -->
                      
                      <div class="checkboxes in-row">

                        @if(Request::has('parameters'))


			                <input id="check-15" type="checkbox" name="parameters[]" value="dj_allowed"
			                {{ in_array('dj_allowed', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-15">DJ Allowed</label>

							<input id="check-16" type="checkbox" name="parameters[]" value="liquor_allowed"
							{{ in_array('liquor_allowed', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-16">Liquor Allowed</label>
					
							<input id="check-17" type="checkbox" name="parameters[]" value="external_dj"
							{{ in_array('external_dj', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-17">External DJ</label>

							<input id="check-18" type="checkbox" name="parameters[]" value="external_liquor"
							{{ in_array('external_liquor', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-18">External Liqour</label>

							<input id="check-19" type="checkbox" name="parameters[]" value="external_decorator"
							{{ in_array('external_decorator', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-19">External Decorator</label>

							<input id="check-20" type="checkbox" name="parameters[]" value="external_planner"
							{{ in_array('external_planner', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-20">External Event Planner</label>

							<input id="check-21" type="checkbox" name="parameters[]" value="external_catering"
							{{ in_array('external_catering', Request::get('parameters')) ? 'checked' : '' }}>
							<label for="check-21">External Catering</label>

						@else	

                      	
	                      	<input id="check-15" type="checkbox" name="parameters[]" value="dj_allowed">
							<label for="check-15">DJ Allowed</label>

							<input id="check-16" type="checkbox" name="parameters[]" value="liquor_allowed">
							<label for="check-16">Liquor Allowed</label>
					
							<input id="check-17" type="checkbox" name="parameters[]" value="external_dj">
							<label for="check-17">External DJ</label>

							<input id="check-18" type="checkbox" name="parameters[]" value="external_liquor">
							<label for="check-18">External Liqour</label>

							<input id="check-19" type="checkbox" name="parameters[]" value="external_decorator">
							<label for="check-19">External Decorator</label>

							<input id="check-20" type="checkbox" name="parameters[]" value="external_planner">
							<label for="check-20">External Event Planner</label>

							<input id="check-21" type="checkbox" name="parameters[]" value="external_catering">
							<label for="check-21">External Catering</label>

						@endif	
                      </div>



					</div>

				</div>
				<!-- More Search Options / End -->

              
              </form>
			</div>
			<!-- Box / End -->
		</div>
	</div>
</div>
</section>



<!-- Content
================================================== -->
<div class="container">
	<div class="row fullwidth-layout">

		<div class="col-md-12">

			<!-- Sorting / Layout Switcher -->
			<div class="row margin-bottom-15">

				<div class="col-md-6">
					<!-- Sort by 
					<div class="sort-by">
						<label>Sort by:</label>

						<div class="sort-by-select">
							<select data-placeholder="Default order" class="chosen-select-no-single" >
								<option>Default Order</option>	
								<option>Price Low to High</option>
								<option>Price High to Low</option>
								<option>Newest Venues</option>
								<option>Oldest Venues</option>
							</select>
						</div>
					</div>-->
				</div>

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">

						<a href="#" class="grid-three"><i class="fa fa-th"></i></a>

						<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
						<a href="#" class="list"><i class="fa fa-th-list"></i></a>
					</div>
				</div>
			</div>

			
			<!-- Listings -->
			<div class="listings-container grid-layout-three">


			@foreach($venues as $venue)

				<!-- Listing Item -->
				<div class="listing-item">

						<a href="/venues/{{ $venue->slug }}" class="listing-img-container">

							<div class="listing-badges">
							    <span class="featured">Elite</span>
								<span><i class="fa fa-map-marker"></i> {{ $venue->city }}</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">&#8377 {{ $venue->serves_from }} <i>per plate</i></span>
								  @if(!$venue->isFavourited)
						        <span  class="like-icon" onclick="toggleFavourite({{$venue->id}})"></span>

						        @else
						         <span  class="like-icon liked" onclick="toggleFavourite({{$venue->id}})"></span>

						        @endif 

						        <i hidden="true" id="{{$venue->id}}" data-slug="{{$venue->slug}}"></i>
							</div>

							
                            <div class="listing-carousel">
                            	@foreach($venue->photos as $photo)
                                  <div><img src="{{ asset($photo->thumbnail_path) }}" alt=""></div>
                                @endforeach 
                            </div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="/venues/{{ $venue->slug }}">{{ $venue->venue_name }}</a><br>
								 @foreach($venue->types as $type)
								  <span class="badge">{{ ucwords($type) }}</span> 
								 @endforeach 
								</h4>
								<a href="https://maps.google.com/maps?q=Racca+Estate,+Old+Gangapur+Naka+Hanuman+Wadi,+Hanumanwadi+Road,+Panchavati,+Nashik,+Maharashtra+422003,+India" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									<?= substr( $venue->address , 0, 60); ?>...
								</a>
							</div>

							<ul class="listing-features">
								<li>Rating <span><i class="fa fa-star"></i> {{ $venue->avg_rating }}</span></li>
								<li>Capacity <span>{{ $venue->min_cap }}-{{ $venue->max_cap }}</span></li>
								<li>Reviews <span>{{ count($venue->reviews) }}</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> 36 Favourites</a>
								<span><i class="fa fa-eye"></i> 19 Views</span>
							</div>

						</div>

					</div>
				<!-- Listing Item / End -->

               
               @endforeach
				

				
				

			</div>
			<!-- Listings Container / End -->

			<div class="clearfix"></div>
			<!-- Pagination -->
			<div class="pagination-container margin-top-20">
			

			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>

@endsection




@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    function toggleFavourite(id) {
    	console.log('clicked');
      
       
      var slug = $('#' + id).data('slug');

      console.log(id);
       
      axios.post("/venues/" + slug + "/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection
