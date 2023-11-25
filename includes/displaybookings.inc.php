<?php
require_once 'config_session.inc.php';
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

                <?php 
                
                require_once 'includes/booking/booking_view.inc.php';    
                $bookings = find_user_bookings();
                
                foreach ($bookings as $booking) { ?>
                    <tr>
                        <td><?php echo $booking["service_id"]; ?></td>
                        <td><?php echo $booking["owner_name"]; ?></td>
                        <td><?php echo $booking["sitter_name"]; ?></td>
                        <td><?php echo $booking["pet_name"]; ?></td>
                        <td><?php echo $booking["service_date"]; ?></td>
                        <td><?php echo $booking["start_time"]; ?></td>
                        <td><?php echo $booking["end_time"]; ?></td>
                        <td><?php echo $booking["price"]; ?></td>
                        
                    </tr>
                    

                <?php }?>
                
            </table>

 
                
    </div>
