<!DOCTYPE html>
<html>
  <head>
    <title>Busuka</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

       .maps {
        height: 400px;
        border: none;
        margin-bottom: 0;
      }

      /* Space out content a bit */
      body {
        padding-top: 20px;
        padding-bottom: 20px;
        background:  rgba(0, 110, 255, 0.15);
      }

      .marketing{
         background: #2D3251;
         color:white;
         margin:0;
         padding-top: 20px;
         padding-bottom: 20px;
      }

      /* Everything but the jumbotron gets side spacing for mobile first views */
      .header,
      .marketing,
      .footer {
        padding-right: 15px;
        padding-left: 15px;
      }

      /* Custom page header */
      .header {
        background: #2D3251;
        padding-left: 10px;
        padding-right: 10px;
        
      }
      /* Make the masthead heading the same height as the navigation */
      .header h3 {
        margin-top: 0;
        margin-bottom: 0;
        line-height: 40px;
        color:white;
        font-weight:200;
        
      }

      p{
        text-align: justify;
      }

      .stnum{
        margin: 0;
      }

      /* Custom page footer */
      .footer {
        padding-top: 19px;
        color: #777;
        border-top: 1px solid #e5e5e5;
      }

      /* Customize container */
      @media (min-width: 768px) {
        .container {
          max-width: 730px;
        }
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
      }
      .jumbotron .btn {
        padding: 14px 24px;
        font-size: 21px;
      }

      /* Supporting marketing content */

      .marketing p + h4 {
        margin-top: 28px;
      }

      /* Responsive: Portrait tablets and up */
      @media screen and (min-width: 768px) {
        /* Remove the padding we set earlier */
        .marketing,
        .footer {
          padding-right: 0;
          padding-left: 0;
        }
        /* Space out the masthead */
        /* Remove the bottom border on the jumbotron for visual effect */
        .jumbotron {
          border-bottom: 0;
        }
      }

      @media only screen and (max-device-width: 480px) {
        body {
          padding-top: 0px;
          padding-bottom: 0px;
          background:  rgba(0, 110, 255, 0.15);
        }
        .container{
          padding: 0;
        }
      }

    </style>
  </head>
   <body cz-shortcut-listen="true">

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Busuka V2</h3>
      </div>

      <div class="panel maps">
        <div id="map"></div>
      </div>
      <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
      <script>
         
          var simpleRoute={
              router:function($routes){
                  var el = this.el || document.getElementById('view');
                  var url = location.hash.slice(1) || '/';
                  var routex = $routes[url];
                  if (el && routex.controller) {
                      el.innerHTML = routex.controller();
                  }
              },
              start:function($routes){
                  $(window).bind('hashchange', function() {
                       this.simpleRoute.router($routes);
                  });

                  $(window).bind('load', function() {
                       this.simpleRoute.router($routes);
                  });
              }
          }


          $( document ).ready(function() {
             $("#rute").change(function(){
                window.location.href = '?rute='+$(this).val(); 
             })
          });


          var myLocation;
          
          function getLocation() {
              if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(showPosition);
              } else {
                   console.log("Geolocation is not supported by this browser.");
              }
          }
          function showPosition(position) {
              myLocation={lat:position.coords.latitude,lng:position.coords.longitude};
          }

          getLocation();

          

          var map;
          function initMap() {
            var directionsDisplay;
            var directionsService = new google.maps.DirectionsService();
            function initialize(){
            directionsDisplay = new google.maps.DirectionsRenderer({ polylineOptions: { strokeColor: '#<?php echo $rute_detail['warna'] ?>' } });
            directionsDisplay.setOptions({suppressMarkers: true});
            <?php
              foreach ($halte as $key=>$value) {
                echo "var myLatLng".$key."={lat:".$value['langtitude'].",lng:".$value['longtitude']."}; \n";
              }
            ?>
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng0,
              zoom: 15
            });

            var myLocationMarker = new google.maps.Marker({
                    position: myLocation,
                    map: map,
                    title: 'Me'});
            <?php
              foreach ($halte as $key=>$value) {
                ?>
                   var marker = new google.maps.Marker({
                    position: myLatLng<?php echo $key?>,
                    map: map,
                    title: '<?php echo $value['nama']?>'
                  });
                <?php
              }
            ?>
            calcRoute();
          }
            function calcRoute() {
              <?php
                foreach ($halte as $key=>$value) {
                  echo "var myLatLng".$key."={lat:".$value['langtitude'].",lng:".$value['longtitude']."}; \n";
                }
              ?>
              var waypts=[
              <?php
                foreach ($waypoints as $key=>$value) {
                  echo "{location:'".$value['langtitude'].",".$value['longtitude']."',";
                  echo "stopover:false},";
                };
                echo "];";
              ?>
              var start = new google.maps.LatLng(myLatLng0.lat, myLatLng0.lng);
              var end = new google.maps.LatLng(myLatLng<?php echo count($halte)-1?>.lat, myLatLng<?php echo count($halte)-1?>.lng);
              var request = {
                origin: start,
                destination: end,
                waypoints:waypts,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                  directionsDisplay.setDirections(response);
                  directionsDisplay.setMap(map);
                } else {
                  alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
                }
            });
          }

          google.maps.event.addDomListener(window, 'load', initialize);



        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $API_KEY ?>&callback=initMap"
        async defer></script>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Rute</h4>
          <p>
            <?php 
              $rutes=[];
              foreach($rute as $value){
                 $rutes[$value['id']]=$value['nama_rute'];
              } 
              echo form_dropdown('rute',$rutes,$selected_rute,'class="form-control" id="rute"');
            ?>
          </p>

          <h4>Keterangan</h4>
          <p>
            <div class="row">
              <div class="col-md-6 col-xs-6 col-lg-6">
                <center>
                    <h1 class='stnum'><?php echo count($halte) ?></h1>
                    Halte
                </center>
              </div>
              <div class="col-md-6 col-xs-6 col-lg-6">
                <center>
                    <h1 class='stnum'><?php echo count($transit) ?></h1>
                    Transit
                </center>
              </div>
            </div>
          </p>

          <h4></h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-lg-6">
          <?php
            foreach ($halte as $key=>$value) {
          ?>
            <h4><i class="fa fa-bus" aria-hidden="true"></i> Halte <?php  echo $value['nama']  ?></h4>
            <p></p>
          <?php
          }
          ?>

        </div>
      </div>

      <footer class="footer">
        <p>© 2017 Partager Soft</p>
        <div id="view">
      </div>
      </footer>

    </div> <!-- /container -->
</body>
</html>
