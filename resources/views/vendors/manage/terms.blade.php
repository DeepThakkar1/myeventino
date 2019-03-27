<!-- Submit Page -->
<div class="col-md-12">
	<div class="submit-page"> 
      
      
	    <div id="notice-policy" class="alert alert-success hidden">Your vendor Terms are successfully updated!</div>
	  
  

	  <table class="table table-striped .table-responsive margin-bottom-35" style="font-size: 18px;">
	    
	       <tr>
            <th>#</th>
	      	<th>Term</th>
	      	<th>Actions</th>
	      </tr>
          
          @if($vendor->policies)

         
	      @foreach($vendor->policies as $index => $policy)

	      	<tr id="policy-{{$index}}">
	      	    <td>{{ $index+1 }}</td>
	      		<td contenteditable="true" id="policy-{{$index}}-data" >{{ $policy }}</td>	
	      		<td>
	      		  <button onclick='updatePolicy("{{ $vendor->slug }}", {{ $index }})' class="btn btn-xs btn-primary">Update</button>
	      		  <button onclick='deletePolicy("{{ $vendor->slug }}", {{ $index }})' class="btn btn-xs btn-danger">Delete</button>
	      		</td>
	      	</tr>

	      
	      @endforeach
	      @else 

             
             <span id="notice2" class="alert alert-success">Add Some Terms and Conditions</span>

         @endif


	  </table>
	 


   


	<form method="POST" action="/vendors/{{$vendor->slug}}/policies">


	 {{ csrf_field() }}


		<h4>Add New Term/Condition</h4>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

				<!-- Address -->
				<div class="col-md-12">
					<textarea name="term" required="true" placeholder="Your Term/Condition">{{ old('term') }}</textarea>

					 <button type="submit" class="button preview margin-top-5">Add Term/Condition <i class="fa fa-arrow-circle-right"></i></button>
				</div>


   

				
		     </div>
		 </div> 		
		




	</form>


	</div>
</div>
