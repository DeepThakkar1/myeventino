<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">

		
      

      @include('layouts.errors')



		

		<form action="/vendors/{{$vendor->slug}}" method="POST">

		{{ csrf_field() }}

		<!-- Section -->
		<h3>Basic Information</h3>
		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Name <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" name="name" type="text" value="{{ old('name') ? old('name') : $vendor->name }}" required="true" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Vendor Categories</h5>
					<select class="chosen-select-no-single" name="vendor_types[]" multiple="true" required="true">
						<option label="blank"></option>	
						<option value="photography" {{ in_array('photography', $vendor->vendor_types) ? 'selected' : '' }}>Photography</option>
						<option value="conference" {{ in_array('conference', $vendor->vendor_types) ? 'selected' : '' }}>Conferences</option>
                        <option value="workshop" {{ in_array('workshop', $vendor->vendor_types) ? 'selected' : '' }}>Workshop</option>
                        <option value="exihibition" {{ in_array('exihibition', $vendor->vendor_types) ? 'selected' : '' }}>Exhibition</option>
                        <option value="concert" {{ in_array('concert', $vendor->vendor_types) ? 'selected' : '' }}>Concert</option>
                        <option value="music-film" {{ in_array('music-film', $vendor->vendor_types) ? 'selected' : '' }}>Musical/Film Festivals</option>
                        <option value="fest" {{ in_array('fest', $vendor->vendor_types) ? 'selected' : '' }}>Fest</option>
                        <option value="party" {{ in_array('party', $vendor->vendor_types) ? 'selected' : '' }}>Parites</option>
                        <option value="club-pub" {{ in_array('club-pub', $vendor->vendor_types) ? 'selected' : '' }}>Club and Pub vendors</option>
                        <option value="standup" {{ in_array('standup', $vendor->vendor_types) ? 'selected' : '' }}>Stand-Up Comedy</option>
                        <option value="kids" {{ in_array('kids', $vendor->vendor_types) ? 'selected' : '' }}>Kids Activity</option>
                        <option value="adventure" {{ in_array('adventure', $vendor->vendor_types) ? 'selected' : '' }}>Adventure</option>
                        <option value="arts" {{ in_array('arts', $vendor->vendor_types) ? 'selected' : '' }}>Arts &amp; Culture</option>
                        <option value="travel" {{ in_array('travel', $vendor->vendor_types) ? 'selected' : '' }}>Travel</option>
                        <option value="entertainment" {{ in_array('entertainment', $vendor->vendor_types) ? 'selected' : '' }}>Entertainment</option>
                        <option value="others" {{ in_array('others', $vendor->vendor_types) ? 'selected' : '' }}>Others</option>

					</select>
				</div>

				<!-- Status -->
				<div class="col-md-6">
					<h5>Establishment Date</h5>
					<input name="establishment_date" id="establishment_date" value="{{ old('establishment_date') ? old('establishment_date') : $vendor->establishment_date }}" required="true">

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
					<input name="address" type="text" value="{{ old('address') ? old('address') : $vendor->address }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>City</h5>
					<input name="city" type="text" value="{{ old('city') ? old('city') : $vendor->city }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>State</h5>
					<input name="state" type="text" value="{{ old('state') ? old('state') : $vendor->state }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Country</h5>
					<input name="country" type="text" value="{{ old('country') ? old('country') : $vendor->country }}" required="true">
				</div>

				<!-- Zip-Code -->
				<div class="col-md-6">
					<h5>Zip-Code</h5>
					<input name="pincode" type="text" value="{{ old('pincode') ? old('pincode') : $vendor->pincode }}" required="true">
				</div>

				<!-- Status -->
				<div class="col-md-6">
					<h5>Cities You Provide Service</h5>
					<select class="chosen-select-no-single" name="locations[]" multiple="true" required="true">
						<option label="blank"></option>	
						@if($vendor->locations) 
							<option value="nashik" {{ in_array('nashik', $vendor->locations) ? 'selected' : '' }}>Nashik</option>

							<option value="mumbai" {{ in_array('mumbai', $vendor->locations) ? 'selected' : '' }}>Mumbai</option>

							<option value="pune" {{ in_array('pune', $vendor->locations) ? 'selected' : '' }}>Pune</option>
						@else
							<option value="nashik" >Nashik</option>

							<option value="mumbai" >Mumbai</option>

							<option value="pune" >Pune</option>	
						@endif

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
				<textarea  name="description" cols="40" rows="3" id="description" spellcheck="true">
				     {{ old('description') ? old('description') : $vendor->description }}
				</textarea>
			</div>

			

			<!-- Checkboxes -->
			<h5 class="margin-top-30">Facilities Available</h5>
			<div class="checkboxes in-row margin-bottom-20">
		
				<input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning"
				{{ in_array('air_conditioning', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-2">Air Conditioning</label>

				<input id="check-4" type="checkbox" name="facilities[]" value="parking"
				{{ in_array('parking', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-4">Ample Parking</label>

				<input id="check-5" type="checkbox" name="facilities[]" value="power"
				{{ in_array('power', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-5">Power Backup</label>	

				<input id="check-10" type="checkbox" name="facilities[]" value="cctv"
				{{ in_array('cctv', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-10">CCTV</label>

				<input id="check-11" type="checkbox" name="facilities[]" value="food"
				{{ in_array('food', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-11">Food Available</label>

				<input id="check-13" type="checkbox" name="facilities[]" value="valet"
				{{ in_array('valet', json_decode($vendor->facilities)) ? 'checked' : '' }}>
				<label for="check-13">Valet Parking</label>

				<input id="check-14" type="checkbox" name="facilities[]" value="guests"
				{{ in_array('guests', json_decode($vendor->facilities)) ? 'checked' : '' }}>
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
					<input name="contact_name" type="text" value="{{ old('contact_name') ? old('contact_name') : $vendor->contact_name }}" required="true">
				</div>

				<!-- Email -->
				<div class="col-md-4">
					<h5>E-Mail</h5>
					<input name="email" type="text" value="{{ old('email') ? old('email') : $vendor->email }}" required="true">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Phone</h5>
					<input name="phone" type="text" value="{{ old('phone') ? old('phone') : $vendor->phone }}" required="true">
				</div>

				

				<!-- Name -->
				<div class="col-md-4">
					<h5>Website</h5>
					<input name="website" type="text" value="{{ old('website') ? old('website') : $vendor->website }}" required="true">
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
		<button type="submit" class="button preview margin-top-5">Update Changes <i class="fa fa-arrow-circle-right"></i></button>

		</form>
		</div>

	</div>
