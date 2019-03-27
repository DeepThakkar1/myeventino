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

<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			   <a href="{{ url()->previous() }}" class="back-to-listings"></a>
				<h2><i class="fa fa-plus-circle"></i> Showcase My Event</h2>
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



		

		<form action="/events" method="POST">

		{{ csrf_field() }}

		<!-- Section -->
		<h3>Basic Information</h3>
		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Event Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" name="name" type="text" value="{{ old('name') }}" required="true" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Event Categories</h5>
					<select class="chosen-select-no-single" name="event_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						<option value="play" selected>Play</option>
						<option value="conference" selected>Conferences</option>
                        <option value="workshop" selected>Workshop</option>
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

					</select>
				</div>

				<!-- Status -->
				<div class="col-md-6">
					<h5>Event Dates</h5>
					<input name="dates" id="dates" value="{{ old('dates') }}" required="true">

					</select>
				</div>

				

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

				<!-- Status -->
				<div class="col-md-6">
					<h5>Location Type</h5>
					<select class="chosen-select-no-single" name="venue_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						 <option value="banquet" >Banquet</option>
                        <option value="lawns" >Lawns</option>
                        <option value="dome" >Dome</option>
                        <option value="resort" >Resort</option>
                        <option value="plot" >Plot</option>
                        <option value="conference" >Conference Room</option>
                        <option value="stadium" >Stadium</option>
                        <option value="other" >Others</option>

					</select>
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

			

			<!-- Checkboxes -->
			<h5 class="margin-top-30">Facilities Available</h5>
			<div class="checkboxes in-row margin-bottom-20">
		
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
		<button type="submit" class="button preview margin-top-5">Save &amp; Add Packages <i class="fa fa-arrow-circle-right"></i></button>

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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<script src="/js/multidate.js"></script>

<script type="text/javascript">
	
       $('#dates').multiDatesPicker({ dateFormat: 'dd-mm-yy' });
     

</script>

@endsection