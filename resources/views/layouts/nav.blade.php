 <!-- Mobile Navigation -->
   @if(!Request::has('platform'))
    <div class="menu-responsive fixed-top hidden-xs" style="width: 100%; margin: 0;padding: 0;height: 30px;position: fixed;">
      <i class="fa fa-reorder menu-trigger"></i>
    </div>
   @endif 


    <!-- Main Navigation -->
    <nav id="navigation" class="style-2">
      <div class="container">
          <ul id="responsive">

            <li><a class="" href="/">Home</a></li>
            <li><a class="" href="/venues">Venues</a></li>

             <li><a class="" href="/events">Events</a></li>
              <li><a class="" href="/vendors">Vendors</a></li>
              <li><a class="" target="_blank" href="http://blog.myeventino.com">Blog</a></li>


                <li><a class="" href="/events/create">Showcase My Event</a></li>

            
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            My Account 
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            
                        </ul>
                    </li>
                   
                   
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} 
                        </a>

                        <ul class="dropdown-menu" role="menu">
                           <li><a href="/user/account">My Account</a></li>
                           <li><a href="/user/favourites">Favourites</a></li>
                           <li><a href="/user/events">Manage Events</a></li>
                           <li><a href="/user/venues">Manage Venues</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                 <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-map-marker"></i> Nashik 
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        </ul>
                    </li>


              
                
              </ul>
            </li>

         

          </ul>
      </div>
    </nav>
     @if(!Request::has('platform'))
       <div class="clearfix"></div>
     @endif  
    
    <!-- Main Navigation / End -->