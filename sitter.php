<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/sitterregister/sitterregister_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away.com</title>
    <link rel="stylesheet" href="css/styles.css">
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
            if(isset($_SESSION["user_id"])) {?>

            <form id="form" action="includes/sitterregister/sitterregister.inc.php" method="post">

                <div id="left">
                    <label for="zipcode">Zipcode:</label><br>
                    <input type="number" id="zipcode" name="zipcode">

                    <div class="availability-container">
                        <div class="availability-dropdown">
                            <label for="dropdown">Availabilty:</label><br>
                            <select id="days" name="days[]" multiple>
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
                            <label for="dropdown">Time of day:</label><br>
                            <select id="time" name="time[]" multiple>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                            </select><br>
                        </div>
                    </div>
                </div>


                <div id="right">
                    <label for="size">I am comfortable with sizes:</label><br>
                    <span id="size">
                        <label for="small">Small (0-15 lbs)</label>
                        <input type="checkbox" id="small" name="size_pref[]" value="Small">

                        <label for="med">Medium (16-40 lbs)</label>
                        <input type="checkbox" id="med" name="size_pref[]" value="Medium">

                        <label for="large">Large (40+ lbs)</label>
                        <input type="checkbox" id="large" name="size_pref[]" value="Large">
                    </span>
                    <br><br>
                    <label for="type">I want to sit:</label><br>
                    <span id="type">
                        <label for="dog">Dog</label>
                        <input type="checkbox" id="dog" name="type_pref[]" value="Dog">

                        <label for="cat">Cat</label>
                        <input type="checkbox" id="cat" name="type_pref[]" value="Cat"> <br>

                        <label for="bird">Bird</label>
                        <input type="checkbox" id="bird" name="type_pref[]" value="Bird">

                        <label for="sa">Small animal</label>
                        <input type="checkbox" id="sa" name="type_pref[]" value="Small animal">

                        <label for="liz">Lizard</label>
                        <input type="checkbox" id="liz" name="type_pref[]" value="Lizard">
                    </span>

                </div>

                <br>

                <input id="submit" type="submit" value="Submit">
            </form>



            <?php 
            check_sitterregister_errors();
            } else { ?>
            <a href="./login.php">
                <button class="btn">Log In to Register as a Sitter</button>
            </a>


                <?php } ?>


        </div>

    </div>


    <div class="text-content two-cols">
        <div>
            <h3>Are you a pet owner?</h3>
        </div>
        <div>
            <p class="right">Whether you're at work for a few hours or on a two week vacation,
                we have the services you need. Pets are our family, so we only hire trustworthy
                animal lovers to care for yours. </p>
            <a href="./customer.php">
                <button class="btn">Find a Sitter</button>
            </a>
        </div>
    </div>





</body>

</html>