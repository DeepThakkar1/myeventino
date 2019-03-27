	<h3 class="desc-headline">Eventino Ratings</h3>
				<ul class="property-features margin-top-0">
				@if(Request::has('platform'))
				 <div class="logo-carousel">
				 @endif

				    <div class="{{ !Request::has('platform') ?: 'carousel-item' }}">
						 <li>
	                     <div class="row">
	                     <div class="col-md-4">
	                      <img style="width: 60px;" src="/images/ratings/first.png">
	                     </div> 
	                     <div class="col-md-8">
	                      <b class="title">Ambience</b><br>
	                      80%
	                     </div> 
	                     </div> 
	                   </li>
                    </div>
                    
                      <div class="{{ !Request::has('platform') ?: 'carousel-item' }}">
                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/ratings/second.png">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Hospitality</b><br>
                      90%
                     </div> 
                     </div> 
                   </li>
                   </div>

                     <div class="{{ !Request::has('platform') ?: 'carousel-item' }}">

                    <li>
                     <div class="row">
                     <div class="col-md-4">
                      <img style="width: 60px;" src="/images/ratings/third.png">
                     </div> 
                     <div class="col-md-8">
                      <b class="title">Food</b><br>
                      70%
                     </div> 
                     </div> 
                   </li>

                   </div>

                @if(Request::has('platform'))
                   </div>
                   @endif
				</ul>