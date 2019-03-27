<div class="property-description"> 
 <h3 class="desc-headline margin-top-5">Reviews &amp; Ratings</h3>
       @if(Auth::check()) 
           <form method="POST" action="/events/{{$event->slug}}/reviews">

             @include('layouts.errors')

             {{ csrf_field() }}
             <!-- Description -->
              <div class="form">
                <textarea placeholder="Write about this place..."  name="comment" cols="40" rows="3" id="comment" spellcheck="true">{{ old('comment') }}</textarea>
                </div>

                <input id="input-7-xs" name="rating" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>
            
                <div class="divider"></div>
                <button type="submit" class="button preview margin-top-5">Post Review <i class="fa fa-arrow-circle-right"></i></button>

              
           </form>

           @else

            <div class="notification notice large margin-bottom-55">
              <p>Login to review this place! <a href="/login"><b>Login Here</b></a></p>
            </div>

          @endif

       <hr/>

       @foreach($event->reviews as $review)

          <div style="border: 1px solid #e3e3e3;padding: 15px;margin-top: 15px;">
            <h4>{{ $review->user->name }} <small>{{ $review->created_at->diffForHumans() }}</small>
            @if(auth()->id() == $review->user->id)
            <form action="/events/{{$event->slug}}/reviews/{{ $review->id }}" method="POST" class="pull-right">
              {{ csrf_field() }}
              
              {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-link"><i style="font-size: 22px;" class="fa fa-trash"></i></button>
              
            </form>
            @endif

            </h4>
            <hr/>
            <p>{{ $review->comment }}</p>

            <input id="input-8-xs" name="rating" class="rating rating-loading" data-display-only="true" data-readonly="true" value="{{ $review->rating }}" data-min="0" data-max="5" data-step="0.5" data-size="xs" data-show-clear="false">
            

          </div>



       @endforeach

       </div>