<?php
    include ('header2.php');
    $icu_id=$_SESSION['user_id'];
    if($_POST){
        $amb_id=$_POST["amb_id"];
        $availability = $_POST["availability"];
        $sql2 = "UPDATE ambulance SET availability=$availability WHERE icu_id=$icu_id AND ambulance_id=$amb_id";
        if ($conn->query($sql2) === TRUE) {?>
                <div class="w3-panel w3-green">
                    <h3><?php echo "Record updated successfully"; ?></h3>
                </div>
            
        <?php
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

?>
<div class="w3-container w3-light-gray  w3-twothird" style="height:500px;">
    <h2>Ambulance Availabilty</h2>
        <div class="w3-container">
            <?php
                
                $sql = "SELECT * FROM ambulance WHERE icu_id=$icu_id LIMIT 10";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                        <table class="w3-table">
                            <tr>
                                <th>Ambulance ID</th>
                                <th>Ambulance Number</th>
                                <th>Ambulance Type</th>
                                <th>Availability</th>
                            </tr>
                            <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                        <td><?php echo "AM-".$row["ambulance_id"]; ?></td>
                        <td><?php echo $row["registered_no"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td>
                        <?php $a = $row["availability"];                           
                        if($a==0){
                            echo "Available";
                        }else{
                            echo "Not-available";
                        }
                        ?>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </table>
                    <?php
                } else {
                    echo "0 results";
                }

            ?>
            <br>

        </div>
</div>
<div class="w3-container w3-light-gray w3-third" style="height:500px;">
    <h2>Ambulance Availabilty Change</h2>
    <br>
    <form action="icu_ambulance.php" method="POST">
    <label class="w3-text"><b>Select Ambulance ID</b></label> 
    <select name="amb_id" id="" class="w3-select">
    <option value="">--Select Ambulance ID--</option>  
    <?php
        $sql2 = "SELECT * FROM ambulance WHERE icu_id=$icu_id";
        $result2 = $conn->query($sql2);
        
        if ($result->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {?>
                <option value='<?php echo $row2["ambulance_id"]?>'><?php echo $row2["ambulance_id"]?></option>
            <?php
            }
        }else{
            echo "0 results"; 
        }
    ?>
        
        
                
        </select>   
        <br><br>  
        <label class="w3-text"><b>Select Availability</b></label>
        <select name="availability" id="" class="w3-select">
                <option value="">--Select Availability--</option>  
                <option value=0>Available</option>
                <option value=1>Not-available</option>
        </select> 
        <br><br>
        <button class="w3-btn w3-blue w3-right">Update</button> 

    </form>
<br><br><br><br><br><br>
    <div class="w3-container w3-right" style="width:75%">
        <a href="http://45.112.205.99/user/index.aspx?father_id=1a096309-f03d-463c-ad7b-9181ef22b075&login_id=1a096309-f03d-463c-ad7b-9181ef22b075&isDealer=false&r=1550643442501&logOut=&mds=2bcb64d6aa424b0c85f9e9340dea8c04" class="w3-btn w3-green"><i class="fas fa-location-arrow"></i>  Locate Ambulance</a>
    </div> 

</div>
 
<?php
    include ('footer.php');
?>
        
  


  
   
   
   
   
   
   
   
 