@extends('layouts.app')

@section('content')

	
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Bookmarked Listings</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Bookmarked Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">
        

		@include('user.partials.sidebar')

		<div class="col-md-8">
			<table class="manage-table bookmarks-table responsive-table">

				<tr>
					<th><i class="fa fa-file-text"></i> Favourite Venues &amp; Events</th>
					<th></th>
				</tr>


				@foreach(auth()->user()->favourites as $favourite)


				    @if(is_a($favourite->favourited, App\Venue::class))

					<!-- Item #1 -->
					<tr id="venue-{{$favourite->favourited->id}}">
						<td class="title-container">
							<img src="{{ $favourite->favourited->photos()->first()->thumbnail_path }}" alt="">
							<div class="title">
								<h4><a href="/venues/{{$favourite->favourited->slug}}">{{ $favourite->favourited->venue_name }}</a></h4>
								<span style="display: inline;" class="badge">Venue</span>
								<span>{{ $favourite->favourited->address }}</span>
								<span class="table-property-price"> &#8377 {{ $favourite->favourited->serves_from }}/person</span>
							</div>
						</td>
						<td class="action">
						   <i hidden="true" id="venue-id-{{$favourite->favourited->id}}" data-slug="{{$favourite->favourited->slug}}"></i>
							<a style="cursor: pointer;" onclick="unfavouriteVenue({{$favourite->favourited->id}})" class="delete"><i class="fa fa-remove"></i> Remove</a>
						</td>
					</tr>

					@elseif(is_a($favourite->favourited, App\Event::class))

						<!-- Item #1 -->
					<tr id="event-{{$favourite->favourited->id}}">
						<td class="title-container">
							<img src="{{ $favourite->favourited->photos()->first()->thumbnail_path }}" alt="">
							<div class="title">
								<h4><a href="/events/{{$favourite->favourited->slug}}">{{ $favourite->favourited->name }}</a></h4>
								<span style="display: inline;" class="badge">Event</span>
								<span>{{ $favourite->favourited->address }}</span>
								<span class="table-property-price"> &#8377 {{ $favourite->favourited->starting_price }} onwards</span>
							</div>
						</td>
						<td class="action">
						   <i hidden="true" id="event-id-{{$favourite->favourited->id}}" data-slug="{{$favourite->favourited->slug}}"></i>
							<a style="cursor: pointer;" onclick="unfavouriteEvent({{$favourite->favourited->id}})" class="delete"><i class="fa fa-remove"></i> Remove</a>
						</td>
					</tr>

					@elseif(is_a($favourite->favourited, App\Vendor::class))

						<!-- Item #1 -->
					<tr id="vendor-{{$favourite->favourited->id}}">
						<td class="title-container">
							<img src="{{ $favourite->favourited->photos()->first()->thumbnail_path }}" alt="">
							<div class="title">
								<h4><a href="/vendors/{{$favourite->favourited->slug}}">{{ $favourite->favourited->name }}</a></h4>
								<span style="display: inline;" class="badge">Vendor</span>
								<span>{{ $favourite->favourited->address }}</span>
								<span class="table-property-price"> &#8377 {{ $favourite->favourited->starting_package }} onwards</span>
							</div>
						</td>
						<td class="action">
						   <i hidden="true" id="vendor-id-{{$favourite->favourited->id}}" data-slug="{{$favourite->favourited->slug}}"></i>
							<a style="cursor: pointer;" onclick="unfavouriteVendor({{$favourite->favourited->id}})" class="delete"><i class="fa fa-remove"></i> Remove</a>
						</td>
					</tr>

					@endif




				@endforeach


				

				



			</table>
		</div>

	</div>
</div>



@endsection



@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    function unfavouriteVenue(id) {


    	var slug = $('#venue-id-' + id).data('slug');

      axios.post("/venues/" + slug + "/favourites", {})
      .then(function (response) {
        console.log(response);
        $('#venue-' + id).hide();
      })
      .catch(function (error) {
        console.log(error);
      });
    }


    function unfavouriteEvent(id) {


    	var slug = $('#event-id-' + id).data('slug');

      axios.post("/events/" + slug + "/favourites", {})
      .then(function (response) {
        console.log(response);
        $('#event-' + id).hide();
      })
      .catch(function (error) {
        console.log(error);
      });
    }

    function unfavouriteVendor(id) {


    	var slug = $('#vendor-id-' + id).data('slug');

      axios.post("/vendors/" + slug + "/favourites", {})
      .then(function (response) {
        console.log(response);
        $('#vendor-' + id).hide();
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection