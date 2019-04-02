<?php
    include ('header2.php');
    
?>

 <h2><span class="">User Activation</span></h2>

<?php
$username = "root";
$password = "";
$hostname = "localhost";
$db = "icu";

//connection to the database
$conn = mysqli_connect($hostname, $username, $password, $db)
        or die("Unable to connect to MySQL");

//execute the SQL query and return records



if (!empty($_GET['username'])) {

    // check if the username has been set    



    $result = mysqli_query($conn, "UPDATE users SET status='1' WHERE username='$_GET[username]'");
    //header("Location: UserActivate.php");
    echo $result;
    echo mysqli_error($conn);
}
if (!empty($_GET['username2'])) {

    // check if the username has been set    



    $result = mysqli_query($conn, "UPDATE users SET status='0' WHERE username='$_GET[username2]'");
    //header("Location: UserActivate.php");
   // echo $result;
    echo mysqli_error($conn);
}

$result = mysqli_query($conn, "SELECT * FROM users  ");


echo'<div class="container">';
echo'<div class="jumbotron">';

echo'<table class="table">';
echo' <thead>';
echo'  <tr>';
echo'  <th>User Name</th>';
echo'   <th>Password</th>';
echo'   <th>Type</th>';

echo'</tr>';
echo'</thead>';
echo' <tbody>';
while ($row = mysqli_fetch_array($result)) {
    echo'  <tr>';
    echo"    <td>$row[username]</td><td>$row[password]</td><td>$row[type]</td><td>";
   if($row['status']=='0'){
   echo "<a href='activation.php?username=" . $row['username'] . "' <button type='button' class='btn btn-success'>Activate</button></td><td>";
   }else{
    echo "<a href='activation.php?username2=" . $row['username'] . "' <button type='button' class='btn btn-danger'>De-Activate</button></td><td>";
   } 
   echo' </tr> ';
}
echo' </tbody>';
echo' </table>';

echo'</div>';

mysqli_close($conn);
?> 




























<?php
    include ('footer.php');
?>