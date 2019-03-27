
@extends('layouts.app')

@section('content')
<!-- Titlebar
================================================== -->
@if(!Request::has('platform'))
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Create New Account</h2>
                <span>Manage your venues &amp; events with Eventino</span>
                
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Account</li>
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

    <!-- Submit Page -->
    <div class="col-md-12">
        <div class="submit-page">

          @include('layouts.errors')

           <div class="row with-forms">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <h5>Your Name</h5>
                            <input name="name" type="text" required="true" value="{{ old('name') }}">
                        </div>

                       <div class="col-md-12">
                            <h5>Email Address</h5>
                            <input name="email" type="email" required="true" value="{{ old('email') }}">
                        </div>

                         <div class="col-md-12">
                            <h5>Passowrd</h5>
                            <input name="password" type="password" required="true">
                        </div>

                        <div class="col-md-12">
                            <h5>Confirm Password</h5>
                            <input name="password_confirmation" type="password" required="true">
                        </div>

                       
                         
                        <div class="col-md-12">
                          <div class="divider"></div>
                          <button type="submit" class="button preview margin-top-5">Create Account <i class="fa fa-sign-in"></i></button>
                        </div>  

                    </form>
                </div>
                

                <div class="notification notice large margin-top-35 margin-bottom-55">
            <h4>Already Have an Account?</h4>
            <p>If you already have an account you can login over Here -> <b><a href="/login">Log in to My Account</a></b>.</p>
        </div>

           
    </div>
</div>
</div>
</div>
<div class="margin-bottom-45"></div>
@endsection

