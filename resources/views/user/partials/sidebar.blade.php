<!-- Widget -->
		<div id="account-nav" class="{{ Request::has('platform') ? 'col-md-12' : 'col-md-4' }}">

				<div class="my-account-nav-container">
					
					<ul class="my-account-nav">
						<li class="sub-nav-title">Manage Account</li>
						<li><a href="/user/account" class="current"><i class="fa fa-user"></i> My Profile</a></li>
						<li><a href="/user/favourites"><i class="fa fa-star"></i> Favourites</a></li>
						<li><a href="/user/orders" class="current"><i class="fa fa-cart-arrow-down"></i> My Orders</a></li>
					</ul>

					<ul class="my-account-nav">
						<li class="sub-nav-title">Manage Events</li>
						<li><a href="/user/events"><i class="fa fa-bars"></i> My Events</a></li>
						<li><a href="/events/new"><i class="fa fa-edit"></i> Create New Event</a></li>
						<li><a href="/events/create"><i class="fa fa-map"></i> Showcase My Event</a></li>
						<li><a href="/user/events/going"><i class="fa fa-car"></i> Events I am Going</a></li>
					</ul>
					
					<ul class="my-account-nav">
						<li class="sub-nav-title">Manage Listings</li>
						<li><a href="/user/venues"><i class="fa fa-th"></i> My Venues</a></li>
						<li><a href="/venues/create"><i class="fa fa-edit"></i> Submit New Venue</a></li>
						<li><a href="/venues/promote"><i class="fa fa-globe"></i> Promote Venue</a></li>
						<li><a href="/user/vendors"><i class="fa fa-users"></i> Vendor Profiles</a></li>
					</ul>

					<ul class="my-account-nav">
						<li><a href="/user/password"><i class="fa fa-lock"></i> Change Password</a></li>
						<li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Log Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
					</ul>

					

				</div>

		</div>