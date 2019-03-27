@extends('layouts.app')


@section('content')

<div class="clearfix"></div>
<!-- Header Container / End -->
<a href="/events/filter" class="float visible-xs">
<i class="fa fa-filter my-float"></i>
</a>

<!-- Search
================================================== -->
<section id="search-panel" class="search margin-bottom-50 hidden-xs">
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<!-- Title -->
			<h3 class="search-title">Find perfect vendors as per your need!</h3>

			<!-- Form -->
			<div class="main-search-box no-shadow">
 
			 <form method="GET">


				<!-- Row With Forms -->
				<div class="row with-forms">

					<!-- Status -->
					<div class="col-md-6">
						
                      <select class="chosen-select-no-single" name="vendor_types"  data-placeholder="Vendor Types">
							 @if(Request::has('vendor_types'))
								<option value="0" {{ Request::get('vendor_types') == '0' ? 'selected' : '' }}>-- Vendor Types --</option>
								<option value="photography" {{ Request::get('vendor_types') == 'photography' ? 'selected' : '' }}>Photographer</option>
								<option value="conference" {{ Request::get('vendor_types') == 'conference' ? 'selected' : '' }}>Mehendi</option>
		                        <option value="workshop" {{ Request::get('vendor_types') == 'workshop' ? 'selected' : '' }}>Bride Makeup</option>
		                        <option value="exihibition"{{ Request::get('vendor_types') == 'exihibition' ? 'selected' : '' }}>Exhibition</option>
		                        <option value="concert" {{ Request::get('vendor_types') == 'concert' ? 'selected' : '' }} >Concert</option>
		                        <option value="music-film" {{ Request::get('vendor_types') == 'music-film' ? 'selected' : '' }}>Musical/Film Festivals</option>
		                        <option value="fest" {{ Request::get('vendor_types') == 'fest' ? 'selected' : '' }}>Fest</option>
		                        <option value="party" {{ Request::get('vendor_types') == 'party' ? 'selected' : '' }}>Parites</option>
		                        <option value="club-pub" {{ Request::get('vendor_types') == 'club-pub' ? 'selected' : '' }}>Club and Pub Events</option>
		                        <option value="standup" {{ Request::get('vendor_types') == 'standup' ? 'selected' : '' }}>Stand-Up Comedy</option>
		                        <option value="kids" {{ Request::get('vendor_types') == 'kids' ? 'selected' : '' }}>Kids Activity</option>
		                        <option value="adventure" {{ Request::get('vendor_types') == 'adventure' ? 'selected' : '' }}>Adventure</option>
		                        <option value="arts" {{ Request::get('vendor_types') == 'arts' ? 'selected' : '' }}>Arts &amp; Culture</option>
		                        <option value="travel" {{ Request::get('vendor_types') == 'travel' ? 'selected' : '' }}>Travel</option>
		                        <option value="entertainment" {{ Request::get('vendor_types') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
		                        <option value="others" {{ Request::get('vendor_types') == 'others' ? 'selected' : '' }}>Others</option>

	                          @else 
	                          	<option label="blank"></option>	
								<option value="play" >Photographer</option>
								<option value="conference" >Mehendi</option>
		                        <option value="workshop">Bride Makeup</option>
		                        <option value="exihibition" >Exhibition</option>
		                        <option value="concert" >Concert</option>
		                        <option value="music-film">Musical/Film Festivals</option>
		                        <option value="fest">Fest</option>
		                        <option value="party">Parites</option>
		                        <option value="club-pub">Club and Pub Events</option>
		                        <option value="standup">Stand-Up Comedy</option>
		                        <option value="kids">Kids Activity</option>
		                        <option value="adventure">Adventure</option>
		                        <option value="arts">Arts &amp; Culture</option>
		                        <option value="travel">Travel</option>
		                        <option value="entertainment">Entertainment</option>
		                        <option value="others">Others</option>

						

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

						<!-- Status -->
				

					<!-- Max Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input">
							<select data-placeholder="Experience" name="experience" class="chosen-select-no-single">
							 @if(Request::has('experience'))
							 	<option label="blank" value="0" {{ Request::get('experience') == '0' ? 'selected' : '' }}></option>	
							 	<option value="all" {{ Request::get('experience') == 'all' ? 'selected' : '' }} >All</option>
								<option value="1" {{ Request::get('experience') == '1' ? 'selected' : '' }} >1+ Year</option>
                                <option value="3" {{ Request::get('experience') == '3' ? 'selected' : '' }} >3+ Years</option>
                                <option value="5" {{ Request::get('experience') == '5' ? 'selected' : '' }} >5+ Years</option>
                                <option value="7" {{ Request::get('experience') == '7' ? 'selected' : '' }} >7+ Years</option>
                                <option value="10" {{ Request::get('experience') == '10' ? 'selected' : '' }}>10+ Years</option>
							 @else
							    <option label="blank" value="0"></option>	
								<option value="all">All</option>
								<option value="1">1+ Year</option>
                                <option value="3" >3+ Years</option>
                                <option value="5" >5+ Years</option>
                                <option value="7" >7+ Years</option>
                                <option value="10">10+ Years</option>
                             @endif   
							</select>
						
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
							<label for="check-2">Air Conditioning</label>

							<input id="check-4" type="checkbox" name="facilities[]" value="parking"
							{{ in_array('parking', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-4">Ample Parking</label>

							<input id="check-5" type="checkbox" name="facilities[]" value="power"
							{{ in_array('power', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-5">Power Backup</label>	

							<input id="check-10" type="checkbox" name="facilities[]" value="cctv"
							{{ in_array('cctv', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-10">CCTV</label>

							<input id="check-11" type="checkbox" name="facilities[]" value="food"
							{{ in_array('food', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-11">Food Available</label>

							<input id="check-13" type="checkbox" name="facilities[]" value="valet"
							{{ in_array('valet', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-13">Valet Parking</label>

							<input id="check-14" type="checkbox" name="facilities[]" value="guests"
							{{ in_array('guests', Request::get('facilities')) ? 'checked' : '' }}>
							<label for="check-14">International Guests</label>



							@else

								 <input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning">
								<label for="check-2">Air Conditioning</label>

								<input id="check-4" type="checkbox" name="facilities[]" value="parking">
								<label for="check-4">Ample Parking</label>

								<input id="check-5" type="checkbox" name="facilities[]" value="power">
								<label for="check-5">Power Backup</label>	

								<input id="check-10" type="checkbox" name="facilities[]" value="cctv">
								<label for="check-10">CCTV</label>

								<input id="check-11" type="checkbox" name="facilities[]" value="food">
								<label for="check-11">Food Available</label>

								<input id="check-13" type="checkbox" name="facilities[]" value="valet">
								<label for="check-13">Valet Parking</label>

								<input id="check-14" type="checkbox" name="facilities[]" value="guests">
								<label for="check-14">International Guests</label>

							@endif
					
						</div>
						<!-- Checkboxes / End -->
                      
                     



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


			@foreach($vendors as $vendor)

				<!-- Listing Item -->
				<div class="listing-item">

						<a href="/vendors/{{ $vendor->slug }}" class="listing-img-container">

							<div class="listing-badges">
							    <span class="featured">Elite</span>
								<span><i class="fa fa-map-marker"></i> {{ $vendor->city }}</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">&#8377 {{ $vendor->starting_package }} <i>onwards</i></span>
								  @if(!$vendor->isFavourited)
						        <span  class="like-icon" onclick="toggleFavourite({{$vendor->id}})"></span>

						        @else
						         <span  class="like-icon liked" onclick="toggleFavourite({{$vendor->id}})"></span>

						        @endif 

						        <i hidden="true" id="{{$vendor->id}}" data-slug="{{$vendor->slug}}"></i>
							</div>

							
                            <div class="listing-carousel">
                            	@foreach($vendor->photos as $photo)
                                  <div><img src="{{ asset($photo->thumbnail_path) }}" alt=""></div>
                                @endforeach 
                            </div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="/vendors/{{ $vendor->slug }}">{{ $vendor->name }}</a><br>
								 @foreach($vendor->vendor_types as $type)
								  <span class="badge">{{ ucwords($type) }}</span> 
								 @endforeach 
								</h4>
								<a href="https://maps.google.com/maps?q=Racca+Estate,+Old+Gangapur+Naka+Hanuman+Wadi,+Hanumanwadi+Road,+Panchavati,+Nashik,+Maharashtra+422003,+India" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									<?= substr( $vendor->address , 0, 60); ?>...
								</a>
							</div>

							<ul class="listing-features">
								<li>Rating <span><i class="fa fa-star"></i> {{ $vendor->avg_rating }}</span></li>
								<li>Reviews <span>{{ count($vendor->reviews) }}</span></li>
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
       
      axios.post("/vendors/" + slug + "/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection
