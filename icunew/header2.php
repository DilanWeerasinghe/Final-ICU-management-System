<?php
    require ('connection.php');
    session_start();
    //echo $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ICU Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            #im2 {
                background-image: url("assets/img/doctor.jpg");
                /*opacity: 0.50;*/
                filter: alpha(opacity=50); /* For IE8 and earlier */
            }
            #im3 {
                background-image: url("assets/img/login.jpg");
            }
            #im4{
                background-image: url("assets/img/map4.jpg");
            }
            #im5{
                background-image: url("assets/img/medi1.jpg");
            }
            #im6{
                background-image: url("assets/img/new1.jpg");
            }
            a:hover{
                text-decoration: none;
            }


            /* Always set the map height explicitly to define the size of the div
            * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }



        </style>
    <body>

        <nav class="w3-bar w3-blue w3-large">
            <div class="w3-container">
                    <a href="home.php" class="w3-bar-item w3-button w3-hover-indigo"><i class="fa fa-home"></i> ICU Management System</a>
                    <a href="#" class="w3-bar-item w3-button w3-hover-indigo"><i class="fas fa-book"></i> About Us</a>
                    <a href="#"  class="w3-bar-item w3-button w3-hover-indigo"><i class="glyphicon glyphicon-earphone"></i> Contact Us</a>
                    <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-indigo"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                    <a href="#" data-toggle="tooltip" title="Loggedin as-<?php echo $_SESSION["user_name"];?>" class="w3-bar-item w3-button w3-right w3-hover-indigo"><i class="fa fa-user"></i> <?php echo $_SESSION["user_name"];?></a>
                    
            </div>
        </nav>