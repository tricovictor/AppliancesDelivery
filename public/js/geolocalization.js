function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 13
    });

    var infoAqui = new google.maps.InfoWindow({map: map});

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            /* var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);*/
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoAqui.setPosition(pos);
            $('#lat').val(pos.lat);
            $('#lng').val(pos.lng);
            infoAqui.setContent('Ud. Está Aqui.'+pos.lat+pos.lng);
            map.setCenter(pos);

            var locations = [];
            $.getJSON('http://localhost/html/phonegapphp/getUbicacion.php', function(data) {
            var infoWindow = new google.maps.InfoWindow();
                
                for(var i=0; i<data.length; i++) {
                    locations.push({name: data[i].name, latlng: new google.maps.LatLng(data[i].lat , data[i].lng) });
                    var dist = distance(pos.lat, pos.lng, locations[i].latlng.lat(), locations[i].latlng.lng());
                    if(dist<50) {
                        dist = dist.toString();
                        var iwContent = locations[i].name + "(" + dist + " km.)";
                        createMarker(locations[i].latlng, locations[i].name, iwContent); 
                    }
                }
                function createMarker(latlng, title, iwContent) {
                    var marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            title: title,
                            animation: google.maps.Animation.DROP
                        });
                    google.maps.event.addListener(marker, 'click', function(){
                        infoWindow.setContent(iwContent);
                        infoWindow.open(map, marker);
                        });
                }

            });

        }, 

        function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
    
    //function cargoCanchas() {

    //}

    function distance(lat1, lng1, lat2, lng2) {
        var radlat1 = Math.PI * lat1 / 180;
        var radlat2 = Math.PI * lat2 / 180;
        var radlon1 = Math.PI * lng1 / 180;
        var radlon2 = Math.PI * lng2 / 180;
        var theta = lng1 - lng2;
        var radtheta = Math.PI * theta / 180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist);
        dist = dist * 180 / Math.PI;
        dist = dist * 60 * 1.1515;

        //Get in in kilometers
        dist = dist * 1.609344;
        dist = dist.toFixed(1);

        return dist;
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}


