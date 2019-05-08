function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    }
    else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    
    let map = new google.maps.Map(document.getElementById('diagMap'), {
        center: {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)},
        zoom: 8
    });
    
    geocoder.geocode({'location': {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)}}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                console.log(results[0]);
                map.setZoom(11);
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)} ,
                    map: map
                });
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map, marker);
            } else {
                window.alert('No results found');
            }
        } else {
            window.alert('Geocoder failed due to: ' + status);
        }
    });
}

function showError(error) {
    console.log("Error:");
    switch(error.code) {
        case error.PERMISSION_DENIED:
          console.log("User denied the request for Geolocation.");
          break;
        case error.POSITION_UNAVAILABLE:
          console.log("Location information is unavailable.");
          break;
        case error.TIMEOUT:
          console.log("The request to get user location timed out.");
          break;
        case error.UNKNOWN_ERROR:
          console.log("An unknown error occurred.");
          break;
      }
}
