<div class="property-description">
   @if($event->policies)
				    	  <ul>
				    		@foreach($event->policies as $term)

				    		  <li>{{ $term }}</li>

				    		@endforeach	
				    	</ul>	
				    	

				    	@endif

				    	</div>