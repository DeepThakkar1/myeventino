@extends('layouts.app')


@section('content')




<!-- Titlebar
================================================== -->
@if(!Request::has('platform'))
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{ auth()->user()->name }} - Profile</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Profile</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

@endif


<!-- Content
================================================== -->
<div class="container">
	<div class="row">


		@include('user.partials.sidebar')
        
        @if(!Request::has('platform'))
		<div class="col-md-8">
			<div class="row">


				<div class="col-md-8 my-profile">
					<h4 class="margin-top-0 margin-bottom-30">Account Details</h4>

					<form method="POST" action="/user/account">

					@include('layouts.errors')

					{{ csrf_field() }}

					<label>Your Name</label>
					<input name="name" value="{{ Auth::user()->name }}" type="text">


					<label>Email</label>
					<input name="email" value="{{ Auth::user()->email }}" type="text">

					<label>Mobile No</label>
					<input name="phone" value="{{ Auth::user()->profile ? Auth::user()->profile->phone  : ''}}" placeholder="Enter Mobile No" type="text">

					<label>Address</label>
					<input name="address" value="{{ Auth::user()->profile ? Auth::user()->profile->address : '' }}" placeholder="Your Address" type="text">

					<label>State</label>
					<input name="state" value="{{ Auth::user()->profile ? Auth::user()->profile->state : 'Maharashtra' }}" type="text">
				    
				    <label>City</label>
					<input name="city" value="{{ Auth::user()->profile ? Auth::user()->profile->city : 'Nashik' }}" type="text">

					<label>Country</label>
					<input name="country" value="{{ Auth::user()->profile ? Auth::user()->profile->country : 'India' }}" type="text">

					<label>Pincode</label>
					<input name="pincode" value="422002" type="text">

					


					<button type="submit" class="button margin-top-20 margin-bottom-20">Save Changes</button>

					</form>
				</div>

				<div class="col-md-4">
					<!-- Avatar -->
					<div class="edit-profile-photo">
						<img src="/images/agent-02.jpg" alt="">
						<div class="change-photo-btn">
							<div class="photoUpload">
							   <form>
							    <span><i class="fa fa-upload"></i> Upload Photo</span>
							    <input type="file" class="upload" />
							    </form>
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>
       @endif
		

	</div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


@endsection