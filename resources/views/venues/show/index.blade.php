@extends('layouts.app')

@section('title')
	
	{{ $venue->venue_name . ' | ' }} 

@endsection

@section('css')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.min.css" />

@endsection


@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="margin-bottom-20">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<a href="{{ url()->previous() }}" class="back-to-listings"></a>
				<div class="property-title">
					<h2>{{ $venue->venue_name }} <span class="property-badge">Best For {{ json_decode($venue->best_for)[0] }}</span> 
             
             </h2>
					<span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							<?= substr( $venue->address , 0, 60); ?>...
						</a>
					</span>
        
          
				</div>

				<div class="property-pricing">
					<div><small style="color: #ccc;font-size: 14px">Starts from</small> &#8377 {{ $venue->starts_from }}</div>
					<div class="sub-price"><small style="color: #ccc;font-size: 14px">Serves from</small> &#8377 {{ $venue->serves_from }} / plate</div>
				</div>


			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->




<div class="container">
	<div class="row">

  @can('update', $venue)
    <form action="{{ $venue->photosPath() }}" class="dropzone dz-clickable"><div class="dz-default dz-message"><span><i class="sl sl-icon-plus"></i> Click here or drop files to upload</span></div>
      {{ csrf_field() }}
    </form>
  @endcan

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">
			<div class="margin-bottom-35">
       
       <ul class="nav nav-pills" id="mytabs">
		  <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Details</a></li>
		  <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">On Map</a></li>
		  <li role="presentation"><a href="#facilities" aria-controls="facilities" role="tab" data-toggle="tab">Facilities</a></li>
		  <li role="presentation"><a href="#sections" aria-controls="sections" role="tab" data-toggle="tab"">Sections</a></li>
		  <li role="presentation"><a href="#terms" aria-controls="terms" role="tab" data-toggle="tab"">T &amp; C</a></li>
		   <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"">Reviews</a></li>
		</ul>

	  </div>
	  

	

					  <!-- Tab panes -->
				  <div class="tab-content" id="manage-tabs">
				    <div role="tabpanel" class="tab-pane active" id="basic">
				    	@include('venues.show.basic')
				    </div>
				    <div role="tabpanel" class="tab-pane" id="location">
				    	@include('venues.show.location')
				    	<script type="text/javascript">
				    		initMap();
				    	</script>
				    </div>
				     <div role="tabpanel" class="tab-pane " id="facilities">
				    	@include('venues.show.facilities')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="sections">
				    	@include('venues.show.sections')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="terms">
				    	@include('venues.show.terms')
				    </div>
				    
				    <div role="tabpanel" class="tab-pane " id="reviews">
				    	@include('venues.show.reviews')
				    </div>
				    

				    
				  </div>
		</div>
		<!-- Property Description / End -->


		<!-- Sidebar -->
		<div class="col-lg-4 col-md-5">

			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-30">
					<button id="share" data-toggle="modal" data-target="#shareModal" class="widget-button"><i class="fa fa-share"></i> Share</button>

          @if(Auth::check())
         
           @if(!$venue->isFavourited)
            <button id="favourite" onclick="toggleFavourite()" class="widget-button save" data-save-title="Save" data-saved-title="Saved"><span class="like-icon"></span></button>

          @else
            <button id="unfavourite" onclick="toggleFavourite()" class="widget-button save liked" data-save-title="Save" data-saved-title="Saved"><span class="like-icon liked"></span></button>

          @endif  
        @endif
              
           
					
				</div>
				<!-- Widget / End -->

       @if(!Request::has('platform'))
				<!-- Widget -->
				<div class="widget">

					<!-- Agent Widget -->
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo"><img src="/images/avatar4.png" alt="" /></div>
							<div class="agent-details">
								<h4><a href="#">{{ $venue->contact_name }}</a></h4>
								<span><i class="fa fa-phone"></i>{{ $venue->phone }}</span><br>
							</div>
							<div class="clearfix"></div>
						</div>


            
            <input type="text" value="Landline : {{ $venue->landline }}" readonly>
            <input type="text" value="Website : {{ $venue->website }}" readonly>

           
           @can('update', $venue)
            <a href="/venues/{{$venue->slug}}/edit#contact" class="button fullwidth margin-top-5"><i class="fa fa-edit"></i> Edit Contact Info</a>
           @else
           	<a href="tel:{{ $venue->phone }}" class="button fullwidth margin-top-5">Get Price &amp; Availability</a>
           @endcan 
					</div>
					<!-- Agent Widget / End -->

				</div>
				<!-- Widget / End -->

				@endif


				<!-- Widget -->
				<div class="widget">
					<h3 class="margin-bottom-35">Sponsered</h3>

					<div class="listing-carousel outer">
						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Elite</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-03.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Elite</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-02.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Elite</span>
										<span>For Sale</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

										<ul class="listing-hidden-content">
											<li>Area <span>530 sq ft</span></li>
											<li>Rooms <span>3</span></li>
											<li>Beds <span>1</span></li>
											<li>Baths <span>1</span></li>
										</ul>
									</div>

									<img src="/images/listing-03.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->
					</div>

				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sharing Url</h4>
      </div>
      <div class="modal-body">
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-link"></i></div>
      
        <input type="text" class="form-control" readonly value="https://www.myeventino.com/venues/{{$venue->slug}}">
    </div>
      </div>
     
    </div>
  </div>
</div>


@endsection



@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">

     // Javascript to enable link to tab
		var url = document.location.toString();
		if (url.match('#')) {
		    $('.nav-pills a[href="#' + url.split('#')[1] ).tab('show');

		} //add a suffix

		// Change hash for page-reload
		$('.nav-pills a').on('shown.bs.tab', function (e) {
		    window.location.hash = e.target.hash;
		    window.scrollTo( 0, 0 );
		    
		})


    function toggleFavourite(argument) {

      axios.post("/venues/{{ $venue->slug }}/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection