<div class="property-description">
				<h3 class="desc-headline margin-top-5">Facilities Offered 
       
        </h3>
				<ul class="property-features facilities margin-top-0">

  				 @if(Request::has('platform') || isMobile()) 
  				   <div class="logo-carousel">
  				 @endif

              @foreach(json_decode($venue->facilities) as $facility)

                @if(View::exists("venues.facilities.$facility"))
                     @include("venues.facilities.$facility")
                @endif
                 

              @endforeach

           @if(Request::has('platform') || isMobile())
             </div>
           @endif
				</ul>

  
			<!-- Ratings To Be Added Later -->


					<!-- Features -->
				<h3 class="desc-headline">Features</h3>
				<ul class="property-features checkboxes margin-top-0">
				  @if(in_array("air_conditioning", json_decode($venue->facilities)))
					<li>Air Conditioning</li>
			      @endif
			       @if(in_array("pool", json_decode($venue->facilities)))
					<li>Swimming Pool</li>
			      @endif
			      @if(in_array("clubhouse", json_decode($venue->facilities)))
					<li>Clubhouse</li>
			      @endif
			      @if(in_array("laundry", json_decode($venue->facilities)))
					<li>Laundry</li>
			      @endif
			      @if(in_array("valet", json_decode($venue->facilities)))
					<li>Valet Parking</li>
			      @endif	

			      <?php $exclusive = explode(',', $venue->exclusive_features); 	?>
			      @foreach($exclusive as $item)
					<li>{{ $item }}</li>
				  @endforeach	
				</ul>

					<!-- Features -->
				<h3 class="desc-headline">Food Available 

        
          
        </h3>

				<ul class="property-features checkboxes margin-top-0">
				 <?php $foods = json_decode($venue->food_available); ?>
				 @if($foods != null)
			      @foreach($foods as $item)
					<li>{{ ucwords($item) }}</li>
				  @endforeach
				 @endif 	
				</ul>

				</div>