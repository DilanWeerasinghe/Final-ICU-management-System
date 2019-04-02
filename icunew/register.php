<?php
    include ('header.php');
    include ('connection.php');
   
    if($_POST){

        $username = $_POST['username'];
        $type = $_POST['type'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        $icu = $_POST['icu'];


        if($password==$rePassword){
            $sql = "INSERT INTO users(username, password, type,icu_id) VALUES ('".$username."','".$password."','".$type."',$icu)";

            

            if ($conn->query($sql) === TRUE) {?>
                <div class="w3-panel w3-green">
                    <h3>Success! User added successfully! </h3>
                </div>  
                <?php 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Password mismatch";
        }
    }
?>
<div id="im3">
    <div style="width:1300px;padding-left:200px;padding-bottom:100px;padding-top:50px;" > 
        <br>
        <div class="w3-container w3-blue">
            <h2>Please Register</h2>
        </div>
        <form class="w3-container w3-white w3" style="opacity: 0.8;filter: alpha(opacity=80);padding-bottom:20px;" action="register.php" method="POST">
        <br>
            <label>Username</label>
            <input class="w3-input" name="username" type="text" placeholder="Enter username">

            <label>Password</label>
            <input class="w3-input" name="password" type="password" placeholder="Enter password">
            
            <label>Confirm Password</label>
            <input class="w3-input" name="rePassword" type="Password" placeholder="Re-enter password">

            <label>User Type</label>
            <select class="w3-select" name="type">
            <option value="">--Select User Type--</option>
            <option value="admin">Hospital Admin</option>
            <option value="staff">Hospital Staff</option>
            </select>
            
            <label>Select ICU</label>
            <select class="w3-select" name="icu">
                <option value="">--Select ICU Unit--</option>
                <?php
                    $sql2 = "SELECT icu_id,name FROM icu";
                    echo $sql2;
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                            echo '<option value="'.$row2["icu_id"].'">'.$row2["name"].'</option>';
                        }
                    } else {
                        echo "0 results";
                    }        
                    $conn->close();
                ?>
            </select>

            <br><br>
            <button class="w3-btn w3-blue">Login</button>
            <button class="w3-btn w3-red">Reset</button>

        </form> 
    </div>
</div>
<?php
    include ('footer.php');
?>