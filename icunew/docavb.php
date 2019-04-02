<?php
include ('header2.php');
//session_start();
//$userID=$_SESSION['userid'];
include('connection.php');

?>
<?php 
                if (isset($_POST['submit'])) {
                    $docID = $_POST['docID'];
                    $avb = $_POST['avb'];
                    if ($avb == 1) {
                        $query2="UPDATE doctor SET availability=0 WHERE doctor_id = $docID";
                    } else {
                        $query2="UPDATE doctor SET availability=1 WHERE doctor_id = $docID";
                    }
                    if (mysqli_query($conn, $query2)) {
                        header("location:docavb.php");
                    }
                }

?>
<div class="w3-container" style="height:505px;">
<br><br><br><br>
<table class="table table-striped table-bordered" id="example" border="1">
                <thead class="thead-dark">
                    <tr class="w3-light-grey">
                        <th>Name</th>
                        <th>Specialized Area</th>
                        <th>Contact Number</th>
                        <th>Availability</th>
                        <th>Update</th>

                    </tr>
                </thead>

                <?php
                $queary = "SELECT * FROM doctor";
                $result = mysqli_query($conn, $queary);
                while ($row = mysqli_fetch_array($result)) {
                    ?> 
                    <tr>
                        <td><?php echo $row["doctor_name"]; ?></td>
                        <td><?php echo $row["speciality"]; ?></td>
                        <td><?php echo $row["contact_no"]; ?></td>


                        <td><?php
                            if ($row["availability"] == 1) {
                                echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                            } else {
                                echo '<kbd style="background-color:red">Not-Availbale</kbd>';
                            }
                            ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="docID" value="<?php echo $row["doctor_id"]; ?>">
                                <input type="hidden" name="avb" value="<?php echo $row["availability"]; ?>">
                                <input type="submit" name="submit" value="Change Availability">
                            </form>

                        </td>

                    </tr>
                <?php } ?>


                <?php

                ?>
            </table>
</div>
    
<?php 

include ('footer.php');
?>
