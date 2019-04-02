<?php
    include ('header2.php')
    

    if($_POST){

        $name = $_POST['user2'];
        $adminpassword = $_POST['admin_password'];
           
        $sql2 = "SELECT admin_id,name,admin_password FROM admin WHERE name='".$name."' AND admin_password='".$adminpassword."'";
        $result2 = $conn->query2($sql2);

        if ($result2->num_rows > 0) {
            session_start();
            $_SESSION["admin_id"]=0;
            while($row2 = $result2->fetch_assoc()) {
                $_SESSION["admin_id"]= $row2["admin_id"];
            }
            
            $_SESSION["user2"] = $name;
            header ('location:admin_home.php');
        } else {?>
            <div class="alert alert-danger">
            <h3>User Not Registered yet! </h3>
        </div><?php
        }
    }
?>
<div id="im3">
    <div style="width:1100px;padding-left:400px;padding-bottom:100px;padding-top:100px;" > 
        <br>
        <div class="w3-container w3-blue">
            <h2>Admin Login</h2>
        </div>
        <form class="w3-container w3-white w3" style="opacity: 0.8;filter: alpha(opacity=80);padding-bottom:20px;" action="login.php" method="POST">
        <br>
            <label>Username</label>
            <input class="w3-input" name="username" type="text" placeholder="Enter username">
            <label>Password</label>
            <input class="w3-input" name="password" type="password" placeholder="Enter password">
            <br>
            <button class="w3-btn w3-blue">Login</button>            
        </form> 
    </div>
</div>
<?php
    include ('footer.php');
?>