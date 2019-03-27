@extends('layouts.app')


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
					<h2>{{ $vendor->name }} </h2>
					
						@foreach($vendor->vendor_types as $type)
	                      <span style="display: inline;color: white;font-size: 12px;" class="badge">{{ ucwords($type) }}</span> 
	                     @endforeach
					
				</div>

				<div class="property-pricing">
					<div>&#8377 {{ $vendor->starting_package }} onwards</div>
					<div class="sub-price">Vendor Since : {{ $vendor->establishment_date }}</div>
				</div>


			</div>
		</div>
	</div>
</div>




<div class="container">
	<div class="row">
	   @can('update', $vendor)
    <form action="{{ $vendor->photosPath() }}" class="dropzone dz-clickable"><div class="dz-default dz-message"><span><i class="sl sl-icon-plus"></i> Click here or drop files to upload</span></div>
      {{ csrf_field() }}
    </form>
  @endcan

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">

		
     <div class="margin-bottom-35">
       
       <ul class="nav nav-pills" id="mytabs">
		  <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Details</a></li>
		  <li role="presentation"><a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">Packages</a></li>
		  <li role="presentation"><a href="#terms" aria-controls="terms" role="tab" data-toggle="tab"">T &amp; C</a></li>
		  <li role="presentation"><a href="#albums" aria-controls="albums" role="tab" data-toggle="tab"">Albums</a></li>
		   <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"">Reviews</a></li>
		</ul>

	  </div>
	  

	

					  <!-- Tab panes -->
				  <div class="tab-content" id="manage-tabs">
				    <div role="tabpanel" class="tab-pane active" id="basic">
				    	@include('vendors.show.basic')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="packages">
				    	@include('vendors.show.packages')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="terms">
				    	@include('vendors.show.terms')
				    </div>
				     <div role="tabpanel" class="tab-pane " id="albums">
				    	@include('vendors.show.albums')
				    </div>
				    <div role="tabpanel" class="tab-pane " id="reviews">
				    	@include('vendors.show.reviews')
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
			         
			           @if(!$vendor->isFavourited)
			            <button id="favourite" onclick="toggleFavourite()" class="widget-button save" data-save-title="Save" data-saved-title="Saved"><span class="like-icon"></span></button>

			          @else
			            <button id="unfavourite" onclick="toggleFavourite()" class="widget-button save liked" data-save-title="Save" data-saved-title="Saved"><span class="like-icon liked"></span></button>

			          @endif  
			        @endif
				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				<div class="widget">

					<!-- Agent Widget -->
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo"><img src="/images/avatar4.png" alt="" /></div>
							<div class="agent-details">
								<h4><a href="#">{{ $vendor->contact_name }}</a></h4>
								<span><i class="sl sl-icon-call-in"></i>{{ $vendor->phone }}</span>
							</div>
							<div class="clearfix"></div>
						</div>

			            <input type="text" value="Website : {{ $vendor->website }}" readonly>

			           
			           @can('update', $vendor)
			            <a href="/vendors/{{$vendor->slug}}/manage#basic" class="button fullwidth margin-top-5"><i class="fa fa-edit"></i> Edit Contact Info</a>
			           @else
			           

			              
			           		<a href="tel:{{$vendor->phone}}" class="button fullwidth margin-top-5">
			           		   <i class="fa fa-phone"></i> Call Vendor
			           		</a>

			           		

			           		
			           	  	
			           	
			           @endcan 
					</div>
					<!-- Agent Widget / End -->

				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				<div class="widget">
					<h5 class="margin-bottom-35">Sponsered</h5>

					<div class="listing-carousel outer">
						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
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

									<img src="/images/listing-01.jpg" alt="">
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
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
										<span class="featured">Featured</span>
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
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">You need an account!</h4>
      </div>
      <div class="modal-body">
     
      
        <strong>Please Login/Register to buy these passes!<a href="/login">Login Here</a></strong>
    
      </div>
     
    </div>
  </div>
</div>


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
      
        <input type="text" class="form-control" readonly value="https://www.myvendorino.com/vendors/{{$vendor->slug}}">
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

      axios.post("/vendors/{{ $vendor->slug }}/favourites", {})
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }

   


    
   
	   $(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});



     

    

</script>

@endsection

