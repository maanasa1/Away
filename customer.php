<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/petregister/petregister_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away.com</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/customer.css">
</head>


<header>
    <div class="Title">
        <h1>AWAY</h1>
    </div>

    <div class="topnav">
        <a href="./index.php">Home</a>
        <a class="active" href="./customer.php">For Customers</a>
        <a href="./sitter.php">For Sitters</a>
        <a href="./login.php">Log In</a>
    </div>
</header>


<body class="homepage">
    <div class="hero-img">
        <div class="hero-text_customer">
            <h3>Would you like to add a pet?</h3>

            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <a href="./login.php">
                    <button class="btn">Log In to Register any pets</button>
                </a>
                <?php
            } else { ?>
                <form id="form" action="includes/petregister/petregister.inc.php" method="post">

                    <div class="group">
                        <label for="name" class="label">Name:</label>
                        <input type="text" id="name" name="name" class="input">
                    </div>

                    <div class="group">
                        <label for="age" class="label">Age:</label>
                        <input type="number" id="age" name="age" class="input">
                    </div>

                    <div class="group">
                        <label for="name" class="label">Weight (lbs):</label>
                        <input type="number" id="weight" name="weight" class="input">
                    </div>

                    <div class="group">
                        <label for="type" class="label">Pet type:</label>

                        <div class="label_inside">
                            <label for="dog" class="label_inside">
                                <input type="radio" id="dog" name="pet_type" value="Dog">
                                Dog
                            </label>

                            <label for="cat" class="label_inside">
                                <input type="radio" id="cat" name="pet_type" value="Cat">
                                Cat
                            </label>


                            <label for="bird" class="label_inside">
                                <input type="radio" id="bird" name="pet_type" value="Bird">
                                Bird
                            </label>


                            <label for="sa" class="label_inside">
                                <input type="radio" id="sa" name="pet_type" value="Small Animal">
                                Small animal
                            </label>


                            <label for="liz" class="label_inside">
                                <input type="radio" id="liz" name="pet_type" value="Lizard">
                                Lizard
                            </label>

                        </div>
                    </div>

                    <div class="group">
                        <input type="submit" value="Add pet" class="button">
                    </div>

                </form>
                <?php
                check_petregister_errors();
            } ?>

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

    <div class="text-content two-cols">
        <div>
            <h3>Want to create a booking?</h3>
        </div>
        <div>
            <a href="./booking.php">
                <button class="btn">Go to Bookings</button>
            </a>
        </div>
    </div>

    <?php
    if (isset($_SESSION["user_id"])) {
        include('includes/displaypets.inc.php');
    }
    ?>

    <div class="text-content two-cols">
        <div>
            <h3>Do you love animals?</h3>
        </div>
        <div>
            <p class="right">Earn money doing what you love by petsitting. You are your own
                boss, in control of your own schedule, prices, and preferences.</p>
            <a href="./sitter.php">
                <button class="btn">Become a Sitter</button>
            </a>
        </div>
    </div>



</body>

</html>
