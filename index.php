<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/main.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container-fluid">
	   <div class='row'>
	   	<div class='col-md-4' style='padding:20px'>
		   <center><h3><b>Jalan Batam Beta 1</b></h3></center>
		   <div class="row" style='margin-top:30px;'>
			<div class='col-md-3 col-xs-3'>
				<center><div class='moda'><img src='imgs/icon/bus-stop.png'/></div></center>
			</div>
			<div class='col-md-3 col-xs-3'>
				<center><div class='moda'><img src='imgs/icon/bus.png'/></div></center>
			</div>
			<div class='col-md-3 col-xs-3'>
				<center><div class='moda'><img src='imgs/icon/minibus-side-view.png'/></div></center>
			</div>
			<div class='col-md-3 col-xs-3'>
				<center><div class='moda'><img src='imgs/icon/minibus-trip.png'/></div></center>
			</div>
		   </div>
		   <div class="row" style='margin-top:20px;'>
			<div class='col-md-12'>
				<select class='form-control' id='namjalur' >

				</select>
			</div>
		   </div>
		   
		   <div class="row" style='margin-top:20px;'>
			<div class='col-md-3'>
				<h1 class='jmlhalte'>0</h1>
				<p>Halte<p>
			</div>
			<div class='col-md-3'>
				<h1>0</h1>
				<p>Transit<p>
			</div>
			<div class='col-md-3'>
				<h1>10</h1>
				<p>Lampu Merah<p>
			</div>
			
			<div class='col-md-3'>
				<h1>10<span class='mman'>KM</span></h1>
				<p>Jarak Tempuh<p>
			</div>
			
		   </div>
		   
		   <div class="row" style='margin-top:20px;'>
			<div class='col-md-12'>
				<h3>Halte</h3>
				<div class='ldghalte ldg'></div>
				<table class='table thalte'>
					
				</table>
			</div>
			<div class='col-md-6'>
				<h3>Transit</h3>
				<table class='table'>
					<tr><td>Halte 1</td></tr>
				</table>
			</div>
			<div class='col-md-6'>
				<h3>Lampu Merah</h3>
				<table class='table'>
					<tr><td>Halte 1</td></tr>
				</table>
			</div>
		   </div>
		   
		</div>
	    <div class='col-md-8' id="g" style='height:950px;padding:0'>
		  <div id="map"></div>
		</div>
	   </div>
    </div>
   
    <script type="text/javascript">	
var map;
function initMap() {
   map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 1.12624, lng: 463.92834},
    zoom: 12
  }); 
  var wyp;
  directionsService = new google.maps.DirectionsService;  
  $.ajax({
	  url: "api/table.php",
	  async:false,
	  dataType: 'json',
	  success: function(data){
	     wyp=data;
	     var iconBase = 'imgs/marker/';
	     for(var ld in data)
		 {
		    ckpoint=data[ld].checkPoint;
			for(var x=0;x<ckpoint.length;x++){
		    var positionx={lat:parseFloat(ckpoint[x].lat), lng:parseFloat(ckpoint[x].long)}
			var MM =new google.maps.Marker({
					position: positionx,
					map: map,
					icon:iconBase+ckpoint[x].icon+".png",
					title: ckpoint[x].desc
				});
		   }	   
		 }
	  },
	});
	  calculateAndDisplayRoute()
	  function calculateAndDisplayRoute() {
	      for(var ld in wyp){
		    wp1=[];
			var org={lat:parseFloat(wyp[ld].wayPoint[0].lat),lng:parseFloat(wyp[ld].wayPoint[0].long)}
			var dest={lat:parseFloat(wyp[ld].wayPoint[wyp[ld].wayPoint.length-1].lat),lng:parseFloat(wyp[ld].wayPoint[wyp[ld].wayPoint.length-1].long)};
			var ct=1;
			$('#namjalur').append("<option value='"+wyp[ld].jalurId+"'>"+wyp[ld].namaJalur+"</option>")
			for (var wp in wyp[ld].wayPoint){
			    if(ct ==1 || ct == wyp[ld].wayPoint.length)
				{
				   
				}
				else
				{
				   wpoint=wyp[ld].wayPoint[wp];
					var positionxx={lat:parseFloat(wpoint.lat), lng:parseFloat(wpoint.long)}
					wp1.push({
						location: positionxx,
						stopover: true
					  });
				}
				ct +=1;
			}			
		 
		  
		  window["directionsDisplayX"+ld] = new google.maps.DirectionsRenderer({
			  polylineOptions: { 
				strokeColor: wyp[ld].colorModa,
				strokeOpacity: wyp[ld].opacitymoda,
				strokeWeight:wyp[ld].strokemoda},
			  suppressMarkers: true,
			  suppressInfoWindows: true
			});
			 window["directionsDisplayX"+ld].setMap(map); 
            
			
            directionsService.route({
				origin: org,
				destination: dest,
				waypoints: wp1,
				optimizeWaypoints: true,
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.METRIC
			}, createRouter(ld));
	  }
	  
	  function createRouter(ca){
				return function (response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						console.log(response);
					    window["directionsDisplayX"+ca].setDirections(response);
					} else {
						alert('Error: ' + status);
					}
				}
		 };	
	  
	 }
}

    </script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWlT9mVHmNH7D8S_8GcLC_fJAuc31yIWY&callback=initMap">
    </script>
	</div>
  </body>
</html>