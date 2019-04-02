<?php
    include ('header2.php');
    
?>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
            <img src="assets/img/arms.jpg" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Caring</h3>
                    <p>We we will be with you when you need the care most!</p>
                </div>
            </div>

            <div class="item">
            <img src="assets/img/steth.jpg" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Protection</h3>
                    <p>We will protect you every moment!</p>
                </div>
            </div>

            <div class="item">
            <img src="assets/img/hand.jpg" alt="New York">
                <div class="carousel-caption">
                    <h3>Family</h3>
                    <p>We will be as a family with you!</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <div id="im2">
            <br>
            <div class="w3-row-padding">
                <div class="w3-third w3-hover-opacity">
                <a href="icu_bed_home.php"><div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/hospital.png" alt="hospitals">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>ICU Beds</h4>
                                <p>Select the most suitable area in island.</p>
                            </div>
                        </div></a>
                    </div>
                </div>

                <div class="w3-third w3-hover-opacity">
                    <a href="ambulance_home.php"><div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/ambulance.png" alt="ambulance">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>Ambulance Info</h4>
                                <p>About details every ambulance in your hospital.</p>
                            </div>
                        </div></a>
                    </div>
                </div>

                <div class="w3-third w3-hover-opacity">
                <a href="medicine_home.php"><div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/blood.png" alt="blood">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>Medicine</h4>
                                <p>Checkout with available medicine.</p>
                            </div>
                        </div></a>
                    </div>
                </div>
            <div>
            
            &nbsp;

            <div class="w3-row-padding">
                <div class="w3-third w3-hover-opacity">
                <a href="organ_home.php"> <div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/medicine.png" alt="emergency-call">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>Organ Donation</h4>
                                <p>Best suitable things giving.</p>
                            </div>
                        </div></a>
                    </div>
                </div>

                <div class="w3-third w3-hover-opacity">
                <a href="sp_doc_home.php"><div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/nuclear.png" alt="nuclear">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>Specialized Doctors</h4>
                                <p>Update the everywhere doctors attend in island wide. </p>
                            </div>
                        </div></a>
                    </div>
                </div>

                <div class="w3-third w3-hover-opacity">
                <a href="request.php"><div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/emergency-call.png" alt="medicine">
                            <br><br>
                            <div class="w3-container" style="color:white">
                                <h4>Request Message</h4>
                                <p>Now you request resources what you need.</p>
                            </div>
                        </div></a>
                    </div>
                </div>
            <div>
        </div>
    </div>
    </body>
    <?php
    include ('footer.php');
?>
</html>