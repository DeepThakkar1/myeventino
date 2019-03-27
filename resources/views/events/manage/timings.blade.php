<!-- Submit Page -->
<div class="col-md-12">
	<div class="submit-page"> 
      

	  @if(isset($msg))
	    <span id="notice" class="alert alert-success help">Your Event Dates are successfully updated!</span>
	  @endif

	  <form method="POST" action="/events/{{$event->slug}}/dates">
     
	     	<div class="row with-forms"> 

	     	    {{ csrf_field() }}

	     	   <!-- Status -->
					<div class="col-md-6">
						<h5>Event Dates</h5>
						<input name="dates" id="dates2" value="{{ old('dates') ? old('dates') : implode(',', $event->dates) }}" required="true">
							
						</select>
					</div>


					<!-- Status -->
					<div class="col-md-6">

						 <button style="margin-top: 43px;" type="submit"  class="button preview">Update Dates <i class="fa fa-arrow-circle-right"></i></button>

						</select>
					</div>

	     	</div>

     	</form>
   


	<form method="POST" action="/events/{{$event->slug}}/timings">


	 {{ csrf_field() }}

	@foreach($event->dates as $index => $date)

		<h3>Day - {{ $index+1 }} [ {{ $date }} ]</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

			  @if(!$event->timings)

				<!-- Address -->
				<div class="col-md-6">
					<h5>Start Time</h5>
					<input class="timepicker start" name="{{$date}}-start" type="text" 
					    value="{{ old($date . '-start') }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>End Time</h5>
					<input class="timepicker end" name="{{$date}}-end" type="text" 
					  value="{{ old($date . '-end')  }}" required="true">
				</div>

				@else

					<!-- Address -->
				<div class="col-md-6">
					<h5>Start Time</h5>
					<input class="timepicker start" name="{{$date}}-start" type="text" 
					    value="{{ old($date . '-start') ? old($date . '-start') : array_key_exists(trim($date), $event->timings) ? $event->timings[trim($date)]['start'] : '' }}" required="true">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>End Time</h5>
					<input class="timepicker end" name="{{$date}}-end" type="text" 
					  value="{{ old($date . '-end') ? old($date . '-end') : array_key_exists(trim($date), $event->timings) ? $event->timings[trim($date)]['end'] : ''  }}" required="true">
				</div>


				@endif
		     </div>
		 </div> 		
		

	@endforeach

	<div class="divider"></div>
    <button type="submit" class="button preview margin-top-5">Update Timings <i class="fa fa-arrow-circle-right"></i></button>


	</form>


	</div>
</div>
