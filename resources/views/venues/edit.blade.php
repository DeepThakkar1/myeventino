@extends('layouts.app')


@section('css')

<link rel="stylesheet" type="text/css" href="/css/plugins.css">

@endsection


@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2><i class="fa fa-edit"></i> Editing - {{ $venue->venue_name }}</h2>
			</div>
			<div class="col-md-2">
			<a href="/venues/{{$venue->slug}}/sections" class="button preview ">Manage Sections<i class="fa fa-arrow-circle-right"></i></a>
			</div>
			<div class="col-md-2">
				<a href="/venues/{{$venue->slug}}/" class="button preview ">Preview My Page <i class="fa fa-arrow-circle-right"></i></a>
				
			</div>

		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
<div class="row">

	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">

		
      

      @include('layouts.errors')

     



		

		<form action="/venues/{{$venue->slug}}" method="POST">

		{{ csrf_field() }}

		

		<!-- Section -->
		<h3 id="basic">Basic Information</h3>
		<div class="submit-section" >

		

			<!-- Title -->
			<div class="form">
				<h5>Venue Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" name="venue_name" type="text" value="{{ $venue->venue_name }}" required="true" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Venue Type</h5>
					<select class="chosen-select-no-single" name="venue_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						<option 
						   value="banquet" {{ in_array('banquet', json_decode($venue->venue_type)) ? 'selected' : '' }} >
						   Banquet
						</option>
                        <option 
                             value="lawns" {{ in_array('lawns', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                             Lawns
                        </option>
                        <option 
                    		value="dome" {{ in_array('dome', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                            Dome
                        </option>
                        <option 
                            value="resort" {{ in_array('resort', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                            Resort
                        </option>
                        <option 
                            value="plot" {{ in_array('plot', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                            Plot
                        </option>
                        <option 
                            value="conference" {{ in_array('conference', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                            Conference Room
                        </option>

                         <option 
                            value="other" {{ in_array('other', json_decode($venue->venue_type)) ? 'selected' : '' }} >
                            Others
                        </option>

					</select>
				</div>

				<!-- Type -->
				<div class="col-md-6">
					<h5>Best For</h5>
					<select class="chosen-select-no-single" name="best_for[]"  multiple="true" required="true">
						<option label="blank"></option>		
						<option 
							value="wedding" {{ in_array('other', json_decode($venue->best_for)) ? 'selected' : '' }}>
							Wedding
						</option>
						<option 
							value="party" {{ in_array('party', json_decode($venue->best_for)) ? 'selected' : '' }}>
							Party
						</option>
						<option 
							value="conference" {{ in_array('conference', json_decode($venue->best_for)) ? 'selected' : '' }}>
							Conference
						</option>
						<option 
							value="ceremonies" {{ in_array('ceremonies', json_decode($venue->best_for)) ? 'selected' : '' }}>
							Ceremonies
						</option>
						<option 
							value="other" {{ in_array('other', json_decode($venue->best_for)) ? 'selected' : '' }}>
							Other
						</option>
					</select>
				</div>

			</div>
			<!-- Row / End -->


			<!-- Row -->
			<div class="row with-forms">

				
				
				<!-- Area -->
				<div class="col-md-6">
					<h5>Total Area</h5>
					<div class="select-input disabled-first-option">
						<input type="text" name="total_area" value="{{ $venue->total_area }}" data-unit="Sq Ft" required="true">
					</div>
				</div>

				<!-- Rooms 			
				<div class="col-md-6">
					<h5>No of Sections <i class="tip" data-tip-content="How many different sections like halls,lawns etc. your venue has."></i></h5>
					<div class="select-input disabled-first-option">
						<input type="text" name="sections" value="" data-unit="Count" required="true">
					</div>
				</div> -->

				

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->

		




	


		<!-- Section -->
		<h3 id="location">Location</h3>
		<div class="submit-section" >

			<!-- Row -->
			<div class="row with-forms">

				<!-- Address -->
				<div class="col-md-6">
					<h5>Address</h5>
					<input name="address" type="text" required="true" value="{{ $venue->address }}">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>City</h5>
					<input name="city" type="text" required="true" value="{{ $venue->city }}">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>State</h5>
					<input name="state" type="text" required="true" value="{{ $venue->state }}">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Country</h5>
					<input name="country" type="text" required="true" value="{{ $venue->country }}">
				</div>

				<!-- Zip-Code -->
				<div class="col-md-6">
					<h5>Zip-Code</h5>
					<input name="pincode" type="text" required="true" value="{{ $venue->pincode }}">
				</div>

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->


		<!-- Section -->
		<h3 id="details">Detailed Information</h3>
		<div class="submit-section" ">

			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea  name="description" cols="40" rows="3" id="description" spellcheck="true">{{ $venue->description }}</textarea>
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Age of Home -->
				<div class="col-md-6">
					<h5>Venue Since <span>(optional)</span></h5>
					<select name="venue_since" class="chosen-select-no-single" required="true">
						<option label="blank"></option>	
						<?php $year = date('Y'); ?>
						@for($i = $year; $i >= 1950; $i--)
						 <option {{ $venue->venue_since == $i ? 'selected' : '' }} >{{ $i }}</option>
						@endfor
					</select>
				</div>

				<!-- Beds -->
				<div class="col-md-6">
					<h5>Rooms Available</h5>
					<select name="rooms" class="chosen-select-no-single" required="true">
						<option label="blank"></option>	
						<option value="0" {{ $venue->rooms == 0 ? 'selected' : '' }}>Not Available</option>
						<option value="1" {{ $venue->rooms == 1 ? 'selected' : '' }}>1</option>
						<option value="2" {{ $venue->rooms == 2 ? 'selected' : '' }}>2</option>
						<option value="3" {{ $venue->rooms == 3 ? 'selected' : '' }}>3</option>
						<option value="4" {{ $venue->rooms == 4 ? 'selected' : '' }}>4</option>
						<option value="5" {{ $venue->rooms == 5 ? 'selected' : '' }}>More than 4</option>
					</select>
				</div>

				<!-- Area -->
				<div class="col-md-6">
					<h5>Distance From Railway Station</h5>
					<div class="select-input disabled-first-option">
						<input name="railway" type="text" data-unit="Km"  value="{{ $venue->railway }}">
					</div>
				</div>

				<!-- Area -->
				<div class="col-md-6">
					<h5>Distance From Airport</h5>
					<div class="select-input disabled-first-option">
						<input name="airport" type="text" data-unit="Km" value="{{ $venue->airport }}">
					</div>
				</div>

				<!-- Area -->
				<div class="col-md-12">
					<h5>Exclusive Features</h5>
						
                  <input type="text" name="exclusive_features" class="rs-selectize-tags" value="{{ $venue->exclusive_features }}" >
					
				</div>


				

			</div>
			<!-- Row / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30" id="facilities">Facilities Available</h5>
			<div class="checkboxes in-row margin-bottom-20">
		
				<input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning" 
				{{ in_array('air_conditioning', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-2" >Air Conditioning</label>

				<input id="check-3" type="checkbox" name="facilities[]" value="pool"
				{{ in_array('pool', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-3">Swimming Pool</label>

				<input id="check-4" type="checkbox" name="facilities[]" value="parking"
				{{ in_array('parking', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-4">Ample Parking</label>

				<input id="check-5" type="checkbox" name="facilities[]" value="power"
				{{ in_array('power', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-5">Power Backup</label>	


				<input id="check-6" type="checkbox" name="facilities[]" value="outdoor_games"
				{{ in_array('outdoor_games', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-6">Outdoor Games</label>

				<input id="check-24" type="checkbox" name="facilities[]" value="clubhouse"
				{{ in_array('clubhouse', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-24">Club House</label>

				<input id="check-7" type="checkbox" name="facilities[]" value="stage"
				{{ in_array('stage', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-7">Stage</label>

				<input id="check-8" type="checkbox" name="facilities[]" value="pa"
				{{ in_array('pa', json_decode($venue->facilities)) ? 'checked' : '' }}> 
				<label for="check-8">PA System</label>

				<input id="check-9" type="checkbox" name="facilities[]" value="multilingual_staff"
				{{ in_array('multilingual_staff', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-9">Multilingual Staff</label>

				

				<input id="check-10" type="checkbox" name="facilities[]" value="cctv"
				{{ in_array('cctv', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-10">CCTV</label>

				<input id="check-11" type="checkbox" name="facilities[]" value="restaurant"
				{{ in_array('restaurant', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-11">Restaurant</label>

				<input id="check-12" type="checkbox" name="facilities[]" value="laundry"
				{{ in_array('laundry', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-12">Laundry</label>

				<input id="check-13" type="checkbox" name="facilities[]" value="valet"
				{{ in_array('valet', json_decode($venue->facilities)) ? 'checked' : '' }}>
				<label for="check-13">Valet Parking</label>
			</div>
			<!-- Checkboxes / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30" id="policies">Additional Parameters</h5>
			<div class="checkboxes in-row margin-bottom-20">
                
                <input id="check-15" type="checkbox" name="parameters[]" value="dj_allowed"
                {{ in_array('dj_allowed', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-15">DJ Allowed</label>

				<input id="check-16" type="checkbox" name="parameters[]" value="liquor_allowed"
				{{ in_array('liquor_allowed', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-16">Liquor Allowed</label>
		
				<input id="check-17" type="checkbox" name="parameters[]" value="external_dj"
				{{ in_array('external_dj', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-17">External DJ</label>

				<input id="check-18" type="checkbox" name="parameters[]" value="external_liquor"
				{{ in_array('external_liquor', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-18">External Liqour</label>

				<input id="check-19" type="checkbox" name="parameters[]" value="external_decorator"
				{{ in_array('external_decorator', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-19">External Decorator</label>

				<input id="check-20" type="checkbox" name="parameters[]" value="external_planner"
				{{ in_array('external_planner', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-20">External Event Planner</label>

				<input id="check-21" type="checkbox" name="parameters[]" value="external_catering"
				{{ in_array('external_catering', json_decode($venue->parameters)) ? 'checked' : '' }}>
				<label for="check-21">External Catering</label>



				
		
			</div>
			<!-- Checkboxes / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30" id="food">Food Available(If Provided)</h5>
			<div class="checkboxes in-row margin-bottom-20">
                
                <input id="check-22" type="checkbox" name="food_available[]" value="veg"
                {{ in_array('veg', json_decode($venue->food_available)) ? 'checked' : '' }}>
				<label for="check-22">Vegeterian</label>

				<input id="check-23" type="checkbox" name="food_available[]" value="non_veg"
				{{ in_array('non_veg', json_decode($venue->food_available)) ? 'checked' : '' }}>
				<label for="check-23">Non Vegeterian</label>
		
				<input id="check-25" type="checkbox" name="food_available[]" value="jain"
				{{ in_array('jain', json_decode($venue->food_available)) ? 'checked' : '' }}>
				<label for="check-25">Jain Food</label>

						
			</div>
			<!-- Checkboxes / End -->



		</div>
		<!-- Section / End -->


		<!-- Section -->
		<h3 id="contact">Contact Details</h3>
		<div class="submit-section" >

			<!-- Row -->
			<div class="row with-forms">

				<!-- Name -->
				<div class="col-md-4">
					<h5>Name</h5>
					<input name="contact_name" type="text" required="true" value="{{ $venue->contact_name }}">
				</div>

				<!-- Email -->
				<div class="col-md-4">
					<h5>E-Mail</h5>
					<input name="email" type="text" required="true" value="{{ $venue->email }}">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Phone</h5>
					<input name="phone" type="text" required="true" value="{{ $venue->phone }}">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Landline</h5>
					<input name="landline" type="text" required="true" value="{{ $venue->landline }}">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Website</h5>
					<input name="website" type="text" required="true" value="{{ $venue->website }}">
				</div>

				

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->



			<!-- Section 
		<h3>Gallery</h3>
		<div class="submit-section">
			<div class="dropzone" ></div>
		</div>
		Section / End -->


		



		<div class="divider"></div>
		<button type="submit" class="button preview margin-top-5">Save Changes <i class="fa fa-arrow-circle-right"></i></button>

		</form>
		</div>

	</div>

</div>
</div>

<div class="margin-top-55"></div>

@endsection


@section('js')

<script src="/js/selectize.min.js"></script>
 
<script src="/js/selectize-example.js"></script>

@endsection