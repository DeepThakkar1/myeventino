<!DOCTYPE html>
<head lang="{{ config('app.locale') }}">

<!-- Basic Page Needs
================================================== -->
<title> @yield('title') MyEventino | Where Celebration Begins</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

<!-- CSS
================================================== -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/main.css" id="colors">

@if(Request::has('platform'))
  <link rel="stylesheet" href="/css/mobile.css">
@endif

<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
<link rel="manifest" href="/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


@yield('css')

</head>
<body>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '755804334581004',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Wrapper -->
<div id="wrapper">


<!-- Header Container
================================================== -->
<header id="header-container" class="header-style-2">

  <!-- Header -->
  <div id="header">
    <div class="container hidden-sm hidden-xs">
      
      <!-- Left Side Content -->
      <div class="left-side">
        
        <!-- Logo -->
        <div id="logo" class="margin-top-10">
          <a href="/"><img src="/images/eventino.png" alt=""></a>

          <!-- Logo for Sticky Header -->
          <a href="index.html" class="sticky-logo"><img src="/images/logo-symbol.png" alt=""></a>
        </div>
        
      </div>
      <!-- Left Side Content / End -->

      <!-- Right Side Content / End -->
      <div class="right-side ">
        <ul class="header-widget">

        <li class="with-btn"><a href="#" data-toggle="modal" data-target="#listModal" class="button border">Add My Business</a></li>

        <li>
            <i class="fa fa-map-marker"></i>
            <div class="widget-content">
              <span class="title">Locate Eventino</span>
              <span class="data">Nashik, Maharashtra</span>
            </div>
          </li>

          <li>
            <i class="fa fa-phone"></i>
            <div class="widget-content">
              <span class="title">Eventino Helpline</span>
              <span class="data">(+91) 9765881368 </span>
            </div>
          </li>

          

          
        </ul>
      </div>
      <!-- Right Side Content / End -->

    </div>

   @include('layouts.nav')
   
  </div>
  <!-- Header / End -->

</header>
@if(!Request::has('platform'))
  <div class="clearfix"></div>
@endif  
<!-- Header Container / End -->


 @yield('content')






<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer hidden-xs">
    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <img class="footer-logo" src="/images/eventino.png" alt="">
                <br><br>
                <p>Eventino is the one shot destination to find the best destination for your own event or to find the best events happening near by you to make a blast!</p>
            </div>

            <div class="col-md-4 col-sm-6 ">
                <h4>Helpful Links</h4>
                <ul class="footer-links">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Add Venue</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>

                <ul class="footer-links">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Our Agents</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>      

            <div class="col-md-3  col-sm-12">
                <h4>Contact Us</h4>
                <div class="text-widget">
                    <span>Nashik, Maharashtra, India</span> <br>
                    Phone: <span>(+91) 9922367414 </span><br>
                    E-Mail:<span> <a href="mailto:contact@myeventino.com">contact@myeventino.com</a> </span><br>
                </div>

                <ul class="social-icons margin-top-20">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                </ul>

            </div>

        </div>
        
        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12">
                <div class="copyrights">© 2016 Eventino. All Rights Reserved.Powered By <b><a href="http://www.trumpetstechnologies.com">Trumpets.</a></b></div>
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->


<!-- Modal -->
<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"><b><i class="fa fa-bars"></i> List Your Business with Eventino</b></h4>
      </div>
      <div class="modal-body">

       <div class="row" >

         <div class="col-md-4 col-md-offset-2">
          <a href="/venues/create" class="button"><i class="fa fa-map-marker"></i> I own a Venue</a>
        </div>  
         
         <div class="col-md-4">
          <a href="/vendors/create" class="button"><i class="fa fa-user"></i> I am a Vendor</a>
        </div>
        </div>  
      </div>
     
    </div>
  </div>
</div>



<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


<!-- js
================================================== -->
<script type="text/javascript" src="/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/js/chosen.min.js"></script>
<script type="text/javascript" src="/js/magnific-popup.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/rangeSlider.js"></script>
<script type="text/javascript" src="/js/sticky-kit.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script type="text/javascript" src="/js/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="/js/tooltips.min.js"></script>
<script type="text/javascript" src="/js/masonry.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>

 

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKrFnTEPkHKOMtrSkj9q8-Cc9QgysFkLc&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="/scripts/infobox.min.js"></script>
<script type="text/javascript" src="/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="/scripts/maps.js"></script>

 <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script type="text/javascript" src="/js/dropzone.js"></script>



@yield('js')




<!-- Style Switcher
================================================== 
<script src="/js/switcher.js"></script> -->
<!-- 
<div id="style-switcher">
    <h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
    
    <div>
        <ul class="colors" id="color1">
            <li><a href="#" class="blue" title="Blue"></a></li>
            <li><a href="#" class="green" title="Green"></a></li>
            <li><a href="#" class="orange" title="Orange"></a></li>
            <li><a href="#" class="navy" title="Navy"></a></li>
            <li><a href="#" class="yellow" title="Yellow"></a></li>
            <li><a href="#" class="peach" title="Peach"></a></li>
            <li><a href="#" class="beige" title="Beige"></a></li>
            <li><a href="#" class="purple" title="Purple"></a></li>
            <li><a href="#" class="celadon" title="Celadon"></a></li>
            <li><a href="#" class="pink" title="Pink"></a></li>
            <li><a href="#" class="red" title="Red"></a></li>
            <li><a href="#" class="brown" title="Brown"></a></li>
            <li><a href="#" class="cherry" title="Cherry"></a></li>
            <li><a href="#" class="cyan" title="Cyan"></a></li>
            <li><a href="#" class="gray" title="Gray"></a></li>
            <li><a href="#" class="olive" title="Olive"></a></li>
        </ul>
    </div>
        
</div>
Style Switcher / End -->


</div>
<!-- Wrapper / End -->


</body>
</html>




