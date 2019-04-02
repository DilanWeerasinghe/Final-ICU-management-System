<?php
session_start();
//$userID=$_SESSION['userid'];
include('connection.php');
$queary = "SELECT * FROM `medicine` WHERE `hospital` = 'Badulla'";
$result = mysqli_query($con, $queary);
?>

<?php 

include ('header2.php');
?>

        <div class="container">
            <form class="text-center border border-light p-5">

                <p class="h4 mb-4">Enter Medicine Details</p>
                <input type="text" id="defaultContactFormmName" class="form-control mb-4" placeholder="Medicine Name">
                <input type="text" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Quntity">

                <button class="btn btn-info btn-block" type="submit" value="Submit">Submit</button>

            </form>
        </div>

      <?php 
include ('footer.php');
?>