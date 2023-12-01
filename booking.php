<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/booking/booking_view.inc.php';

$availableSitters = [];


if (isset($_SESSION['availableSitters'])) {
    $availableSitters = $_SESSION['availableSitters'];

    unset($_SESSION['availableSitters']);
}
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
            <h3>Discover sitters near you:</h3>
        </div>
        <div>
            <form class ="form" action="includes/findsitter/sitterfind.inc.php" method="post">

                <div class="zip-container">
                    <label for="zipcode" class="label">Zipcode:</label><br>
                    <input id="zipcode" type="number" class="input" name="zipcode" required>
                </div>

                <div class="availability-container">
                    <div class="availability-dropdown">
                        <label for="dropdown" class="label">Days needed:</label><br>
                            <select id="days" class="multiselect" name="day" required>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select><br>
                        </div>
        
                        <div class="availability-dropdown">
                            <label for="dropdown" class="label">Time of day:</label><br>
                            <select id="time" class="multiselect" name="time" required>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                            </select><br>
                        </div>
                    </div>
                
        
                <div class="size-container">
                    <label for="size" class="label">The size of my pet is:</label><br>
                    <span id="size">
                        <label for="small" class="check-text">Small (0-15 lbs)</label>
                        <input type="radio" id="small" name="size_pref" value="Small">

                        <label for="med" class="check-text">Medium (16-40 lbs)</label>
                        <input type="radio" id="med" name="size_pref" value="Medium">

                        <label for="large" class="check-text">Large (40+ lbs)</label>
                        <input type="radio" id="large" name="size_pref" value="Large">
                    </span>
                </div>
        

                <div class="type-container">
                    <label for="type" class="label">I have a:</label><br>
                    <span id="type">
                        <label for="dog" class="check-text">Dog</label>
                        <input type="radio" id="dog" name="type_pref" value="Dog">

                        <label for="cat" class="check-text">Cat</label>
                        <input type="radio" id="cat" name="type_pref" value="Cat"> <br>

                        <label for="bird" class="check-text">Bird</label>
                        <input type="radio" id="bird" name="type_pref" value="Bird">

                        <label for="sa" class="check-text">Small animal</label>
                        <input type="radio" id="sa" name="type_pref" value="Small animal">

                        <label for="liz" class="check-text">Lizard</label>
                        <input type="radio" id="liz" name="type_pref" value="Lizard">
                    </span>
                </div>
                            
                <div class="group">
                    <input type="submit" value="Find sitters" class="button">
                </div>
            </div>

            </form>
            
        </div>
    </div>

    <div class="text-content two-cols">  
        <?php

        
        if (!empty($availableSitters)) {
            echo "<h3>Available Sitters</h3>";
        
            echo "<table>";
            echo "<tr>";
            echo "<th>Sitter ID</th>";
            echo "<th>Zipcode</th>";
            echo "<th>Available Days</th>";
            echo "<th>Available Times</th>";
            echo "<th>Size Preference</th>";
            echo "<th>Type Preference</th>";
            echo "</tr>";
        
            foreach ($availableSitters as $sitter) {
                echo "<tr>";
                echo "<td>{$sitter['user_id']}</td>";
                echo "<td>{$sitter['zipcode']}</td>";
                echo "<td>{$sitter['available_days']}</td>";
                echo "<td>{$sitter['available_times']}</td>";
                echo "<td>{$sitter['size_pref']}</td>";
                echo "<td>{$sitter['type_pref']}</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } else {
            echo "<p>No available sitters found.</p>";
        }
        
        ?>

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
