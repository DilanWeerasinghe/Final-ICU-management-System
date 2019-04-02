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
    <body>



        <table class="table table-striped table-bordered" id="example" border="1" width="75%">
            <thead class="thead-dark">
                <tr class="w3-light-grey">
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Availbality</th>
                     <th>Upadate</th>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?> 
                <tr>
                    <td><?php echo $row["m_name"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>

                    <td><?php
                        if ($row["availability"] == '1') {
                            echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                        } else {
                            echo '<kbd style="background-color:red">Not-Availbale</kbd>';
                        }
                        ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="medID" value="<?php echo $row["id"]; ?>">
                            <input type="hidden" name="medavb" value="<?php echo $row["availability"]; ?>">
                            <input type="submit" name="submit" value="Change Availability">
                        </form>

                    </td>

                </tr>
            <?php } ?>


            <?php
            if (isset($_POST['submit'])) {
                $medID = $_POST['medID'];
                $mavb = $_POST['medavb'];
                if ($mavb == 1) {
                    $query2 = "UPDATE `medicine` SET `availability` = '0' WHERE `medicine`.`id` = $medID;";
                } else {
                    $query2 = "UPDATE `medicine` SET `availability` = '1' WHERE `medicine`.`id` = $medID;";
                }
                if (mysqli_query($con, $query2)) {
                    header("location:medavb.php");
                }
            }
            ?>
        </table>
  <?php 
include ('footer.php');
?>
