<?php
include ('header2.php');
$userID=$_SESSION['user_id'];
    if($_POST){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $en_password=sha1($password);
        $type = $_POST["type"];

        $sql = "INSERT INTO users (username,password,type) VALUES ('".$username."','".$en_password."','".$type."')";
        if ($conn->query($sql) === TRUE) {?>
            <div class="w3-panel w3-green">
                <h3>Success! Account open successfully! </h3>
            </div>  
        <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
?>
    <div class="container" style="height:505px;">
        <form class="text-center border border-light p-5" action="create_account.php" method="POST">

            <p class="h4 mb-4">Enter Account Details</p>
            <input type="text" name="username" class="w3-input" placeholder="User Name" required>
            <input type="text" name="password" class="w3-input" placeholder="Enter Password" required>
            <br>
            <label>User Type</label>
            <select class="w3-select" name="type">
                <option value="" disabled>Choose User Type</option>
                <option value="Hos_admin" selected>Hospital Admin</option>
               
            </select>
            <br><br><br><br>
            <button class="btn btn-info btn-block" type="submit" value="Submit">Open Account</button>
        </form>

    
    </div>

<?php 
    include ('footer.php');
?>