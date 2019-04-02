<?php
    include ('header.php');
    include ('connection.php');

    $sql1 = "SELECT status,type FROM user WHERE user_name='$username' and password='$password'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    if ($count ==1) {
        if ($row['status'] ==1) {



            $_SESSION['username'] = $username;
            $_SESSION['type'] = $row['type'];



            if ($row['type'] == "admin") {

                $sql2 = "SELECT * FROM users WHERE user_name='$username'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

                $_SESSION['username'] = $row2['username'];
                $_SESSION['user_id'] = $row2['user_id'];

                header("location: home.php");
            } elseif ($row['type'] == "staff") {

                $sql3 = "SELECT * FROM users WHERE username='$username'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

                $_SESSION['username'] = $row3['username'];
                $_SESSION['user_id'] = $row3['user_id'];

                header("location: home.php");
            

            //echo "Loged iN";

            // header("location: index.php");
        } else {
           // echo "User not activated";
            echo'<div class="alert alert-danger" role="alert">
 User not activated!
</div>';
           // echo 'alert("I am an alert box!");';
        }
    } else {
        $error = "Your Login Name or Password is invalid";
        //echo "Wrong credentials";
         echo'<div class="alert alert-danger" role="alert">
 Wrong credentials!
</div>';
        
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