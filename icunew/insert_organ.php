<?php
include ('header2.php');
$userID=$_SESSION['user_id'];
    if($_POST){
        $dname = $_POST["dname"];
        $type = $_POST["type"];
        $nic = $_POST["nic"];
        $address = $_POST["address"];
        $bgrp = $_POST["bgrp"];

        $sql = "INSERT INTO organ_donation (dname,type, nic,address,bgrp) VALUES ('".$dname."','".$type."','".$nic."','". $address."','". $bgrp."')";
        if ($conn->query($sql) === TRUE) {?>
            <div class="w3-panel w3-green">
                <h3>Success! Donor Details added successfully! </h3>
            </div>  
        <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
?>
    <div class="container" style="height:505px;">
        <form class="text-center border border-light p-5" action="insert_organ.php" method="POST">

            <p class="h4 mb-4">Enter Donor Details</p>
            <input type="text" name="dname" class="w3-input" placeholder="Donor Name" id="validationCustom052" required>
           
            <br>
            <label>Organ Type</label>
            <select class="w3-select" name="type" placeholder="Type" id="validationCustom052" required>
                
                <option value="Kidney" >Kidney</option>
                <option value="Liver">Liver</option>
                <option value="Eye">Eye</option>
                <option value="heart">Heart</option>
                
            </select>
            <br>
            <input type="text" name="nic" class="w3-input" placeholder="NIC Number" id="validationCustom052" required >
            <br>
            <input type="text" name="address" class="w3-input" placeholder="Enter Address" id="validationCustom052" required>
            <br>
            <label>Blood Group</label>
            <select class="w3-select" name="bgrp" placeholder="Blood Group" id="validationCustom052" required>
            
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                
            </select>
            <br><br><br><br>
            <button class="btn btn-info btn-block" type="submit" value="Submit">Submit</button>
        </form>

    
    </div>

<?php 
    include ('footer.php');
?>