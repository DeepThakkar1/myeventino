@extends('layouts.app')

@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Vendor Profiles</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>My Profiles</li>
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
					<th><i class="fa fa-file-text"></i> Profile</th>
					<th class="expire-date"><i class="fa fa-calendar"></i> Registration Date</th>
					<th>Actions</th>
				</tr>
               
                @foreach(auth()->user()->vendors as $vendor)
					<!-- Item #1 -->
					<tr id="vendor-{{$vendor->id}}">
						<td class="title-container">
						   <img src="{{ count($vendor->photos) ?  $vendor->photos()->first()->thumbnail_path : '' }}" alt="">
							
							<div class="title">

								<h4><a href="#">{{ $vendor->name }}</a></h4>

								@foreach($vendor->vendor_types as $type)
                                  <span style="display: inline;" class="badge">{{ ucwords($type) }}</span> 
                                 @endforeach
                                 <br>

								<span class="table-property-price"> {{ $vendor->establishment_date }} </span>
							</div>
						</td>
						<td class="expire-date">{{ $vendor->created_at->diffForHumans() }}</td>
						<td class="action">
							<a href="/vendors/{{$vendor->slug}}/manage"><i class="fa fa-pencil"></i> Edit Details</a>
							<a style="cursor: pointer;" id="delete-{{$vendor->id}}" onclick="removeVendor({{$vendor->id}})" data-slug="{{$vendor->slug}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            
						</td>
					</tr>
              
               @endforeach
				

			</table>
			<a href="/events/create" class="margin-top-40 button">Showcase New Event</a>
		</div>

	</div>
</div>


@endsection


@section('js')


  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    function removeVendor(id) {


       var slug = $('#delete-' + id).data('slug');

      axios.delete("/vendors/" + slug, {})
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