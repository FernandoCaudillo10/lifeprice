let city = "";
let diag = "jjhuhbygvtfcrdxrx";

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
    var infowindow = new google.maps.InfoWindow();
    var SD = {lat: 32.715736, lng: -117.161087};
    let map = new google.maps.Map(document.getElementById('diagMap'), {
        center: {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)},
        zoom: 8
    });
    
    geocoder.geocode({'location': {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)}}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                city = results[0].address_components[2].long_name;
                $.ajax({
                    type:"GET",
                    url:"../diagnosis/api/getDiagnosis.php",
                    dataType:"json",
                    data:{ "city": "Salinas", "diagnosis": diag },
                    success: function (data,status){
                        console.log("hello");
                        console.log(data);
                        data.forEach(function(elem){
                            console.log(elem.address);
                            geocoder.geocode({'address': elem.address + ", " + city}, function(results, status) {
                                if (status === 'OK') {
                                    var infowindow = new google.maps.InfoWindow();
                                
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: results[0].geometry.location
                                    });
                                    google.maps.event.addListener(marker, 'click', function() {
                                      infowindow.setContent('<div><strong>Facility:</strong> ' + elem.facility + '<br>' +
                                        '<strong>Address:</strong> ' + elem.address + '<br> <strong>Cost:</strong> $' + elem.cost + '</div>');
                                      infowindow.open(map, this);
                                    });
                                } else {
                                    alert('Geocode was not successful for the following reason: ' + status);
                                }
                            });
                            
                        });
                    },
                    error: function(error){
                        console.log(error);
                    },
                });
                
                map.setZoom(10.5);
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)} ,
                    map: map,
                    label: "^_^"
                });
                infowindow.setContent('<div><strong>Current Location: </strong>'+results[0].formatted_address+'</div>');
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
