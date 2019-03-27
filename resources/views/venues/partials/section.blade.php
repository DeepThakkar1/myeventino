<div class="toggle-wrap">
  <span class="trigger "><a href="#">#{{ $index+1 }} {{ $section->name }} - {{ $section->type }}<i class="fa fa-plus"></i></a></span>
    <div class="toggle-container">
          <!-- Main Features -->
        <ul class="property-main-features">
          <li>Area <span>{{ $section->area }} sq.ft.</span></li>
          <li>Price/Person <span>&#8377 {{ $section->price_person }}</span></li>
          <li>Approx Price<span>&#8377 {{ $section->price }}</span></li>
        </ul>

          <ul class="property-features margin-top-30">
             
              <li>
                  <div class="row">
                    <div class="col-md-4">
                    <img style="width: 60px;" src="/images/seatings/theatre.gif">
                    </div> 
                    <div class="col-md-8">
                    <b class="title">Theatre Capacity</b><br>
                    {{ $section->theatre_capacity}}
                    </div> 
                  </div> 
                </li>

                <li>
                    <div class="row">
                      <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/floating.gif">
                      </div> 
                      <div class="col-md-8">
                      <b class="title">Floating Capacity</b><br>
                      {{ $section->floating_capacity }}
                      </div> 
                    </div> 
                </li>

                <li>
                    <div class="row">
                      <div class="col-md-4">
                      <img style="width: 60px;" src="/images/seatings/cluster.gif">
                      </div> 
                      <div class="col-md-8">
                      <b class="title">Cluster Capacity</b><br>
                      {{ $section->cluster_capacity }}
                      </div> 
                    </div> 
                 </li>



          </ul>
        
        @if($section->exclusive_features)
            <!-- Features --> 
          <ul class="property-features checkboxes margin-top-30">
           
            <?php $exclusive = explode(',', $section->exclusive_features);  ?>

              @foreach($exclusive as $item)
                <li>{{ $item }}</li>
              @endforeach 

          </ul>
        @endif  
    </div>
</div>