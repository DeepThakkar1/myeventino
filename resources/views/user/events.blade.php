@extends('layouts.app')

@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>My Events</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>My Events</li>
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
					<th><i class="fa fa-file-text"></i> Event</th>
					<th class="expire-date"><i class="fa fa-calendar"></i> Registration Date</th>
					<th>Actions</th>
				</tr>
               
                @foreach(auth()->user()->events as $event)
					<!-- Item #1 -->
					<tr id="event-{{$event->id}}">
						<td class="title-container">
						   <img src="{{ count($event->photos) ?  $event->photos()->first()->thumbnail_path : '' }}" alt="">
							
							<div class="title">

								<h4><a href="#">{{ $event->name }}</a></h4>

								@foreach($event->event_type as $type)
                                  <span style="display: inline;" class="badge">{{ ucwords($type) }}</span> 
                                 @endforeach
                                 <br>

								<span class="table-property-price"> {{ $event->dates[0] }} </span>
							</div>
						</td>
						<td class="expire-date">{{ $event->created_at->diffForHumans() }}</td>
						<td class="action">
							<a href="/events/{{$event->slug}}/manage"><i class="fa fa-pencil"></i> Edit Details</a>
							<a style="cursor: pointer;" id="delete-{{$event->id}}" onclick="removeEvent({{$event->id}})" data-slug="{{$event->slug}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            
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
    function removeEvent(id) {


       var slug = $('#delete-' + id).data('slug');

      axios.delete("/events/" + slug, {})
      .then(function (response) {
        console.log(response);
        $('#event-' + id).hide();
      })
      .catch(function (error) {
        console.log(error);
      });
    }

     

  </script>

  
@endsection