@extends('layouts.app')

@section('content')
<!-- Titlebar
================================================== -->
@if(!Request::has('platform'))
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Log In</h2>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                       <div class="col-md-12">
                            <h5>Email Address</h5>
                            <input name="email" type="email" required="true" value="{{ old('email') }}">
                        </div>

                         <div class="col-md-12">
                            <h5>Passowrd</h5>
                            <input name="password" type="password" required="true">
                        </div>
                        
                         <div class="col-md-12">
                        <div class="checkboxes in-row margin-bottom-20">
                
                            <input id="check-22" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="check-22">Remember Me</label>

                          

                                    
                        </div>
                        </div>

                         
                        <div class="col-md-12">
                          <div class="divider"></div>
                          <button type="submit" class="button preview margin-top-5">Login To Account <i class="fa fa-sign-in"></i></button>
                        </div>  

                    </form>
                </div>

                <div class="notification notice large margin-top-35 margin-bottom-55">
            <h4>Don't Have an Account?</h4>
            <p>If you don't have an account you can create new account over Here -> <b><a href="/register">Create Account</a></b>.</p>
        </div>
           
    </div>
</div>
</div>
</div>
<div class="margin-bottom-45"></div>
@endsection
