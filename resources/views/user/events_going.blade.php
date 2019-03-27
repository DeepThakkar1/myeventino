@extends('layouts.app')

@section('content')

	
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Scheduled Events</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Scheduled Events</li>
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
					<th><i class="fa fa-file-text"></i> Events you are going to</th>
					<th></th>
				</tr>


				@foreach(auth()->user()->goingTo as $event)


				  		<!-- Item #1 -->
					<tr id="event-{{$event->id}}">
						<td class="title-container">
							<img src="{{ $event->photos()->first()->thumbnail_path }}" alt="">
							<div class="title">
								<h4><a href="/events/{{$event->slug}}">{{ $event->name }}</a></h4>
					
								<span>{{ $event->city }}</span>
								@foreach($event->event_type as $type)
                                  <span style="display: inline;" class="badge">{{ ucwords($type) }}</span> 
                                 @endforeach
                                 <br>

								<span class="table-property-price"> {{ $event->event_dates }} </span>
							</div>
						</td>
						<td class="action">
						   <i hidden="true" id="event-id-{{$event->id}}" data-slug="{{$event->slug}}"></i>
							<a style="cursor: pointer;" onclick='notGoingHere({{$event->id}}, "{{$event->slug}}")' class="delete"><i class="fa fa-remove"></i> Remove</a>
						</td>
					</tr>



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

     function notGoingHere(id, slug) {

   	 axios.delete("/user/goingto/" + slug, {})
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