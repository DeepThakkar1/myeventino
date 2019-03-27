<div class="property-description">
<!-- Toggles Container -->
<div class="style-2">

	@forelse($venue->sections as $index => $section)

	  @include('venues.partials.section')

	@empty


	@endforelse

</div>
<!-- Toggles Container / End -->
</div>