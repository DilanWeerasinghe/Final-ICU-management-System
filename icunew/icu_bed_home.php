<?php
    include ('header2.php');
?>
<style>
#im5{<img src="assets/img/check.jpg>}
</style>
 <div>
 
     <div id="im5"> 
            <br>
            <h1 style="color:black;text-align:center;" >ICU Beds Dashbord</h1>
            <div class="w3-row-padding">
                <div class="w3-third w3-hover-opacity">
                    <div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/index.png" alt="hospitals" class="w3-animate-fading" style="opacity:0.7;">
                            <br><br>
                            <div class="w3-container" style="color:black">
                                <h4>Search ICU Beds</h4>
                              <a href="search_bed.php"><button class="w3-button w3-blue">Search</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w3-third w3-hover-opacity">
                    <div class="w3-card" style="height:180px">
                        <div class="container">
                            <br>
                            <img src="assets/img/icons/update.png" alt="ambulance" class="w3-spin">
                            <br><br>
                            <div class="w3-container" style="color:black">
                                <h4>Update ICU Beds </h4>
                                <a href="icu_beds.php"><button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-blue">Update</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div style="padding-top:230px">
                     <a href="icubeds_map.php"> <button class="w3-button w3-blue">View Nearest ICU beds </button></a>
               </div>
              

               <br><br><br><br><br><br><br><br>
               <br><br><br><br><br><br><br><br>
            <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <form>
                        <h3>Select ICU Name</h3>
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
            <br><br><br><br><br>
            <button class="w3-btn w3-white w3-border">Search</button>
            <br><br><br><br><br><br><br><br>
            </form>
                                </div>
                        </div>
                </div>

















            &nbsp;

           
    <br><br><br><br><br><br><br><br>
            <?php
    include ('footer.php');?>
        
  


  
   
   
   
   
   
   
   
 