 <div class="property-description">

				

        <ul class="property-features terms margin-top-0">
					<li>Liquor Allowed : {!! in_array("liquor_allowed", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					<li>DJ Allowed : {!! in_array("dj_allowed", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					@if(in_array("liquor_allowed", json_decode($venue->parameters)))
					  <li>External Liquor : {!! in_array("external_liquor", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">Not Allowed</span>' !!}</li>
					@endif
					<li>External Catering :{!! in_array("external_catering", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
					@if(in_array("dj_allowed", json_decode($venue->parameters)))
					  <li>External DJ: {!! in_array("external_dj", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
					@endif
					<li>External Decorator : {!! in_array("external_decorator", json_decode($venue->parameters)) ? '<span>Allowed</span>' : '<span class="danger">From Panel</span>' !!}</li>
				    @if($venue->rooms > 0)
					<li>Rooms : <span class="danger">Charged Seperately</span></li>
					@endif
					
				</ul>

				</div>