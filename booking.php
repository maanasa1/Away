<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/booking/booking_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away.com</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/booking.css">
</head>


<header>
    <div class="Title">
        <h1>AWAY</h1>
    </div>

    <div class="topnav">
        <a href="./index.php">Home</a>
        <a href="./customer.php">For Customers</a>
        <a href="./sitter.php">For Sitters</a>
        <a href="./login.php">Log In</a>
    </div>
</header>


<body class="homepage">
    
    <div class="text-content two-cols">
        <div>
            <h3>Search for Sitters</h3>
        </div>
        <div>
            Search stuff here
            
        </div>
    </div>

    <div class="text-content two-cols">
        <div>
            <h3>Book a Sitter</h3>
        </div>
        <div>
            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <a href="./login.php">
                    <button class="btn">Log In to Book a Sitter</button>
                </a>

            <?php 
            } else { ?>
            <div class="booking-form">                
                <form id="form" action="includes/booking/booking.inc.php" method="post">

                    <label for="sitter" class="label">Sitter ID:</label><br>
                    <input id="sitter" type="number" class="input" name="sitter_id" required>

                    <br>

                    <label for="pet" class="label">Pet:</label><br>
                    <select id="pet" class="multiselect" name="pet_name">
                        <?php pet_select(); ?>
                    </select>
                        
                    <br>

                    <label for="service_date" class="label">Day:</label><br>
                    <input id="service_date" type="date" class="input" name="service_date" required>
                    
                    <br>


                    <label for="start-time" class="label">Start Time:</label><br>
                    <input id="start-time" type="time" class="input" name="start_time" required>

                    <br>

                    <label for="end-time" class="label">End Time:</label><br>
                    <input id="end-time" type="time" class="input" name="end_time" required>

                    <br>
                    <br>

                    <input id="submit" type="submit" class="button" value="Create a Booking">

                </form>

                <?php check_booking_errors() ?>

            </div>

            <?php }?>


        </div>
    </div>

    <div class="text-content two-cols">
        <div>
            <h3>Want to view your bookings?</h3>
        </div>
        <div>
            <a href="./login.php">
                <button class="btn">Go to your Account</button>
            </a>
        </div>
    </div>
    


</body>
</html>