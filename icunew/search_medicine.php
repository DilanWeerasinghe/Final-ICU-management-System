<?php
    include ('header2.php');
    $icu_id=$_SESSION['user_id'];

    if($_POST){
        $icuID = $_POST['icuUnit'];
        ?>
            <div class="w3-container w3-light-gray">
    <br>
        <h2>Search Medicine Availability</h2>
            <div class="w3-container">
                <?php
                    $sql = "SELECT * FROM icu_medicine WHERE availability=0 AND icu_id=$icuID LIMIT 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {?>
                            <table class="w3-table">
                                <tr>
                                    <th>Medicine ID</th>
                                    <th>Medicine Name</th>
                                    <th>Medicine Type</th>
                                    <th>Availability</th>
                                </tr>
                                <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                            <td><?php echo $row["medicine_id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["medicine_type"]; ?></td>
                            <td>
                            <?php $a = $row["availability"];                           
                            if($a==0){
                                echo "Available";
                            }else{
                                echo "Not-available";
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
    <label class="w3-text"><b>Select Medicine ID</b></label> 
    <?php
        $sql2 = "SELECT icu_id,name FROM icu";
        $result2 = $conn->query($sql2);
    
    ?>
    <form action="search_medicine.php" method="POST">
        <select name="icuUnit" id="" class="w3-select">
                <option value="">--Select ICU Name--</option>  
                <?php
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {?>
                            <option value='<?php echo $row2["icu_id"]?>'><?php echo $row2["name"]?></option>
                           <a href='location_finder.php?id=$row["SC_ID"]'> <?php echo $row['SC_Address'];?> </a>
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