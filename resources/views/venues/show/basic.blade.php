<div class="property-description">

				<!-- Main Features -->
				<ul class="property-main-features">
					<li>Area <span>{{ $venue->total_area }} sq.ft.</span></li>
					<li>Rating <span><i class="fa fa-star"></i> {{ $venue->avg_rating }}</span></li>
					<li>Capacity <span>{{ $venue->min_cap }}-{{ $venue->max_cap }}</span></li>
					<li>Reviews <span>{{ count($venue->reviews) }}</span></li>
				</ul>

         <h3 class="desc-headline">Photos &amp; Banners</h3>
      <!-- Slider -->
      <div class="property-slider default">

        @foreach($venue->photos as $photo)
        <a href="{{ $photo->path }}" data-background-image="{{ $photo->path }}" class="item mfp-gallery" style="height: 300px;"></a>
        @endforeach   
      </div>

      <!-- Slider Thumbs -->
      <div class="property-slider-nav">
        @foreach($venue->photos as $photo)
        <div class="item"><img src="{{ $photo->thumbnail_path }}" alt=""></div>
        @endforeach 
      </div>
               
         


				<!-- Description -->
				<h3 class="desc-headline">Description 
           
        </h3>
				<div class="show-more">
					<p>
						{{ $venue->description }}
					</p>

					

					<a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
				</div>



				
				<div class="">

		

				

                

				<h3 class="desc-headline">Seating Capacity</h3>

                <ul class="property-features margin-top-0  margin-bottom-60">
                 @if(Request::has('platform') || isMobile()) 
                   <div class="logo-carousel">
                 @endif
                   <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/theatre.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Theatre Capacity</b><br>
                      {{ $venue->theatre_cap }} People
                     </div> 
                     </div> 
                   </li>

                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/floating.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Floating Capacity</b><br>
                      {{ $venue->floating_cap }} People
                     </div> 
                     </div> 
                   </li>

                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/cluster.gif">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Cluster Capacity</b><br>
                      {{ $venue->cluster_cap }} People
                     </div> 
                     </div> 
                   </li>

                    @if(Request::has('platform') || isMobile())
                     </div>
                   @endif
					
				</ul>

    
               


			</div>

     </div> 