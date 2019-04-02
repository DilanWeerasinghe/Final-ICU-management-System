<?php
    include ('header2.php');
    
?>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            #map{
                height: 500px;
                width: 1366px;
            }			
        </style>
        <div>
        <?php
        $sql = "SELECT * FROM icu";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $x = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $locations[$x] = $row["name"]."_".$row["location"];
                $x++;
            }
        } else {
            echo "0 results";
        }

      //  mysqli_close($conn);
?> 
		
        <div id="map"></div>
        <script>
        function initMap() {
        var directionsService = new google.maps.DirectionsService;
		var distanceService = new google.maps.DistanceMatrixService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
		var index = 0;
		
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: {lat: 6.99181, lng: 81.0524}  
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          var locations = <?php echo json_encode($locations); ?>;
		  var latlang = [];
          
		  for (i = 0; i < locations.length; i++) {
			console.log(locations[i].split("_")[1]);
			latlang[i] = locations[i].split("_")[1];
		  
			
		  }

		   calculateDistance(distanceService,latlang,index);
		   var hospital_loc = locations[index].split("_")[1];
		   calculateAndDisplayRoute(directionsService, directionsDisplay,hospital_loc)
        };
        document.getElementById('ambulance').addEventListener('click', onChangeHandler);
        
      }
	  
	  function calculateDistance(distanceService,latlang,index) {
        distanceService.getDistanceMatrix({
          origins:  [{lat: 6.99181, lng: 81.0524}] ,
          destination:  {lat: 6.9707538, lng: 81.0327561},
		  destinations: latlang,
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status === 'OK') {
			var outputDiv = document.getElementById('floating-panel');
			var destinationList = response.destinationAddresses;
			var results = response.rows[0].elements;
			
			var distance = 0;
			for (i = 0; i < results.length; i++) {
				
				if(i==0){
					distance = results[0].distance.value;
				}
				
				if( results[i].distance.value < distance){
					index = i ;
				}
				
			}
            outputDiv.innerHTML = 'Nearest Ambulance @ '+latlang[index] +
                    ': ' + results[index].distance.text + ' in ' +
                    results[index].duration.text + '<br>';
			outputDiv.style.visibility='visible'
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay,hospital_loc) {
        directionsService.route({
          origin:  {lat: 6.99181, lng: 81.0524} ,
        //  destination:  {lat: 6.9707538, lng: 81.0327561},
		destination:  hospital_loc,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvCIAo8iwLLKLFp6vdZ2X5MBiDyY4LOAo&callback=initMap"
        type="text/javascript"></script>
        </div>
    </body>
    <?php
    include ('footer.php');
?>
</html>