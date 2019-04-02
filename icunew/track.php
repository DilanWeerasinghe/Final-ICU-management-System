<?php
    include ('header2.php');
    
?>

<?php
    $page = $_SERVER['PHP_SELF'];
    $sec = "10";
    ?> 
 
<html>
    
 
  <head>
  
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" herf="image.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
  <title>Locate Nearest Ambulance</title></head>
    
  <body class="Terrarium Moss">
      
  <br>
    <center><h1 class="bg-info text-white">Locate Nearest Ambulance</h1></center>
    <br>   
    <center><iframe width="1300" height="600" frameborder="1" style="border:1" 
             src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAK3iEdm0UrSN4e-wBTcAHan6gCojuRTY8
&q=Badulla Hospital " 
             allowfullscreen></iframe> </center>
<br>      
    
   
        
<?php
    include ('footer.php');
    
?>