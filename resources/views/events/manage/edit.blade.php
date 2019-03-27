<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">

		
      

      @include('layouts.errors')



		

		<form action="/events/{{$event->slug}}" method="POST">

		{{ csrf_field() }}

		<!-- Section -->
		<h3>Basic Information</h3>
		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Event Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" name="name" type="text" value="{{ old('name') ? old('name') : $event->name }}" required="true" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Event Categories</h5>
					<select class="chosen-select-no-single" name="event_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						<option value="play" {{ in_array('play', $event->event_type) ? 'selected' : '' }}>Play</option>
						<option value="conference" {{ in_array('conference', $event->event_type) ? 'selected' : '' }}>Conferences</option>
                        <option value="workshop" {{ in_array('workshop', $event->event_type) ? 'selected' : '' }}>Workshop</option>
                        <option value="exihibition" {{ in_array('exihibition', $event->event_type) ? 'selected' : '' }}>Exhibition</option>
                        <option value="concert" {{ in_array('concert', $event->event_type) ? 'selected' : '' }}>Concert</option>
                        <option value="music-film" {{ in_array('music-film', $event->event_type) ? 'selected' : '' }}>Musical/Film Festivals</option>
                        <option value="fest" {{ in_array('fest', $event->event_type) ? 'selected' : '' }}>Fest</option>
                        <option value="party" {{ in_array('party', $event->event_type) ? 'selected' : '' }}>Parites</option>
                        <option value="club-pub" {{ in_array('club-pub', $event->event_type) ? 'selected' : '' }}>Club and Pub Events</option>
                        <option value="standup" {{ in_array('standup', $event->event_type) ? 'selected' : '' }}>Stand-Up Comedy</option>
                        <option value="kids" {{ in_array('kids', $event->event_type) ? 'selected' : '' }}>Kids Activity</option>
                        <option value="adventure" {{ in_array('adventure', $event->event_type) ? 'selected' : '' }}>Adventure</option>
                        <option value="arts" {{ in_array('arts', $event->event_type) ? 'selected' : '' }}>Arts &amp; Culture</option>
                        <option value="travel" {{ in_array('travel', $event->event_type) ? 'selected' : '' }}>Travel</option>
                        <option value="entertainment" {{ in_array('entertainment', $event->event_type) ? 'selected' : '' }}>Entertainment</option>
                        <option value="others" {{ in_array('others', $event->event_type) ? 'selected' : '' }}>Others</option>

					</select>
				</div>

				<!-- Status -->
				<div class="col-md-6">
					<h5>Event Dates</h5>
					<input name="dates" id="dates" value="{{ old('dates') ? old('dates') : implode(',', $event->dates) }}" required="true">

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
					<input name="address" type="text" value="{{ old('address') ? old('address') : $event->address }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>City</h5>
					<input name="city" type="text" value="{{ old('city') ? old('city') : $event->city }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>State</h5>
					<input name="state" type="text" value="{{ old('state') ? old('state') : $event->state }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Country</h5>
					<input name="country" type="text" value="{{ old('country') ? old('country') : $event->country }}" required="true">
				</div>

				<!-- Zip-Code -->
				<div class="col-md-6">
					<h5>Zip-Code</h5>
					<input name="pincode" type="text" value="{{ old('pincode') ? old('pincode') : $event->pincode }}" required="true">
				</div>

				<!-- Status -->
				<div class="col-md-6">
					<h5>Location Type</h5>
					<select class="chosen-select-no-single" name="venue_type[]" multiple="true" required="true">
						<option label="blank"></option>	
						<option 
						   value="banquet" {{ in_array('banquet', json_decode($event->venue_type)) ? 'selected' : '' }} >
						   Banquet
						</option>
                        <option 
                             value="lawns" {{ in_array('lawns', json_decode($event->venue_type)) ? 'selected' : '' }} >
                             Lawns
                        </option>
                        <option 
                    		value="dome" {{ in_array('dome', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Dome
                        </option>
                        <option 
                            value="resort" {{ in_array('resort', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Resort
                        </option>
                        <option 
                            value="plot" {{ in_array('plot', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Plot
                        </option>
                        <option 
                            value="conference" {{ in_array('conference', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Conference Room
                        </option>

                        <option 
                            value="stadium" {{ in_array('stadium', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Stadium
                        </option>

                         <option 
                            value="other" {{ in_array('other', json_decode($event->venue_type)) ? 'selected' : '' }} >
                            Others
                        </option>

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
				     {{ old('description') ? old('description') : $event->description }}
				</textarea>
			</div>

			

			<!-- Checkboxes -->
			<h5 class="margin-top-30">Facilities Available</h5>
			<div class="checkboxes in-row margin-bottom-20">
		
				<input id="check-2" type="checkbox" name="facilities[]" value="air_conditioning"
				{{ in_array('air_conditioning', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-2">Air Conditioning</label>

				<input id="check-4" type="checkbox" name="facilities[]" value="parking"
				{{ in_array('parking', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-4">Ample Parking</label>

				<input id="check-5" type="checkbox" name="facilities[]" value="power"
				{{ in_array('power', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-5">Power Backup</label>	

				<input id="check-10" type="checkbox" name="facilities[]" value="cctv"
				{{ in_array('cctv', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-10">CCTV</label>

				<input id="check-11" type="checkbox" name="facilities[]" value="food"
				{{ in_array('food', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-11">Food Available</label>

				<input id="check-13" type="checkbox" name="facilities[]" value="valet"
				{{ in_array('valet', json_decode($event->facilities)) ? 'checked' : '' }}>
				<label for="check-13">Valet Parking</label>

				<input id="check-14" type="checkbox" name="facilities[]" value="guests"
				{{ in_array('guests', json_decode($event->facilities)) ? 'checked' : '' }}>
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
					<input name="contact_name" type="text" value="{{ old('contact_name') ? old('contact_name') : $event->contact_name }}" required="true">
				</div>

				<!-- Email -->
				<div class="col-md-4">
					<h5>E-Mail</h5>
					<input name="email" type="text" value="{{ old('email') ? old('email') : $event->email }}" required="true">
				</div>

				<!-- Name -->
				<div class="col-md-4">
					<h5>Phone</h5>
					<input name="phone" type="text" value="{{ old('phone') ? old('phone') : $event->phone }}" required="true">
				</div>

				

				<!-- Name -->
				<div class="col-md-4">
					<h5>Website</h5>
					<input name="website" type="text" value="{{ old('website') ? old('website') : $event->website }}" required="true">
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
