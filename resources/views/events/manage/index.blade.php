@extends('layouts.app')


@section('css')

<link rel="stylesheet" type="text/css" href="/css/plugins.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/css/multidate.css">
<link rel="stylesheet" type="text/css" href="/css/timepicker.css">

<style type="text/css">
	
	.ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
		    background: #192942 none;
		    color: white;
		}

</style>

@endsection


@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2><i class="fa fa-edit"></i> {{ $event->name }}</h2>
			</div>
			<div class="col-md-4">
				<a href="/events/{{$event->slug}}/" class="button preview ">Preview My Page <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
<div class="row">

    <div class="col-md-12">
     <div class="submit-page margin-bottom-35">
       
       <ul class="nav nav-pills" id="mytabs">
		  <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Details</a></li>
		  <li role="presentation"><a href="#timings" aria-controls="timings" role="tab" data-toggle="tab">Timings</a></li>
		  <li role="presentation"><a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">Packages</a></li>
		  <li role="presentation"><a href="#terms" aria-controls="terms" role="tab" data-toggle="tab"">Terms &amp; Conditions</a></li>
		  <li role="presentation"><a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Sales &amp; Statistics</a></li>
		</ul>

	  </div>
	  

	</div>

	  <!-- Tab panes -->
  <div class="tab-content" id="manage-tabs">
    <div role="tabpanel" class="tab-pane active" id="basic">
    	@include('events.manage.edit')
    </div>
    <div role="tabpanel" class="tab-pane" id="timings">
    	@include('events.manage.timings')
    </div>
    <div role="tabpanel" class="tab-pane " id="packages">
    	@include('events.manage.packages')
    </div>
    <div role="tabpanel" class="tab-pane " id="terms">
    	@include('events.manage.terms')
    </div>
    <div role="tabpanel" class="tab-pane" id="sales">
    	@include('events.manage.sales')
    </div>

    
  </div>

		
	
</div>
</div>

<div class="margin-top-55"></div>

@endsection


@section('js')

<script src="/js/selectize.min.js"></script>
 
<script src="/js/selectize-example.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<script src="/js/multidate.js"></script>

<script src="/js/timepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">
	
       $('#dates').multiDatesPicker({ dateFormat: 'dd-mm-yy' });

       $('#dates2').multiDatesPicker({ dateFormat: 'dd-mm-yy' });

       $('.timepicker').timepicker({ 'timeFormat': 'h:i A' });
       
      
 


       // Javascript to enable link to tab
		var url = document.location.toString();
		if (url.match('#')) {
		    $('.nav-pills a[href="#' + url.split('#')[1] ).tab('show');
		} //add a suffix

		// Change hash for page-reload
		$('.nav-pills a').on('shown.bs.tab', function (e) {
		    window.location.hash = e.target.hash;
		     window.scrollTo( 0, 0 );
		})




		function deletePackage(slug, index) {
			
			axios.delete('/events/' + slug + '/packages/' + index, {})
			     .then(function (response) {
			        console.log(response);
			        $('#package-' + index).hide();
			      })
			      .catch(function (error) {
			        console.log(error);
			      });


		}

		function deletePolicy(slug, index) {
			
			axios.delete('/events/' + slug + '/policies/' + index, {})
			     .then(function (response) {
			        console.log(response);
			        $('#policy-' + index).hide();
			      })
			      .catch(function (error) {
			        console.log(error);
			      });


		}

		function updatePolicy(slug, index) {

			var value = $('#policy-' + index + '-data').html(); 
			
			axios.patch('/events/' + slug + '/policies/' + index, {value: value})
			     .then(function (response) {
			        console.log(response);
			        $('#notice-policy').removeClass('hidden');
			        setTimeout(function(){ $('#notice-policy').addClass('hidden');}, 3000);
			      })
			      .catch(function (error) {
			        console.log(error);
			      });


		}


		function updatePackage(slug, index) {

            var ticketType = document.getElementById( index + '-ticket-type');

			
			var data = {

				name: $('#' + index + '-name').html(),

				ticket_for: $('#' + index + '-ticket-for').html(),

				price: $('#' + index + '-price').html(),

				ticket_type: ticketType.options[ ticketType.selectedIndex ].value ,

				count: $('#' + index + '-count').html(),

				days: $('#' + index + '-days').val(),

			};
			
			axios.patch('/events/' + slug + '/packages/' + index, {data})
			     .then(function (response) {
			        console.log(response);
			        $('#notice-package').removeClass('hidden');
			        setTimeout(function(){ $('#notice-package').addClass('hidden');}, 3000);
			      })
			      .catch(function (error) {
			        console.log(error);
			      });


		}
      

    

</script>

@endsection