                        <table class="w3-table">
                            <tr>
                                <th>Bed ID</th>
                                <th>Bed Type</th>
                                <th>Availability</th>
                                <th>Change Availability</th>
                            </tr>
                            <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                        <td><?php echo $row["bed_id"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td>
                        <?php $a = $row["availability"];                           
                        if($a==0){
                            echo "Available";
                        }else{
                            echo "Not-available";
                        }
                        ?>
                        </td>
                        <td>
                            <select class="w3-select" name="availability">
                                <?php
                                    if($a==0){?>
                                        <option value="0">Available</option>
                                        <option value="1">Not-Available</option>
                                   <?php }else{?>
                                        <option value="1">Not-Available</option>
                                        <option value="0">Available</option>
                                  <?php  }
                                ?>
                            </select> 
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </table>