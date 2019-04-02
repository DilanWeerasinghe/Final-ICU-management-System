<html lang="en">
    <head>
        <title>Ambulances</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            #map{
                height: 650px;
                width: 1010px;
            }
            .navbar {

                margin-bottom: 0;
                border-radius: 0;

            }

            /* Add a gray background color and some padding to the footer */
            .footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #333;
                color: white;
                text-align: center;


                height:60px;
            }

            .carousel-inner img {
                width: 100%; /* Set width to 100% */
                margin: auto;
                min-height:200px;
            }

            /* Hide the carousel text when the screen is less than 600 pixels wide */
            @media (max-width: 600px) {
                .carousel-caption {
                    display: none; 
                }
            }
			
			#floating-panel {
				position: absolute;
    top: 10%;
    left: 50%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    order: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 10px;
    padding-left: 10px;
    visibility: hidden;

}
        </style>
    </head>
    <body>
       <?php
	    
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "icu";
$locations = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 $sql = "SELECT `hos_name`,`hos_lat`, `hos_long`, `hos_address`, `hos_city`, `hos_contact` FROM `hospital_ambulance` WHERE `hos_ambulance`>0";
        $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$x = 0;
    while($row = mysqli_fetch_assoc($result)) {
		$locations[$x] = $row["hos_name"]."_".$row["hos_address"];
        $x++;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 


        

        <div>
            <div class="col-sm-3 text-left nav-pill-bg-danger">

                <ul class="nav nav-pills nav-stacked">
                    
                    <li><a id="ambulance" href="#"><h3>View Nearest Ambulance</h3>  </a></li>
                    
	
				
                </ul>
            </div>
        </div>
		<div id="floating-panel">Hi</div>
        <div id="map"></div>
        <script>
        function initMap() {
        var directionsService = new google.maps.DirectionsService;
		var distanceService = new google.maps.DistanceMatrixService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
		var index = 0;
		
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
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
        //  destination:  {lat: 6.9707538, lng: 81.0327561},
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



        <br>


      
    </body>
</html>