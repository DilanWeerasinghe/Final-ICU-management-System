<?php
    include ('header2.php');
    $icu_id=$_SESSION['user_id'];
    if($_POST){
        $medicine_id=$_POST["medicine_id"];
        $quantity = $_POST["quantity"];
        $availability = $_POST["availability"];
        $sql2 = "UPDATE icu_medicine SET quantity=$quantity,availability=$availability WHERE icu_id=$icu_id AND medicine_id=$medicine_id";
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
    <h2>Medicine Availabilty</h2>
        <div class="w3-container">
            <?php
                
                $sql = "SELECT * FROM icu_medicine WHERE icu_id=$icu_id LIMIT 10";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                        <table class="w3-table">
                            <tr>
                                <th>Medicine ID</th>
                                <th>Medicine Name</th>
                                <th>Medicine Quantity</th>
                                <th>Medicine Type</th>
                                <th>Availability</th>
                            </tr>
                            <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                        <td><?php echo "MED-".$row["medicine_id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["medicine_type"]; ?></td>
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
    <h2>Medicine Availabilty Change</h2>
    <br>
    <form action="icu_medicine.php" method="POST">
    <label class="w3-text"><b>Select Medicine ID</b></label> 
   
    <select name="medicine_id" id="" class="w3-select">
    <option value="">--Select Medicine ID--</option>  
    <?php
        $sql2 = "SELECT * FROM icu_medicine WHERE icu_id=$icu_id";
        $result2 = $conn->query($sql2);
        
        if ($result->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {?>
                <option value='<?php echo $row2["medicine_id"]?>'><?php echo $row2["medicine_id"]?></option>
            <?php
            }
        }else{
            echo "0 results"; 
        }
    ?>
        
        
                
        </select>   
        <br><br>
        <label class="w3-text"><b>Enter Quantity</b></label>
    <input class="w3-input" name="quantity" type="text" placeholder="Enter quantity" id="validationCustom052" required>   
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
<br><br><br><br><br>
    

</div>
 
<?php
    include ('footer.php');
?>
        
  


  
   
   
   
   
   
   
   
 