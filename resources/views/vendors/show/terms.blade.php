<div class="property-description">
   @if($vendor->policies)
				    	  <ul>
				    		@foreach($vendor->policies as $term)

				    		  <li>{{ $term }}</li>

				    		@endforeach	
				    	</ul>	
				    	

				    	@endif

				    	</div>