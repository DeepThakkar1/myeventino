<div class="toggle-wrap">
			  <span class="trigger "><a style="font-size: 18px;" href="#">#{{ $index+1 }} {{ $section->name }} - {{ $section->type }} <i style="margin-right: 14px;" class="fa fa-plus"></i></a></span>
			    <div class="toggle-container">
			   	   	  <!-- Section -->

			   	   	  @include('layouts.errors')
				
				<div class="submit-section">
				  <form method="POST" action="/venues/{{$venue->slug}}/sections/{{$section->id}}">

				  
				  	{{ csrf_field() }}	
					<!-- Row -->
					<div class="row with-forms">

					   <!-- Name -->
						<div class="col-md-4">
							<h5>Name of Section</h5>
							<input type="text" name="name" value="{{ old('name') ? old('name') : $section->name }}">
						</div>

						<div class="col-md-4">
							<h5>Section Type</h5>
							<select class="chosen-select-no-single" name="type">
								<option label="blank"></option>	
								 <option value="banquet" {{ $section->type == 'banquet' ? 'selected' : '' }}>Banquet</option>
		                        <option value="lawns" {{ $section->type == 'lawns' ? 'selected' : '' }}>Lawn</option>
		                        <option value="dome" {{ $section->type == 'dome' ? 'selected' : '' }}>Dome</option>
		                        <option value="conference" {{ $section->type == 'conference' ? 'selected' : '' }}>Conference Room</option>

							</select>
						</div>

						<!-- Name -->
						<div class="col-md-4">
							<h5>Theatre Capacity</h5>
							<div class="select-input disabled-first-option">
								<input type="text" v-model="theatre_capacity" name="theatre_capacity" value="{{ old('theatre_capacity') ? old('theatre_capacity') : $section->theatre_capacity }}" data-unit="Count">
							</div>
						</div>

						<!-- Email -->
						<div class="col-md-4">
							<h5>Floating Capacity</h5>
							<div class="select-input disabled-first-option">
								<input type="text" v-model="floating_capacity" name="floating_capacity" value="{{ old('cluster_capacity') ? old('cluster_capacity') : $section->cluster_capacity }}" data-unit="Count">
							</div>
						</div>

						<!-- Name -->
						<div class="col-md-4">
							<h5>Cluster Capacity</span></h5>
							<div class="select-input disabled-first-option">
								<input type="text" v-model="cluster_capacity" name="cluster_capacity" value="{{ old('floating_capacity') ? old('floating_capacity') : $section->floating_capacity }}" data-unit="Count">
							</div>
						</div>

						<!-- Price -->
						<div class="col-md-4">
							<h5>Approx Price <i class="tip" data-tip-content="Type overall or average price  to be displayed on Eventino."></i></h5>
							<div class="select-input disabled-first-option">
								<input type="text" v-model="price" name="price" value="{{ old('price') ? old('price') : $section->price }}" data-unit="IND">
							</div>
						</div>

						<!-- Price -->
						<div class="col-md-4">
							<h5>Price/Person <i class="tip" data-tip-content="Type overall or average price  to be displayed on Eventino."></i></h5>
							<div class="select-input disabled-first-option">
								<input type="text" v-model="price_person" name="price_person" value="{{ old('price_person') ? old('price_person') : $section->price_person }}" data-unit="IND">
							</div>
						</div>

						<!-- Area -->
						<div class="col-md-4">
							<h5>Area</h5>
							<div class="select-input disabled-first-option">
								<input type="text" name="area" v-model="area" value="{{ old('area') ? old('area') : $section->area }}" data-unit="Sq Ft">
							</div>
						</div>

								<!-- Area -->
				<div class="col-md-12">
					<h5>Exclusive Features</h5>
						
                  <input type="text" name="exclusive_features" class="rs-selectize-tags" value="{{ $venue->exclusive_features }}" >
					
				</div>


					</div>
					<!-- Row / End -->

				</div>
				<!-- Section / End -->

			

				<div class="divider"></div>
				<button type="submit" class="button preview margin-top-5">Update Section <i class="fa fa-arrow-circle-right"></i></button>

				

				</form>
	   	   </div>

	   	   </div>