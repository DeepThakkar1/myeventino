@extends('layouts.app')


@section('css')

<link rel="stylesheet" type="text/css" href="/css/plugins.css">

@endsection


@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2><i class="fa fa-plus-circle"></i> {{ $venue->venue_name }} - Manage Sections</h2>
            
			</div>
			<div class="col-md-2">
			<a href="/venues/{{$venue->slug}}/edit" class="button preview ">Edit Basic Details<i class="fa fa-arrow-circle-left"></i></a>
			</div>
			<div class="col-md-2">
				<a href="/venues/{{$venue->slug}}/" class="button preview ">Preview My Page <i class="fa fa-arrow-circle-right"></i></a>
				
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
<div class="row">

	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">
  

        @if( session('flash_title') && session('flash_message'))

		<div class="notification notice large margin-bottom-55">
			<h4>{{ session('flash_title') }}</h4>
			<p>{{ session('flash_message') }}</p>
		</div>
      
       @endif
	
	   	   @include('venues.sections.new')

	   	   @forelse($venue->sections as $index => $section)

	          @include('venues.sections.section')

	        @empty

	        @endforelse




		


				

 <div class="margin-top-55"></div>
		<div class="divider"></div>
		
</div>
		
	</div>

</div>
</div>

<div class="margin-top-55"></div>

@endsection

@section('js')

<script src="/js/selectize.min.js"></script>
 
<script src="/js/selectize-example.js"></script>

@endsection