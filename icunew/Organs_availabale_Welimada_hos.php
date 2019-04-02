<html lang="en">
    <head>
        <title>ICU Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            #map{
                height: 500px;
                width: 1000px;
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
    border: 1px solid #999;
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
	    include("connection.php");
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

 $sql = "SELECT `hos_name`,`hos_lat`, `hos_long`, `hos_address`, `hos_city`, `hos_contact` FROM `hospital_welimada` WHERE `hos_ambulance`>0";
        $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$x = 0;
    while($row = mysqli_fetch_assoc($result)) {
		$locations[$x] = $row["hos_name"]."_".$row["hos_address"]."_".$row["hos_contact"];
        $x++;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Online ICU Mangement System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <div class="col-sm-3 text-left nav-pill-bg-danger">

                <ul class="nav nav-pills nav-stacked">
                    
                    <li ><a id="ambulance" href="#">Nearest Ambulance </a></li>
                   
					<li><a id="request" href="#"  style="visibility:hidden;"><i class="fa fa-ambulance" aria-hidden="true"></i></i>&nbsp; Request </a></li>
				
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
		var number = "NaN";
		
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 6.99181, lng: 81.0524}  
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          var locations = <?php echo json_encode($locations); ?>;
		  var latlang = [];
          if(locations.length > 0 ){
		  for (i = 0; i < locations.length; i++) {
			console.log(locations[i].split("_")[1]);
			latlang[i] = locations[i].split("_")[1];
		  
			
		  }

		   calculateDistance(distanceService,latlang,index);
		   var hospital_loc = locations[index].split("_")[1];
		   calculateAndDisplayRoute(directionsService, directionsDisplay,hospital_loc);
		   number = locations[index].split("_")[2]
		   console.log(number);
		   document.getElementById('request').style.visibility='visible';
		  }else{
			  document.getElementById('floating-panel').innerHTML ("There are no available ambulances at the moment");
			  document.getElementById('floating-panel').style.visibility='visible'
		  }
        };
		
		var onClickSendSMS = function() {
			console.log(number);
			var text = "A Request logged for an Ambulance from Badulla Hospital , Thanks ";
			var xmlHttp = new XMLHttpRequest();
			
			var theUrl = "http://www.textit.biz/sendmsg?id=0719022915&pw=1916&to="+number+"&text="+text;
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request

	xmlHttp.setRequestHeader('Access-Control-Allow-Headers', '*');
    xmlHttp.send( null );
    return xmlHttp.responseText;
	
		};
        document.getElementById('ambulance').addEventListener('click', onChangeHandler);
		document.getElementById('request').addEventListener('click', onClickSendSMS);
        
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
            outputDiv.innerHTML = 'Nearest Availabale organs @ '+latlang[index] +
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


        <footer class="container-fluid text-center footer">
            <p>Copyright © 2018 </p>
        </footer>
    </body>
</html>