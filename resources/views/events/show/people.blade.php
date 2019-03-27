<div class="property-description"> 


@if(Auth::check())

<h3 class="desc-headline margin-top-5" style="font-size: 17px;font-weight: bold;"> 
        {{ auth()->user()->isGoingTo($event) ? 'You and ' . (count($event->people) - 1). ' other'  : count($event->people) }}  people are going to this event!</h3>


@foreach($event->people as $person)

   

    @if($person->id != auth()->user()->id)
 		<a href="" ><img data-toggle="tooltip" title="{{ $person->name }}" style="display: inline;margin: 3px; " class="img img-responsive img-circle" src="/images/avatar4.png" alt="" /></a>
  	@endif


 @endforeach


@else
	

   <div id="notice-people" class="alert alert-success">Please Login to know about people going to this event!<a href="/login"><b>Click Here to Login!</b></a></div>
	

@endif        





</div>

 