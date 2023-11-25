<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

require_once 'sitterdelete/sitterdelete_model.inc.php';
require_once 'sitterdelete/sitterdelete_contr.inc.php';
?>


<?php

?>

    <div>
        <?php
        $user_id = $_SESSION["user_id"];
        ?>
            <table style="width:100%">
                <tr>
                    <th>Booking ID</th>
                    <th>Owner</th>
                    <th>Sitter</th>
                    <th>Pet</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Price</th>
                </tr>

                <!-- <tr>
                    <?php $prefs = get_sitter_prefs($pdo, $user_id); ?>
                    <td><?php echo $prefs["zipcode"]; ?></td>
                    <td><?php echo $prefs["rate"]; ?></td>
                    <td><?php echo $prefs["available_days"]; ?></td>
                    <td><?php echo $prefs["available_times"]; ?></td>
                    <td><?php echo $prefs["size_pref"]; ?></td>
                    <td><?php echo $prefs["type_pref"]; ?></td>
                </tr> -->
            </table>

 
                
    </div>
