<div class="toggle-wrap">
  <span class="trigger"><a href="#">#{{ $index+1 }} {{ $package->name }} - &#8377 {{ $package->price }}<i class="fa fa-plus"></i></a></span>
    <div class="toggle-container">
        

        
        @if($package->features)
            <!-- Features -->
          <ul class="property-features checkboxes margin-top-0">
           
            <?php $exclusive = explode(',', $package->features);  ?>

              @foreach($exclusive as $item)
                <li>{{ $item }}</li>
              @endforeach 

          </ul>
        @endif  
    </div>
</div>