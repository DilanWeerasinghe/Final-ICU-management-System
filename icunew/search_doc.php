<?php
    include ('header2.php');
    $icu_id=$_SESSION['user_id'];

    if($_POST){
        $icuID = $_POST['icuUnit'];
        ?>
            <div class="w3-container w3-light-gray">
    <br>
        <h2>Search Doctors Availabilty</h2>
            <div class="w3-container">
                <?php
                    $sql = "SELECT * FROM doctor WHERE availability=0 AND icu_id=$icuID LIMIT 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {?>
                            <table class="w3-table">
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Doctor Name</th>
                                    <th>Speciality</th>
                                    <th>Availability</th>
                                </tr>
                                <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                            <td><?php echo $row["doctor_id"]; ?></td>
                            <td><?php echo $row["doctor_name"]; ?></td>
                            <td><?php echo $row["speciality"]; ?></td>
                            <td>
                            <?php $a = $row["availability"];                           
                            if($a==0){
                                echo '<kbd style="background-color:#1BA70B">Available</kbd>';
                            }else{
                                echo '<kbd style="background-color:red">Not-Availbale</kbd>';
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
    <label class="w3-text"><b>Search Doctor Availability </b></label> 
    <?php
        $sql2 = "SELECT icu_id,name FROM icu";
        $result2 = $conn->query($sql2);
    
    ?>
    <form action="search_doc.php" method="POST">
        <select name="icuUnit" id="" class="w3-select">
                <option value="">--Select ICU--</option>  
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