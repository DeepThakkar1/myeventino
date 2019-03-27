<div class="toggle-wrap">
			  <span class="trigger "><a style="font-size: 18px;font-weight: bold;" href="#">Add New Section<i style="margin-right: 14px;" class="fa fa-plus"></i></a></span>
			    <div class="toggle-container">
			   	   	  <!-- Section -->

				  @include('layouts.errors')
				
				<div class="submit-section">
				  <form method="POST" action="/venues/{{$venue->slug}}/sections">

				  {{ csrf_field() }}


					<!-- Row -->
					<div class="row with-forms">

					   <!-- Name -->
						<div class="col-md-4">
							<h5>Name of Section</h5>
							<input type="text" name="name"  value="{{ old('name') }}">
						</div>

						<div class="col-md-4">
							<h5>Section Type</h5>
							<select class="chosen-select-no-single" name="type" >
								<option label="blank"></option>	
								 <option value="banquet" >Banquet</option>
		                        <option value="lawns" >Lawn</option>
		                        <option value="dome" >Dome</option>
		                        <option value="conference" >Conference Room</option>

							</select>
						</div>

						<!-- Name -->
						<div class="col-md-4">
							<h5>Theatre Capacity</h5>
							<div class="select-input disabled-first-option">
								<input type="text"  name="theatre_capacity" value="{{ old('theatre_capacity') }}" data-unit="Count">
							</div>
						</div>

						<!-- Email -->
						<div class="col-md-4">
							<h5>Floating Capacity</h5>
							<div class="select-input disabled-first-option">
								<input type="text"  name="floating_capacity" value="{{ old('floating_capacity') }}" data-unit="Count">
							</div>
						</div>

						<!-- Name -->
						<div class="col-md-4">
							<h5>Cluster Capacity</span></h5>
							<div class="select-input disabled-first-option">
								<input type="text"  name="cluster_capacity" value="{{ old('cluster_capacity') }}" data-unit="Count">
							</div>
						</div>

						<!-- Price -->
						<div class="col-md-4">
							<h5>Approx Price <i class="tip" data-tip-content="Type overall or average price  to be displayed on Eventino."></i></h5>
							<div class="select-input disabled-first-option">
								<input type="text"  name="price" value="{{ old('price') }}" data-unit="IND">
							</div>
						</div>

						<!-- Price -->
						<div class="col-md-4">
							<h5>Price/Person <i class="tip" data-tip-content="Type overall or average price  to be displayed on Eventino."></i></h5>
							<div class="select-input disabled-first-option">
								<input type="text"  name="price_person" value="{{ old('price_person') }}" data-unit="IND">
							</div>
						</div>

						<!-- Area -->
						<div class="col-md-4">
							<h5>Area</h5>
							<div class="select-input disabled-first-option">
								<input type="text" name="area"  value="{{ old('area') }}" data-unit="Sq Ft">
							</div>
						</div>

						<!-- Area -->
				<div class="col-md-12">
					<h5>Exclusive Features</h5>
						
                  <input type="text" name="exclusive_features" class="rs-selectize-tags" value="{{ old('exclusive_features') }}" >
					
				</div>

					</div>
					<!-- Row / End -->

				</div>
				<!-- Section / End -->

			

				<div class="divider"></div>
				<button type="submit" class="button preview margin-top-5">Add Section <i class="fa fa-arrow-circle-right"></i></button>

				

				</form>
	   	   </div>

	   	   </div>