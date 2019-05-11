let suggestions = [];

$(document).ready(() =>{
    
    //update db
    // $.ajax({
    //     type:"GET",
    //     url: "https://healthservice.priaid.ch/symptoms",
    //     dataType:"json",
    //     data:{
    //         "token":  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNlc2FyYWFsZHJldGVAc3R1ZGVudC5oYXJ0bmVsbC5lZHUiLCJyb2xlIjoiVXNlciIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL3NpZCI6IjIzNjciLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3ZlcnNpb24iOiIxMDgiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL2xpbWl0IjoiMTAwIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9tZW1iZXJzaGlwIjoiQmFzaWMiLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL2xhbmd1YWdlIjoiZW4tZ2IiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL2V4cGlyYXRpb24iOiIyMDk5LTEyLTMxIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9tZW1iZXJzaGlwc3RhcnQiOiIyMDE5LTA0LTMwIiwiaXNzIjoiaHR0cHM6Ly9hdXRoc2VydmljZS5wcmlhaWQuY2giLCJhdWQiOiJodHRwczovL2hlYWx0aHNlcnZpY2UucHJpYWlkLmNoIiwiZXhwIjoxNTU3MzUwNjcxLCJuYmYiOjE1NTczNDM0NzF9.Xi5ljpZybTCnLAQ0xWSWqPlhls3buIQdd83zDISh4dI",
    //         "format": "json",
    //         "language": "en-gb",
    //     },
    //     success: function (data,status){
    //         data = Array.from(data);
    //         data.forEach((elem) => suggestions.push(elem.Name));
    //         autocomplete(document.getElementById("symptomsInput"), suggestions);
            
    //         data = data.map(elem => elem.Name);
    //         data = Array.from(data);
            
    //         $.ajax({
    //             type:"GET",
    //             url:"../endpoints/createSymptomsTable.php",
    //             dataType:"json",
    //             data:{
    //                 "data": data,
    //             },
    //             error: (error) =>{
    //                 console.log(error);  
    //             },
    //         });
    //     },
    //     error: function(error){
    //         console.log(error);
    //     },
    // });
    
    $.ajax({
       type:"GET",
       url: "../endpoints/getAllSymptoms.php",
       dataType: "json",
       success: (data) => {
            data.forEach((elem) => suggestions.push(elem.name.toUpperCase()) );
            autocomplete(document.getElementById("symptomsInput"), suggestions);
       },
    });
    
    $("#symptomsSubmit").click(() =>{
       if( suggestions.includes( $("#symptomsInput").val().toUpperCase() ) ){
           createBubble($("#symptomsInput").val().toUpperCase());
       }
       else{
           console.log("nope");
       }
       storeSymptom();
    });
});
function storeSymptom() {
    let str = $("#symptomsInput").val().toUpperCase();
    console.log("stuff");
    $.ajax({
        type:"GET",
        url:"../diagnosis/api/storeUserSympt.php",
        data:{
            sy:str
        },
        success:function(data) {
            console.log("stored");
        }
    })

}
function createBubble(value){
    $("#bubbleContainer").append("<div class='bubble' id='"+value+"'>"+value+" <strong class='bRed'>X</strong></div>").click(() => {
        $("#"+value).remove();
    });
}

function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
      
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
      
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
    
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}
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
    
    let map = new google.maps.Map(document.getElementById('symptomsMap'), {
        center: {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)},
        zoom: 15
      });
    geocoder.geocode({'location': {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)}}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                console.log(results);
                let arrAddress = results;
                let city ='';
                let diag = "signs & symptoms";
                
                // iterate through address_component array
                $.each(arrAddress, function (i, address_component) {
                    if (address_component.types[0] == "locality"){
                        console.log(address_component.address_components[0].long_name);
                        city = address_component.address_components[0].long_name;
                    }
                    //return false; // break the loop   
                });
                console.log(city);
                console.log(diag);
                $.ajax({
                    type:"GET",
                    url:"../diagnosis/api/getDiagnosis.php",
                    dataType:"json",
                    data:{ "city": city, "diagnosis": diag },
                    success: function (data,status){
                        let sData = [];
                        for(let elem of data){
                            let isIn = false;
                            for(let selem of sData){
                                if(elem.diagnosis == selem.diagnosis && selem.facility == elem.facility){
                                    isIn = true;
                                }
                            }
                            if(!isIn){
                                sData.push(elem);
                            }
                        }
                        console.log(sData);
                        let i=0;
                        for(let elem of sData){
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
                                        '<strong>Address:</strong> ' + elem.address + '<br> <strong>Cost:</strong> $' + elem.cost/10 + '</div>');
                                      infowindow.open(map, this);
                                    });
                                } else {
                                    alert('Geocode was not successful for the following reason: ' + status);
                                }
                            });
                            i++;
                            if(i>=10){
                                console.log("broke");
                                break;
                            }
                        }
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