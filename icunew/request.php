<?php
require ('header2.php');
date_default_timezone_set("Asia/Colombo");

?>
  <br />
  <div class="container">
   <div class="row">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <h3 align="center">Send A Request </h3>
     <br />
     
     <form method="post" action="request.php">
     <div class="form-group">
  <?php
  $query="SELECT * FROM `icu`";
  $result=mysqli_query($conn,$query);
  //  $row=mysqli_num_rows($result);
    //echo $row;
  ?>
  <select class="form-control" id="sel1" name="icuID">
    <option >Select Hospital</option>
    <?php 
    while($row=mysqli_fetch_array($result)){
    ?>
    <option value="<?php echo $row['icu_id']?>"><?php echo $row['name'];?></option>
    <?php 
    }
    ?>
  </select>
</div> 
      
      
      <div class="form-group">
       <label>Enter Message</label>
       <textarea name="message" class="form-control" placeholder="Enter Message" required></textarea>
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="submit" value="Submit" class="btn btn-info" />
      </div>
     </form>
     <?php
     if(isset($_POST['submit'])){
      error_reporting(0);
        $icuID=$_POST['icuID'];
        $msg=$_POST['message'];

        $query1="SELECT * FROM `icu` WHERE `icu_id` = $icuID ";
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_assoc($result1);
        $emai1=$row1['email'];
        //echo $emai1;

       // $to = "somebody@example.com";
        $subject = "My subject";
       // $txt = "Hello world!";
        $headers = "From: danushkastconway@gmail.com" . "\r\n" .
        "CC: danushkastconway@gmail.com";

        mail($emai1,$subject,$msg,$headers);
         $date=date("Y-m-d");
         $time=date("h:i:s");
        $sql4="INSERT INTO `message` (`message_id`, `sender_id`, `reciever_id`, `date`, `time`, `content`) VALUES (NULL, '".$_SESSION["user_id"]."', '$icuID', '$date', '$time', '$msg')";
        if(mysqli_query($conn,$sql4)){
            echo 'Message Sent';
        }
    }
     ?>
    </div>
   </div>
  </div>
 </body>
</html>