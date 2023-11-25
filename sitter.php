<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/sitterregister/sitterregister_view.inc.php';
require_once 'includes/sitterdelete/sitterdelete_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away.com</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sitter.css">
</head>


<header>
    <div class="Title">
        <h1>AWAY</h1>
    </div>

    <div class="topnav">
        <a href="./index.php">Home</a>
        <a href="./customer.php">For Customers</a>
        <a class="active" href="./sitter.php">For Sitters</a>
        <a href="./login.php">Log In</a>
    </div>
</header>


<body class="homepage">
    <div class="hero-img">
        <div class="hero-text_sitter">
            <h3>Interested in becoming a sitter?</h3>

            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <a href="./login.php">
                    <button class="btn">Log In to Register as a Sitter</button>
                </a>


            <?php
            } else {
                ?>
                <form id="form" action="includes/sitterregister/sitterregister.inc.php" method="post">
                    <div class="dual-input">
                        <div class="zip-container">
                            <label for="zipcode" class="label">Zipcode:</label><br>
                            <input id="zipcode" type="number" class="input" name="zipcode" required>
                        </div>

                        <div class="rate-container">
                            <label for="rate" class="label">Hourly Rate:</label><br>
                            <input id="rate" type="number" class="input" name="rate" required>
                        </div>

                    </div>
                    

                    <div class="dual-input">
                        <div class="availability-dropdown">
                            <label for="dropdown" class="label">Availabilty:</label><br>
                            <select id="days" class="multiselect" name="days[]" multiple required>
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
                            <select id="time" class="multiselect" name="time[]" multiple required>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="size-container">
                        <label for="size" class="label">I am comfortable with sizes:</label><br>
                        <span id="size">
                            <label for="small" class="check-text">Small (0-15 lbs)</label>
                            <input type="checkbox" id="small" name="size_pref[]" value="Small">

                            <label for="med" class="check-text">Medium (16-40 lbs)</label>
                            <input type="checkbox" id="med" name="size_pref[]" value="Medium">

                            <label for="large" class="check-text">Large (40+ lbs)</label>
                            <input type="checkbox" id="large" name="size_pref[]" value="Large">
                        </span>
                    </div>

                    <br>

                    <div class="type-container">
                        <label for="type" class="label">I want to sit:</label><br>
                        <span id="type">
                            <label for="dog" class="check-text">Dog</label>
                            <input type="checkbox" id="dog" name="type_pref[]" value="Dog">

                            <label for="cat" class="check-text">Cat</label>
                            <input type="checkbox" id="cat" name="type_pref[]" value="Cat"> <br>

                            <label for="bird" class="check-text">Bird</label>
                            <input type="checkbox" id="bird" name="type_pref[]" value="Bird">

                            <label for="sa" class="check-text">Small animal</label>
                            <input type="checkbox" id="sa" name="type_pref[]" value="Small animal">

                            <label for="liz" class="check-text">Lizard</label>
                            <input type="checkbox" id="liz" name="type_pref[]" value="Lizard">
                        </span>
                    </div>

                    <br>
                    <input id="submit" type="submit" class="button" value="Register as a Sitter">

                </form>


                <?php
                check_sitterregister_errors();
            } ?>

        </div>
    </div>

    <?php
    if (isset($_SESSION["user_id"])) {
        include('includes/displaysitterprefs.inc.php');
    }
    ?>


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