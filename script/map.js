
        if(navigator.geolocation){
            function hasPosition(position){
                var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                myOptions = {
                    zoom: 15,
                    center: point,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                },
                mapDiv = document.getElementById("mapDiv"),
                map = new google.maps.Map(mapDiv, myOptions),

                marker = new google.maps.Marker({
                    position: point,
                    map: map,

                    title: "Votre position actuelle est"
                });
            }
            navigator.geolocation.getCurrentPosition(hasPosition);
        }