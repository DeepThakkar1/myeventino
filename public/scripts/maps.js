function initMap()
{
     var map = new google.maps.Map(document.getElementById('propertyMap'), {
          center: {lat: 20.073275, lng: 73.636491},
          zoom: 8
        });
}

(function($) {
    "use strict";
    


    $(window).on('load resize', function() {
        var topbarHeight=$("#top-bar").height();
        var headerHeight=$("#header").innerHeight()+ topbarHeight;
        $(".fs-container").css('height', ''+ $(window).height()- headerHeight+'px');

        initMap();
        
    }
    );
   
    
}

)(this.jQuery);