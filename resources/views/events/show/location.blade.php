<div class="property-description">

        <h3 style="color: #192942;">{{ $event->address }}</h3>
        <p>{{ $event->city}} - {{ $event->pincode }}, {{$event->state}}, {{$event->country}}</p>
        
        <hr>
<!-- Location -->
		<h3 class="desc-headline no-border" id="location">Location</h3>
		<div id="propertyMap-container">
			<div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
			<a href="#" id="streetView">Street View</a>
		</div>

</div>