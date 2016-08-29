var RushdiMap = null;

function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') {
					c = c.substring(1);
				}
			if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
			}
		}
		return "";
		}
		
function setCookie(cname, cvalue, exmin) {
    var d = new Date();
    d.setTime(d.getTime() + (exmin*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
	}
	
function delete_cookie(name) {
	
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};



function getDistance (p1, p2) {
	 var rad = function(x) {
		return x * Math.PI / 180;
		};

	var R = 6378137; // Earth’s mean radius in meter
	var dLat = rad(p2.lat - p1.lat);
	var dLong = rad(p2.lng - p1.lng);
	var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(p1.lat)) * Math.cos(rad(p2.lat)) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
	var d = Math.round(R * c / 160.9)/10;
	return d; // returns the distance in miles
	};

function RushdiInitMap() {
	
  var map_data = Drupal.settings.store_map_data;
  var stopSort=false;
  for (var i=0; i<map_data.length; i++) {
	  
         if (map_data[i]['distans']) {
			 
	 stopSort=true;
	 
	 break;
  }  }
  
  

  var myLatLng = SetCenter(map_data);
  var user_data;
  
  var main_map_sel = '#rushdi-map';
  var map = new google.maps.Map(document.querySelector(main_map_sel), {
    center: myLatLng,
    zoom: 12,
  });
  RushdiMap = map;
  
  
  function SetCenter(map_data) {
	  var cCooki = getCookie('uPosition').split('@');
	  var myLatLngC={lat:39.0885342, lng:-94.5764128};
	  
	  if (cCooki[0] && !stopSort) {
		  
		map_data.sort(function(a, b) {
			try {
			var myApoint={lat: Number(a.geo.lat), lng: Number(a.geo.lng)};
			} catch (e){
				return -1;}
			try {
			var myBpoint={lat: Number(b.geo.lat), lng: Number(b.geo.lng)};
			} catch (e){
				return 1;}
	var user_coordinat={lat: Number(cCooki[0]), lng: Number(cCooki[1])};
    var compA = getDistance(user_coordinat, myApoint);
    var compB = getDistance(user_coordinat, myBpoint);
			
	return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
}) 
	  }
	  
    for (var i=0; i<map_data.length; i++) {
         if (map_data[i]['geo']) {
	 myLatLngC = {lat: Number(map_data[i]['geo']['lat']), lng: Number(map_data[i]['geo']['lng'])};
	 return myLatLngC;
	   }   
    }
		return myLatLngC;
  };
  
  function SetMarkers(element, index, array){
	  if (!element['geo']) return;
	
  var myLatLngM = {lat: Number(element['geo']['lat']), lng: Number(element['geo']['lng'])};
  var myAdress = element.adress.und[0];
  var myMessage =
  '<div>' + element.title + '</div>' + 
  '<div>' +  myAdress.thoroughfare + '</div>' + 
  '<div>' +  myAdress.locality + '</div>' + 
  '<div>' +  myAdress.postal_code + ' ' + myAdress.administrative_area + '</div>' + 
  '<div>' +  myAdress.country + '</div>';
  var marker = new google.maps.Marker({
    position: myLatLngM,
    map: map,
    title: element.title
  });
		marker.addListener('click', function(myAdress) { 
		infowindow.open(map,marker);
		});
		
		marker.addListener('mouseout', function() {
			infowindow.close();
		});
	
		marker.addListener('mouseover', function() {
			infowindow.open(map, this);
		});
	
	var infowindow = new google.maps.InfoWindow({
    content: myMessage
});
  
  };
  

	

  if(map_data){
  map_data.forEach(SetMarkers);
  }
}

(function ($, Drupal, window, document, undefined) {

// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_store_behavior = {
  attach: function(context, settings) {
	 
	 $('#edit-field-geofield-distance-origin').attr('placeholder','Search a location or postal code...');
	  
function mySort() {
var mylist = $('.view-store-search-block').children('.view-content');
var listitems = mylist.children('.views-row').get();
listitems.sort(function(a, b) {
   var compA = $(a).children('.distance').text();
   var compB = $(b).children('.distance').text();
   
   compA= (compA.length==0)? 9000000: parseFloat(compA);
   compB= (compB.length==0)? 9000000: parseFloat(compB);
   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
})

$.each(listitems, function(idx, itm) { mylist.append(itm); });
};

	  
var map_data = Drupal.settings.store_map_data;
	  ii=0;
	$(document).one('ajaxStop', function(event, xhr, settings){
		ii++;
		if (ii==1) {
	RushdiInitMap();
		}
	});



 //user
	function getLocation() {
		
	var uCooki = getCookie('uPosition');
	 
    if (navigator.geolocation && !uCooki) {
      var user_coordinat =  navigator.geolocation.getCurrentPosition(showPosition, onGeolocationError, {enableHighAccuracy: true});

    } else { if(uCooki){
		var positionCooki=uCooki.split('@');
        var position={coords: {latitude: positionCooki[0], longitude: positionCooki[1]}, old: true};
		var user_coordinat = showPosition(position);
		}
    }		
	}
function onGeolocationError(position) {};
	
function showPosition(position) {
	
	var uLat=position.coords.latitude;
	var uLng=position.coords.longitude;
	var user_coordinat={lat: uLat, lng :uLng};
	
	
	if (!position.old) {
	setCookie('uPosition', uLat + '@' + uLng, 10);
	RushdiInitMap();
	} 
	
	
function showDistance(element, index, array) {
if (!element['geo']) return;
var myLatLngG = {lat: Number(element['geo']['lat']), lng: Number(element['geo']['lng'])};
var myTitle=element.title;
	
	
	
	var d = getDistance(user_coordinat, myLatLngG);
	var setElement= $(".views-row:contains("+myTitle+")");
	
	if (!setElement.find('.distance').length){	
	setElement.prepend('<div class="distance">' + d + ' miles</div>');
	}
}

	if(map_data){
	map_data.forEach(showDistance);
	
	var myUserCoor=getCookie('uPosition').split('@');
	var	myProximity=$('.views-field-field-geofield-distance').children('.field-content').text();

	
		 if (myUserCoor && myProximity == 0) {
	mySort();
	  
	  } 
	
	
	}
	};
	//user
  getLocation();
  
	$("#my-location").click( function() {
	delete_cookie('uPosition');
		
	$('#edit-field-geofield-distance-origin').attr('value', '');
		
	$('#edit-submit-store-search-block').click();
	});

	
	  }
};


})(jQuery, Drupal, this, this.document);
