   
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

                <p class="h4 mb-4">Organ Details</p>
                <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Donor Name">
                <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="NIC">
                <input type="text" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Address">
                <input type="text" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Contact Number">
                <input type="text" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Organ Type">
                <input type="text" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Blood Group">
                <button class="btn btn-info btn-block" type="submit" value="Submit">Submit</button>

            </form>
        </div>

     <?php 
include ('footer.php');
?>