<?php
include ('header2.php');
$userID=$_SESSION['user_id'];
    if($_POST){
        $doctorName = $_POST["doctorName"];
        $contactNo = $_POST["contactNo"];
        $speciality = $_POST["speciality"];

        $sql = "INSERT INTO doctor (doctor_name,speciality,icu_id, contact_no) VALUES ('".$doctorName."','".$speciality."','".$userID."','".$contactNo."')";
        if ($conn->query($sql) === TRUE) {?>
            <div class="w3-panel w3-green">
                <h3>Success! Doctor added successfully! </h3>
            </div>  
        <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
?>
    <div class="container" style="height:505px;">
        <form class="text-center border border-light p-5" action="insert.php" method="POST">

            <p class="h4 mb-4">Enter Doctor Details</p>
            <input type="text" name="doctorName" class="w3-input" placeholder="Doctor Name" required>
            <input type="text" name="contactNo" class="w3-input" placeholder="Contact Number"  required>
            <br>
            <label>Specialized Area</label>
            <select class="w3-select" name="speciality">
                <option value="" required>Choose Specialized Area</option>
                <option value="Cardiologist" selected>Cardiology</option>
                <option value="Plastic Surgeont">Plastic Surgeons</option>
                <option value="Anaesthetist">Anaesthetists</option>
                <option value="General Physician">General Physicians</option>
                <option value="Radiologist">Radiologists</option>
                <option value="Microbiologist">Microbiologist</option>
            </select>
            <br><br><br><br>
            <button class="btn btn-info btn-block" type="submit" value="Submit">Submit</button>
        </form>

    
    </div>

<?php 
    include ('footer.php');
?>