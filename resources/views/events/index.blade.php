@extends('layouts.app')


@section('css')

<link rel="stylesheet" type="text/css" href="/css/plugins.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/css/multidate.css">

<style type="text/css">
	
	.ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
		    background: #192942 none;
		    color: white;
		}

</style>

@endsection

@section('content')


<div class="clearfix"></div>
<!-- Header Container / End -->



@if(Request::has('platform'))
   <a href="/events/filter"  class="float visible-xs">
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
			<h3 class="search-title">Find an interesting event to visit!</h3>

			<!-- Form -->
			<div class="main-search-box no-shadow">

			 <form method="GET">


				<!-- Row With Forms -->
				<div class="row with-forms">

					<!-- Status -->
					<div class="col-md-3">
						
                      <select class="chosen-select-no-single" name="event_type" data-placeholder="Event Type">
							 @if(Request::has('event_type'))
								<option value="0" {{ Request::get('event_type') == '0' ? 'selected' : '' }}>-- Event Type --</option>
								<option value="play" {{ Request::get('event_type') == 'play' ? 'selected' : '' }}>Play</option>
								<option value="conference" {{ Request::get('event_type') == 'conference' ? 'selected' : '' }}>Conferences</option>
		                        <option value="workshop" {{ Request::get('event_type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
		                        <option value="exihibition"{{ Request::get('event_type') == 'exihibition' ? 'selected' : '' }}>Exhibition</option>
		                        <option value="concert" {{ Request::get('event_type') == 'concert' ? 'selected' : '' }} >Concert</option>
		                        <option value="music-film" {{ Request::get('event_type') == 'music-film' ? 'selected' : '' }}>Musical/Film Festivals</option>
		                        <option value="fest" {{ Request::get('event_type') == 'fest' ? 'selected' : '' }}>Fest</option>
		                        <option value="party" {{ Request::get('event_type') == 'party' ? 'selected' : '' }}>Parites</option>
		                        <option value="club-pub" {{ Request::get('event_type') == 'club-pub' ? 'selected' : '' }}>Club and Pub Events</option>
		                        <option value="standup" {{ Request::get('event_type') == 'standup' ? 'selected' : '' }}>Stand-Up Comedy</option>
		                        <option value="kids" {{ Request::get('event_type') == 'kids' ? 'selected' : '' }}>Kids Activity</option>
		                        <option value="adventure" {{ Request::get('event_type') == 'adventure' ? 'selected' : '' }}>Adventure</option>
		                        <option value="arts" {{ Request::get('event_type') == 'arts' ? 'selected' : '' }}>Arts &amp; Culture</option>
		                        <option value="travel" {{ Request::get('event_type') == 'travel' ? 'selected' : '' }}>Travel</option>
		                        <option value="entertainment" {{ Request::get('event_type') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
		                        <option value="others" {{ Request::get('event_type') == 'others' ? 'selected' : '' }}>Others</option>

	                          @else 
	                          	<option label="blank"></option>	
								<option value="play">Play</option>
								<option value="conference">Conferences</option>
		                        <option value="workshop">Workshop</option>
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

						<!-- Status -->
				<div class="col-md-3">
					
					<input name="dates" id="datesPicker" value="{{ Request::get('dates') }}"  placeholder="Event Dates" readonly="">

					
				</div>

					<!-- Max Price -->
					<div class="col-md-3">
						
						<!-- Select Input -->
						<div class="select-input">
							<select data-placeholder="Event Starts" name="event_time" class="chosen-select-no-single">
							 @if(Request::has('event_time'))
							 	<option label="blank" value="0" {{ Request::get('event_time') == '0' ? 'selected' : '' }}></option>	
								<option value="all" {{ Request::get('event_time') == 'all' ? 'selected' : '' }} >All</option>
                                <option value="10" {{ Request::get('event_time') == '10' ? 'selected' : '' }} >Morning</option>
                                <option value="12" {{ Request::get('event_time') == '12' ? 'selected' : '' }} >Afternoon</option>
                                <option value="16" {{ Request::get('event_time') == '16' ? 'selected' : '' }} >Evening</option>
                                <option value="19" {{ Request::get('event_time') == '19' ? 'selected' : '' }}>Night</option>
							 @else
							    <option label="blank" value="0"></option>	
								<option value="all">All</option>
                                <option value="10" >Morning</option>
                                <option value="12" >Afternoon</option>
                                <option value="16" >Evening</option>
                                <option value="19">Night</option>
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
	<div class="row sticky-wrapper">

		<div class="col-md-12">

			
			

			
			<!-- Listings Container -->
			<div class="row">


			 @foreach($events as $event)



				<!-- Listing Item -->
				<div class="col-md-4">
					<div class="listing-item compact">

						<a href="/events/{{$event->slug}}" class="listing-img-container">

							<div class="listing-badges">
								<span class="featured">Featured</span>
								<span><i class="fa fa-map-marker"></i> {{ $event->city }}</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-compact-title">{{ $event->name }} <i> &#8377 {{ $event->starting_price }}/person onwards</i></span>

								<ul class="listing-hidden-content">
									<li>Date <span>{{ $event->event_dates }}</span></li>
									<li>Timings <span>{{ $event->event_timings }}</span></li>
								</ul>
							</div>
                            
                            <img src="{{ count($event->photos) ? $event->photos()->latest()->first()->thumbnail_path : '' }}" alt="">
						</a>

					</div>
				</div>
				<!-- Listing Item / End -->

			@endforeach	

				

			</div>
			<!-- Listings Container / End -->

			
			<!-- Pagination -->
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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<script src="/js/multidate.js"></script>

<script type="text/javascript">
	
       $('#datesPicker').multiDatesPicker({ dateFormat: 'dd-mm-yy' });
     

</script>

@endsection