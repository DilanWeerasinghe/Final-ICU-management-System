<?php
session_start();
//$userID=$_SESSION['userid'];
include('connection.php');
$queary = "SELECT * FROM `organ_donation` WHERE `icu_id` = '1'";
$result = mysqli_query($con, $queary);
?>
<?php 

include ('header2.php');
?>
    


        <table class="table table-striped table-bordered" id="example" border="1" width="75%">
            <thead class="thead-dark">
                <tr class="w3-light-grey">
                    <th>Donor Name</th>
                    <th>Organ Type</th>
                    <th>Availability</th>
                    <th>Upadate</th>

                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?> 
                <tr>
                    <td><?php echo $row["dname"]; ?></td>
                    <td><?php echo $row["type"]; ?></td>



                    <td><?php
                        if ($row["availability"] == '1') {
                            echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                        } else {
                            echo '<kbd style="background-color:red">Not-Availbale</kbd>';
                        }
                        ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="oID" value="<?php echo $row["id"]; ?>">
                            <input type="hidden" name="oavb" value="<?php echo $row["availability"]; ?>">
                            <input type="submit" name="submit" value="Change Availability">
                        </form>

                    </td>

                </tr>
            <?php } ?>


            <?php
            if (isset($_POST['submit'])) {
                $oID = $_POST['oID'];
                $oavb = $_POST['oavb'];
                if ($oavb == 1) {
                    $query2 = "UPDATE `organ` SET `availability` = '0' WHERE `organ`.`id` = $oID;";
                } else {
                    $query2 = "UPDATE `organ` SET `availability` = '1' WHERE `organ`.`id` = $oID;";
                }
                if (mysqli_query($con, $query2)) {
                    header("location:orgavb.php");
                }
            }
            ?>
        </table>
        <?php 

include ('footer.php');
?>

