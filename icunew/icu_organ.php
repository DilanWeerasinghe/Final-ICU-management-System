<?php
include ('header2.php');
//session_start();
//$userID=$_SESSION['userid'];
include('connection.php');

?>
<?php 
                if (isset($_POST['submit'])) {
                    $organid = $_POST['organ_id'];
                    $avb = $_POST['avb'];
                    if ($avb == 1) {
                        $query2="UPDATE organ_donation SET availability=0 WHERE organ_id = $organid";
                    } else {
                        $query2="UPDATE organ_donation SET availability=1 WHERE organ_id = $organid";
                    }
                    if (mysqli_query($conn, $query2)) {
                        header("location:icu_organ.php");
                    }
                }

?>
<div class="w3-container" style="height:505px;">
<br><br><br><br>
<table class="table table-striped table-bordered" id="example" border="1">
                <thead class="thead-dark">
                    <tr class="w3-light-grey">
                        <th>Organ ID</th>
                        <th>Organ Type</th>
                        
                        <th>Availability</th>
                        <th>Update</th>

                    </tr>
                </thead>

                <?php
                $queary = "SELECT * FROM organ_donation";
                $result = mysqli_query($conn, $queary);
                while ($row = mysqli_fetch_array($result)) {
                    ?> 
                    <tr>
                        <td><?php echo $row["organ_id"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        


                        <td><?php
                            if ($row["availability"] == 0) {
                                echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                            } else {
                                echo '<kbd style="background-color:red">Not-Availbale</kbd>';
                            }
                            ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="organ_id" value="<?php echo $row["organ_id"]; ?>">
                                <input type="hidden" name="availability" value="<?php echo $row["availability"]; ?>">
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
