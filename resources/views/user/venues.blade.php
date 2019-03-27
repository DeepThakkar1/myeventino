@extends('layouts.app')

@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>My Venues</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>My Venues</li>
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
			<table class="manage-table responsive-table">

				<tr>
					<th><i class="fa fa-file-text"></i> Venue</th>
					<th class="expire-date"><i class="fa fa-calendar"></i> Registration Date</th>
					<th>Actions</th>
				</tr>
               
                @foreach(auth()->user()->venues as $venue)
					<!-- Item #1 -->
					<tr id="venue-{{$venue->id}}">
						<td class="title-container">
							<img src="{{ count($venue->photos) ?  $venue->photos()->first()->thumbnail_path : '' }}" alt="">
							<div class="title">
								<h4><a href="#">{{ $venue->venue_name }}</a></h4>
								<span>{{ $venue->address }} </span>
								<span class="table-property-price"> &#8377 {{ $venue->serves_from }} / person</span>
							</div>
						</td>
						<td class="expire-date">{{ $venue->created_at->diffForHumans() }}</td>
						<td class="action">
							<a href="/venues/{{$venue->slug}}/edit"><i class="fa fa-pencil"></i> Edit Details</a>
							<a href="/venues/{{$venue->slug}}/sections"><i class="fa  fa-eye-slash"></i> Manage Sections</a>
							<a style="cursor: pointer;" id="delete-{{$venue->id}}" onclick="removeVenue({{$venue->id}})" data-slug="{{$venue->slug}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            
						</td>
					</tr>
              
               @endforeach
				

			</table>
			<a href="/venues/create" class="margin-top-40 button">Submit New Venue</a>
		</div>

	</div>
</div>


@endsection


@section('js')


  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    function removeVenue(id) {


       var slug = $('#delete-' + id).data('slug');

      axios.delete("/venues/" + slug, {})
      .then(function (response) {
        console.log(response);
        $('#venue-' + id).hide();
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection