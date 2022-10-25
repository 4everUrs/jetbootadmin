<div>
        <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Fleet Management Maps') }}
        </h2>
        </x-slot>

                <div class="card">
                <div class="card-body">
                <div lang="{{ str_replace('_', '-', app()->getLocale()) }}">
                        
                <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style type="text/css">
                   #map {
                           height: 400px;
                         }
                 </style>
                </head>
    
                <body>
                <div class="container mt-5">
                <div id="map"></div>
                
  
                <script type="text/javascript">
                  function initMap() {
                   const myLatLng = { lat: 14.72838269831031, lng: 121.03786074706339 };
                  const map = new google.maps.Map(document.getElementById("map"), {
                   zoom: 14,
                  center: myLatLng,
                     });
  
                 new google.maps.Marker({
                      position: myLatLng,
                      map,
                        title: "You are Here",
                          });
                                     }
  
                         window.initMap = initMap;
                    </script>
  
                             <script type="text/javascript"
                               src="https://maps.google.com/maps/api/js?zoom=14key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" >
                            </script>
  
                </body>
                </div>
                </div>
                </div>
</div>
