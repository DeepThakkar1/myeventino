<!-- Submit Page -->
<div class="col-md-12">
	<div class="submit-page"> 
      
      
	  
	    <div id="notice-package" class="alert alert-success hidden">Your Event Packages are successfully updated!</div>
	
  
      <div><small style="font-size: 14px;font-weight: bold;">You can edit your packages directly from the table!Click on any cell to edit!</small></div>
	  <table class="table table-bordered table-striped table-responsive margin-bottom-35" style="font-size: 18px;">
	    
	     
          
          @if($event->packages)

           <tr>
            <th>#</th>
            <th>Name</th>
	      	<th>Ticket For (People)</th>
	      	<th>Price</th>
	      	<th>Ticket Type</th>
	      	<th>Ticket Count</th>
	      	<th>Days</th>
	      	<th>Actions</th>
	      </tr>
	      @foreach($event->packages as $index => $package)

	      	<tr id="package-{{$index}}">
	      	    <td>{{ $index+1 }}</td>
	      	    <td  contenteditable="true" id="{{$index}}-name">{{ $package['name'] }}</td>
	      		<td><span contenteditable="true" id="{{$index}}-ticket-for">{{ $package['ticket_for'] }}</span> </td>
	      		<td> &#8377 <span contenteditable="true" id="{{$index}}-price">{{ $package['price'] }}</span></td>
	      		<td> 
	      		<select style="padding-bottom: 0px;margin-bottom: 0px;height: 24px;" id="{{$index}}-ticket-type" class="form-control">
	              <option value="adult" {{ $package['ticket_type'] == 'adult' ? 'selected' : '' }}>Adult</option>
	              <option value="child" {{ $package['ticket_type'] == 'child' ? 'selected' : '' }}>Child</option>
	             </select> 
                </td>	
	      		<td ><span contenteditable="true" id="{{$index}}-count">{{ $package['count'] }}</span></td>	
	      		<td >
	      		   <select id="{{$index}}-days" style="padding-bottom: 0px;margin-bottom: 0px;height: 24px;" class="chosen-select-no-single"  multiple="true">
		                @foreach($event->dates as $date)
						  <option value="{{ trim($date) }}" {{ in_array(trim($date), $package['days'])  ? 'selected' : '' }}>{{ $date }}</option>
						@endforeach
		          </select> </td>
	      		<td><button onclick='updatePackage("{{ $event->slug }}", {{ $index }})' class="btn btn-xs btn-primary">Update</button> &nbsp; <button onclick='deletePackage("{{ $event->slug }}", {{ $index }})' class="btn btn-xs btn-danger">Delete</button></td>	
	      	</tr>




	      
	      @endforeach
	      @else 

             
             <span id="notice2" class="alert alert-success">Add Some Passes/TIckets</span>

         @endif


	  </table>
	 


   


	<form method="POST" action="/events/{{$event->slug}}/packages">


	 {{ csrf_field() }}


		<h3>Add New Ticket/Pass</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

			<!-- Address -->
				<div class="col-md-6">
					<h5>Name</h5>
					<input name="name" type="text" value="{{ old('name')  }}" placeholder="Ex. Gold, Silver" required="true">
				</div>

				<!-- Address -->
				<div class="col-md-6">
					<h5>Ticket For</h5>
					<input name="ticket_for" type="number" value="{{ old('ticket_for')  }}" placeholder="No. of People" required="true">
				</div>

				<!-- Address -->
				<div class="col-md-6">
					<h5>Price</h5>
					<input name="price" type="number" step="0.1" value="{{ old('price')  }}" placeholder="Cost of 1 Pass" required="true">
				</div>

				<div class="col-md-6">
					<h5>Ticket Type</h5>
					<select class="chosen-select-no-single" name="ticket_type" required="true">
						<option label="blank"></option>	
						<option value="adult" selected>Adult</option>
						<option value="child" >Child</option>

					</select>
				</div>

				<!-- Address -->
				<div class="col-md-6">
					<h5>Tickets Count</h5>
					<input name="count" type="text" value="{{ old('count')  }}" placeholder="No. of tickets available for sale" required="true">
				</div>


				<!-- Address -->
				<div class="col-md-6">
					<h5>Valid For</h5>
					<select class="chosen-select-no-single" name="days[]" multiple="true" required="true">
						<option label="blank"></option>	
						@foreach($event->dates as $date)
						  <option value="{{ trim($date) }}">{{ $date }}</option>
						@endforeach

					</select>
				</div>



				



				
		     </div>
		 </div> 		
		


	<div class="divider"></div>
    <button type="submit" class="button preview margin-top-5">Add Ticket <i class="fa fa-arrow-circle-right"></i></button>


	</form>


	</div>
</div>
