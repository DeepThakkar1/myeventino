@extends('layouts.app')


@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Change Password</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Change Password</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">

        @include('user.partials.sidebar')

		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6  my-profile">

				 @include('layouts.errors')
					<h4 class="margin-top-0 margin-bottom-30">Change Password</h4>

					 <form method="POST" action="/user/password"> 

					 {{ csrf_field() }}

					

					<label>Current Password</label>
					<input name="old_password" type="password">

					<label>New Password</label>
					<input name="password" type="password">

					<label>Confirm New Password</label>
					<input name="password_confirmation" type="password">

					<button type="submit" class="margin-top-20 button">Update Password</button>

					</form>
				</div>

				<div class="col-md-6">
					<div class="notification notice">
						<p>Your password should be at least 8 alpha-numeric characters long to be safe</p>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>


@endsection