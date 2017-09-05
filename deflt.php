<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 80%; }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script type="text/javascript">	
var map;
function initMap() {
  var megamall = [{lat:1.129878, lng:104.054811},{location:'Megamall',icon:"tiban"}];
  var bri=[{lat:1.130420, lng:104.051203},{location:'BRI Batam Center',icon:"tiban"}];
  var cakimin=[{lat:1.130727, lng:104.047866},{location:'Harmoni One',icon:"tiban"}];
  var yossudarso=[{lat:1.125424, lng:104.042650},{location:'Yosudarso',icon:"tiban"}];
  var gelael=[{lat:1.125767, lng:104.030517},{location:'Gelael',icon:"tiban"}];
  var orchid=[{lat:1.124765, lng:104.025579},{location:'Orchid Park',icon:"tiban"}];
  var anggrekmas=[{lat:1.124796, lng:104.021732},{location:'Anggrek Mas',icon:"tiban"}];
  var simpangjam=[{lat:1.122180, lng:104.015644},{location:'Casblanca',icon:"tiban"}];
  var tibankampung=[{lat:1.122180, lng:104.015644},{location:'Tiban Kampung',icon:"tiban"}];
  var vitka=[{lat:1.111767, lng:103.977484},{location:'Tiban Center',icon:"tiban"}];
  var tamansari=[{lat:1.108980, lng:103.971056},{location:'Taman Sari',icon:"tiban"}];
  var ciptapuri=[{lat:1.108782, lng:103.964781},{location:'Cipta Puri',icon:"tiban"}];
  var alamlestari1=[{lat:1.108782, lng:103.964781},{location:'Vila Alam Lesatri 1',icon:"tiban"}];
  var smp3=[{lat:1.106273, lng:103.953534},{location:'STC',icon:"tiban"}];
  var PCI=[{lat:1.110450, lng:103.948376},{location:'PCI',icon:"tiban"}];
  var Shangrila=[{lat:1.1138213,lng:103.9439382},{location:'Shangrilla',icon:"tiban"}];
  var Telkom=[{lat:1.1160613,lng:103.9404469},{location:'Telkom Sekupang',icon:"tiban"}];
  var srob=[{lat:1.1223392,lng:103.9339605},{location:'Simpang RS Otorita Batam',icon:"tiban"}];
  var rsab=[{lat:1.129210, lng:103.932114},{location:'RS Otorita',icon:"tiban"}];  
  var sekupang = [{lat: 1.12624, lng: 463.92834},{location:'Sekupang',icon:"tiban"}];
  var jonoStart=[{lat: 1.1592998,lng:104.1207226},{location:'Nongsa',icon:"jono"}];
  var simpangKabil=[{lat: 1.104474,lng:104.039357},{location:'Simpang Kabil',icon:"jono"}];
  var pizzahut=[{lat: 1.139898,lng:104.015584},{location:'pizzaHut',icon:"jono"}];
  var nagoyaHill=[{lat: 1.145119, lng:104.011049},{location:'Nagoya Hill',icon:"jono"}];
  var hypermartBatuAji =[{lat:1.0473699,lng:103.937263},{location:'Hyper Mart Batu Aji',icon:"btj"}];
  var poltek=[{lat:1.120441, lng:104.048803},{location:'Hyper Mart Batu Aji',icon:"btj"}];
  
  
  var loc=[megamall,bri,cakimin,yossudarso,gelael,orchid,
		  anggrekmas,simpangjam,tibankampung,vitka,tamansari,
		  ciptapuri,alamlestari1,smp3,PCI,Shangrila,Telkom,srob,rsab,sekupang]

  var btjbtmcntr=[hypermartBatuAji,poltek,megamall]
  
  var jono=[jonoStart,simpangKabil,megamall,nagoyaHill]
		  
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 1.12624, lng: 463.92834},
    zoom: 12
  });
  
   directionsService = new google.maps.DirectionsService;
    directionsDisplayBusTibanMegamall = new google.maps.DirectionsRenderer({
	  polylineOptions: { 
		strokeColor: "#8b0013",
		strokeOpacity: 1.0,
		strokeWeight:6 },
	  suppressMarkers: true,
      suppressInfoWindows: true
    });
	directionsDisplayBusTibanMegamall.setMap(map);
	
	directionsDisplayBusBatuAji = new google.maps.DirectionsRenderer({
	  suppressMarkers: true,
	  polylineOptions: { 
		strokeColor: "#006DF0", 
		strokeOpacity: 1.0,
		strokeWeight:6 
	  
	  },
      suppressInfoWindows: true
    });
	directionsDisplayBusBatuAji.setMap(map);
	
	directionsDisplayJono = new google.maps.DirectionsRenderer({
	  suppressMarkers: true,
	  polylineOptions: { 
		strokeColor: "#C73250",
	    strokeOpacity: 1.0,
		strokeWeight:3 
	  },
      suppressInfoWindows: true
    });
	directionsDisplayJono.setMap(map);
	
  var iconBase = '/busuka/imgs/marker/';
  for(var x=0;x<loc.length;x++){
	var MM =new google.maps.Marker({
			position: loc[x][0],
			map: map,
			icon:iconBase+loc[x][1].icon+".png",
			title: loc[x][1].location
		});
  }
  
  for(var x=0;x<btjbtmcntr.length;x++){
	var MM =new google.maps.Marker({
			position: btjbtmcntr[x][0],
			map: map,
			icon:iconBase+btjbtmcntr[x][1].icon+".png",
			title: btjbtmcntr[x][1].location
		});
  }
  
  for(var x=0;x<jono.length;x++){
	var MM =new google.maps.Marker({
			position: jono[x][0],
			map: map,
			icon:iconBase+jono[x][1].icon+".png",
			title: jono[x][1].location
		});
  }
  
  
  var waypts = [];
  var waypts2 = [];
  var wayJono=[];
  
  waypts.push({
    location: loc[3][0],
    stopover: true
  });
  

  wayJono.push({
	  location: simpangKabil[0],
      stopover: true
  })
  
  wayJono.push({
	  location: poltek[0],
      stopover: true
  })
  
  wayJono.push({
	  location: megamall[0],
      stopover: true
  })
  
 
  
  wayJono.push({
	  location: pizzahut[0],
      stopover: true
  })
  
  
  calculateAndDisplayRoute(loc[0][0], loc[loc.length-1][0],btjbtmcntr[0][0],btjbtmcntr[btjbtmcntr.length-1][0],jono[0][0],jono[jono.length-1][0],waypts,wayJono)
  function calculateAndDisplayRoute(pointA1,pointB1,pointA2,pointB2,pointA3,pointB3,wp1,wp3) {
	  
	  directionsService.route({
		origin: pointA1,
		destination: pointB1,
		waypoints: wp1,
		optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC
	  }, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			 console.log(response);
				directionsDisplayBusTibanMegamall.setDirections(response);
			
		} else {
		  window.alert('Directions request failed due to ' + status);
		}
	  });
	  
	  directionsService.route({
		origin: pointA2,
		destination: pointB2,
		optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC
	  }, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			 console.log(response);
				directionsDisplayBusBatuAji.setDirections(response);
			
		} else {
		  window.alert('Directions request failed due to ' + status);
		}
	  });
	  
	  directionsService.route({
		origin: pointA2,
		destination: pointB2,
		optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC
	  }, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			 console.log(response);
				directionsDisplayBusBatuAji.setDirections(response);
			
		} else {
		  window.alert('Directions request failed due to ' + status);
		}
	  });
	  
	  directionsService.route({
		origin: pointA3,
		destination: pointB3,
		waypoints: wayJono,
		optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC
	  }, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			 console.log(response);
				directionsDisplayJono.setDirections(response);
			
		} else {
		  window.alert('Directions request failed due to ' + status);
		}
	  });
}
  
  
  
  

}

    </script>
	
	aa
	<div>
		<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWlT9mVHmNH7D8S_8GcLC_fJAuc31yIWY&callback=initMap">
    </script>
	</div>
  </body>
</html>