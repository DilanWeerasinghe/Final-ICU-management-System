<?php
    include ('header2.php');
    $icu_id=$_SESSION['user_id'];
    //var_dump($_POST);

    if($_POST){
        $icuID = $_POST['icuUnit'];
        //echo $icuID;
        ?>
            <div class="w3-container w3-light-gray">
    <br>
        <h2>Search Organ Donation Availability</h2>
            <div class="w3-container">
                <?php
                    $sql = "SELECT * FROM organ_donation WHERE availability=1 AND icu_id=$icuID LIMIT 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {?>
                            <table class="w3-table">
                                <tr>
                                    
                                    <th>Organ Type</th>
                                    <th>Availability</th>
                                     <th>Get the route (from Badulla Provincial Hospital)</th>
                                   
                                </tr>
                                <?php
                        while($row = $result->fetch_assoc()) {
                            
                            
                            ?>
                         <tr>
                           
                            <td><?php echo $row["type"]; ?></td>
                            
                            <td>
                            <?php $a = $row["availability"];                           
                            if($a==1){
                                echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                            }else{
                                echo '<kbd style="background-color:red">Not-Availbale</kbd>';
                            }
                            ?>
                            </td>
                            
                            
                            
                             <td>
                            <?php $b = $row["icu_id"];                           
                            if($b==1){
                                 echo  "<a href='Organs_availabale_Bandarawela_hos.php?id={$row['icu_id']}'> {$row['address']} </a>";
                            }elseif($b==2){
                                 echo  "<a href='Organs_availabale_Monaragala_hos.php?id={$row['icu_id']}'> {$row['address']} </a>";
                            }elseif($b==3){
                                 echo  "<a href='Organs_availabale_Mahiyanganaya_hos.php?id={$row['icu_id']}'> {$row['address']} </a>";
                            }elseif($b==4){
                                 echo  "<a href='Organs_availabale_Welimada_hos.php?id={$row['icu_id']}'> {$row['address']} </a>";
                            }elseif($b==5){
                                 echo  "<a href='Organs_availabale_Badalkumbura_hos.php?id={$row['icu_id']}'> {$row['address']} </a>";
                            }
                            ?>
                            </td>
                            
                            
                            
                            
                         </tr>
                        <?php
                        }
                        ?>
                        </table>
                        <?php
                    } else {
                        echo "0 results";
                    }
                ?>
            <div>
    </div>
    <?php
    }
?>
<div class="w3-container w3-light-gray"  style="height:505px;">
    <br>
    <label class="w3-text"><b>Search Organ Availability </b></label> 
    <?php
        $sql2 = "SELECT icu_id,name FROM icu";
        $result2 = $conn->query($sql2);
    
    ?>
    <form action="search_organ.php" method="POST">
        <select name="icuUnit" id="" class="w3-select">
                <option value="">--Search availability of organs within hospitals--</option>  
                <?php
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {?>
                            <option value='<?php echo $row2["icu_id"]?>'><?php echo $row2["name"]?></option>
                        <?php
                        }
                    }else{
                        echo "0 results"; 
                    }
                ?>
        </select>
        <br><br>
        <button class="w3-btn w3-blue w3-right">Search</button> 
    </form>
    <br>
</div>
<?php
    include ('footer.php');
?>