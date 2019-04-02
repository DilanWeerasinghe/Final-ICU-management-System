<?php
    include ('header.php');
    include ('connection.php');

    if($_POST){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $e_password=sha1($password);
           
        $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$e_password."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION["user_id"]=0;
            while($row = $result->fetch_assoc()) {
                $_SESSION["user_id"]= $row["user_id"];
                $_SESSION["user_type"]=$row['type'];
                $_SESSION["user_name"] = $username;
            }
            if($_SESSION['user_type']=='admin'){
                
            
            header ('location:admin_home.php');
            }else{
                header ('location:home.php');
            }
           
        } else {?>
            <div class="alert alert-danger">
            <h3>Username or password not correct or Account activation Failed! </h3>
        </div><?php
        
        }
    }
?>
<div id="im3">
    <div style="width:1100px;padding-left:400px;padding-bottom:100px;padding-top:100px;" > 
        <br>
        <div class="w3-container w3-blue">
            <h2>Please Login</h2>
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