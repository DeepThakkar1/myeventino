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
			<div class="col-md-12">
			    <a href="{{ url()->previous() }}" class="back-to-listings"></a>
				<h2><i class="fa fa-plus-circle"></i> List your Venue For Free</h2>
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

		@if(Auth::guest())

			<div class="notification notice large margin-bottom-55">
				<h4>Don't Have an Account?</h4>
				<p>If you don't have an account your account will be created by entering your email address in contact details section. A password will be automatically emailed to you.</p>
			</div>

		@endif
      

      @include('layouts.errors')



		

		<form action="/venues" method="POST">

		{{ csrf_field() }}

		<!-- Section -->
		<h3>Basic Information</h3>
		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Venue Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" name="venue_name" type="text" value="{{ old('venue_name') }}" required="true" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Venue Type</h5>
					<select class="chosen-select-no-single" name="venue_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						 <option value="banquet" >Banquet</option>
                        <option value="lawns" >Lawns</option>
                        <option value="dome" >Dome</option>
                        <option value="resort" >Resort</option>
                        <option value="plot" >Plot</option>
                        <option value="conference" >Conference Room</option>
                    	<option value="other" >Other</option>
					</select>
				</div>

				<!-- Type -->
				<div class="col-md-6">
					<h5>Best For</h5>
					<select class="chosen-select-no-single" name="best_for[]"  multiple="true" required="true">
						<option label="blank"></option>		
						<option value="wedding">Wedding</option>
						<option value="party">Party</option>
						<option value="conference">Conference</option>
						<option value="ceremonies">Ceremonies</option>
						<option value="other">Other</option>
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
						<input type="text" name="total_area" data-unit="Sq Ft" value="{{ old('total_area') }}" required="true">
					</div>
				</div>

				<!-- Rooms 		
				<div class="col-md-6">
					<h5>No of Sections <i class="tip" data-tip-content="How many different sections like halls,lawns etc. your venue has."></i></h5>
					<div class="select-input disabled-first-option">
						<input type="text" name="sections" data-unit="Count" required="true">
					</div>
				</div>-->	

				

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->

		




	


		<!-- Section -->
		<h3>Location</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

				<!-- Address -->
				<div class="col-md-6">
					<h5>Address</h5>
					<input name="address" type="text" value="{{ old('address') }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>City</h5>
					<input name="city" type="text" value="{{ old('city') }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>State</h5>
					<input name="state" type="text" value="{{ old('state') }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Country</h5>
					<input name="country" type="text" value="{{ old('country') }}" required="true">
				</div>

				<!-- Zip-Code -->
				<div class="col-md-6">
					<h5>Zip-Code</h5>
					<input name="pincode" type="text" value="{{ old('pincode') }}" required="true">
				</div>

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->


		<!-- Section -->
		<h3>Detailed Information</h3>
		<div class="submit-section">

			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea  name="description" cols="40" rows="3" id="description" spellcheck="true">{{ old('description') }}</textarea>
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
						 <option {{ old('venue_since') == $i ? 'selected' : '' }}>{{ $i }}</option>
						@endfor
					</select>
				</div>

				<!-- Beds -->
				<div class="col-md-6">
					<h5>Rooms Available</h5>
					<select name="rooms" class="chosen-select-no-single" required="true">
						<option label="blank"></option>	
						<option value="0" {{ old('rooms') == 0 ? 'selected' : '' }}>Not Available</option>
						<option value="1" {{ old('rooms') == 1 ? 'selected' : '' }}>1</option>
						<option value="2" {{ old('rooms') == 2 ? 'selected' : '' }}>2</option>
						<option value="3" {{ old('rooms') == 3 ? 'selected' : '' }}>3</option>
						<option value="4" {{ old('rooms') == 4 ? 'selected' : '' }}>4</option>
						<option value="5" {{ old('rooms') == 5 ? 'selected' : '' }}>More than 4</option>
					</select>
				</div>

				<!-- Area -->
				<div class="col-md-6">
					<h5>Distance From Railway Station</h5>
					<div class="select-input disabled-first-option">
						<input name="railway" type="text" value="{{ old('railway') }}" data-unit="Km" >
					</div>
				</div>

				<!-- Area -->
				<div class="col-md-6">
					<h5>Distance From Airport</h5>
					<div class="select-input disabled-first-option">
						<input name="airport" type="text" value="{{ old('airport') }}" data-unit="Km" >
					</div>
				</div>

				<!-- Area -->
				<div class="col-md-12">
					<h5>Exclusive Features</h5>
						
                  <input type="text" name="exclusive_features" value="{{ old('exclusive_features') }}" class="rs-selectize-tags" value="Educated Staff,Green Place" >
					
				</div>


				

			</div>
			<!-- Row / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30">Facilities Available</h5>
			<div class="checkboxes in-row margin-bottom-20">
		
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
			</div>
			<!-- Checkboxes / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30">Additional Parameters</h5>
			<div class="checkboxes in-row margin-bottom-20">
                
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



				
		
			</div>
			<!-- Checkboxes / End -->


			<!-- Checkboxes -->
			<h5 class="margin-top-30">Food Available(If Provided)</h5>
			<div class="checkboxes in-row margin-bottom-20">
                
                <input id="check-22" type="checkbox" name="food_available[]" value="veg">
				<label for="check-22">Vegeterian</label>

				<input id="check-23" type="checkbox" name="food_available[]" value="non_veg">
				<label for="check-23">Non Vegeterian</label>
		
				<input id="check-25" type="checkbox" name="food_available[]" value="jain">
				<label for="check-25">Jain Food</label>

						
			</div>
			<!-- Checkboxes / End -->



		</div>
		<!-- Section / End -->


		<!-- Section -->
		<h3>Contact Details</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

				<!-- Name -->
				<div class="col-md-4">
					<h5>Name</h5>
					<input name="contact_name" type="text" value="{{ old('contact_name') }}" required="true">
				</div>

				<!-- Email -->
				<div class="col-md-4">
					<h5>E-Mail</h5>
					<input name="email" type="text" value="{{ old('email') }}" required="true">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Phone</h5>
					<input name="phone" type="text" value="{{ old('phone') }}" required="true">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Landline</h5>
					<input name="landline" type="text" value="{{ old('landline') }}" required="true">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Website</h5>
					<input name="website" type="text" value="{{ old('website') }}" required="true">
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
		<button type="submit" class="button preview margin-top-5">Save &amp; Add Section Details <i class="fa fa-arrow-circle-right"></i></button>

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