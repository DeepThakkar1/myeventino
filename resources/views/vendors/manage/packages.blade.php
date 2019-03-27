<!-- Submit Page -->
<div class="col-md-12">
	<div class="submit-page"> 
      
      
	  
	    <div id="notice-package" class="alert alert-success hidden">Your vendor Packages are successfully updated!</div>

   <div class="toggle-wrap" >
			  <span class="trigger "><a style="font-size: 18px;" href="#">Add New Package <i style="margin-right: 14px;" class="fa fa-plus"></i></a></span>
			    <div class="toggle-container">

	      <form method="POST" action="/vendors/{{$vendor->slug}}/packages">


	 {{ csrf_field() }}


		<h3>Add New Package</h3>
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
					<h5>Price</h5>
					<input name="price" type="number" step="0.1" value="{{ old('price')  }}" placeholder="Cost of Package" required="true">
				</div>
               
               <div class="col-md-12">
					<h5>Features &amp; Terms</h5>
						
                  <input type="text" name="features" class="rs-selectize-tags" value="{{ old('features') }}" >
					
				</div>

				



				



				
		     </div>
		 </div> 		
		


	<div class="divider"></div>
    <button type="submit" class="button preview margin-top-5">Add Package <i class="fa fa-arrow-circle-right"></i></button>


	</form>


	</div>

	</div>
	
	     
          
          @if($vendor->packages)



           

		      @foreach($vendor->packages as $index => $package)

		       <div class="toggle-wrap" id="package-{{$package->id}}">
			  <span class="trigger "><a style="font-size: 18px;" href="#">#{{ $index+1 }} {{ $package->name }} - {{ $package->type }} <i style="margin-right: 14px;" class="fa fa-plus"></i></a></span>
			    <div class="toggle-container">

			    	<div class="submit-section">

						<!-- Row -->
						<div class="row with-forms">

						<!-- Address -->
							<div class="col-md-6">
								<h5>Name</h5>
								<input name="name" id="{{$package->id}}-name" type="text" value="{{ $package->name  }}" placeholder="Ex. Gold, Silver" required="true">
							</div>

							
							<!-- Address -->
							<div class="col-md-6">
								<h5>Price</h5>
								<input name="price" type="number" id="{{$package->id}}-price" step="0.1" value="{{ $package->price  }}" placeholder="Cost of Package" required="true">
							</div>
			               
			               <div class="col-md-12">
								<h5>Features &amp; Terms</h5>
									
			                  <input type="text" name="features" id="{{$package->id}}-features" class="rs-selectize-tags" value="{{ $package->features }}" >
								
							</div>

							


					
							



							
					     </div>
					 </div> 

					    <button type="button" onclick='updatePackage("{{ $vendor->slug }}", {{ $package->id }})' class="button">Update Package <i class="fa fa-arrow-circle-right"></i></button>


		      		   <button onclick='deletePackage("{{ $vendor->slug }}", {{ $package->id }})' class="btn btn-lg btn-danger">Delete</button>		

                       

			    </div>

			</div>    

		      	




		      
		      @endforeach

	      @else 

             
             <span id="notice2" class="alert alert-success">Add Some Packages</span>

         @endif


	 


   


	


	</div>
</div>
