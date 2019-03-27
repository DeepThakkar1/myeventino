	<div class="property-description">

		<!-- Main Features -->
		<ul class="property-main-features">
			<li>Rating <span><i class="fa fa-star"></i> {{ $vendor->avg_rating }}</span></li>
			<li>Reviews <span>{{ count($vendor->reviews) }}</span></li>
		</ul>


		<!-- Description -->
		<h3 class="desc-headline">Description</h3>
		<div class="show-more">
			<p>
				{{ $vendor->description }}
			</p>

			

			<a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
		</div>



		  <h3 class="desc-headline">Photos &amp; Banners</h3>
			<!-- Slider -->
			<div class="property-slider default">

			  @foreach($vendor->photos as $photo)
				<a href="{{ $photo->path }}" data-background-image="{{ $photo->path }}" class="item mfp-gallery" style="height: 300px;"></a>
			  @endforeach 	
			</div>

			<!-- Slider Thumbs -->
			<div class="property-slider-nav">
			  @foreach($vendor->photos as $photo)
				<div class="item"><img src="{{ $photo->thumbnail_path }}" alt=""></div>
			  @endforeach	
			</div>


		
		


		<!-- Features -->
				<h3 class="desc-headline">Facilities</h3>
				<ul class="property-features checkboxes margin-top-0 margin-bottom-40">
				  @if(in_array("air_conditioning", json_decode($vendor->facilities)))
					<li>Air Conditioning</li>
			      @endif
			       @if(in_array("parking", json_decode($vendor->facilities)))
					<li>Ample Parking</li>
			      @endif
			      @if(in_array("cctv", json_decode($vendor->facilities)))
					<li>CCTV</li>
			      @endif
			      @if(in_array("food", json_decode($vendor->facilities)))
					<li>Food Available</li>
			      @endif
			      @if(in_array("valet", json_decode($vendor->facilities)))
					<li>Valet Parking</li>
			      @endif
			      @if(in_array("power", json_decode($vendor->facilities)))
					<li>Power Backup</li>
			      @endif
			       @if(in_array("guests", json_decode($vendor->facilities)))
					<li>Guests</li>
			      @endif	

			      
				</ul>


	
		    
		  

	




		
		

	</div>

	

