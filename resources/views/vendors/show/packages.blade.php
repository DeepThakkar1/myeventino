<div class="property-description">
<!-- Toggles Container -->
<div class="style-2">

	@forelse($vendor->packages as $index => $package)

	  @include('vendors.partials.package')

	@empty


	@endforelse

</div>
<!-- Toggles Container / End -->
</div>