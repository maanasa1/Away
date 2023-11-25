<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup/signup_view.inc.php';
require_once 'includes/login/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Away.com</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">

</head>

<header>
    <div class="Title">
        <h1>AWAY</h1>
    </div>

    <div class="topnav">
        <a href="./index.php">Home</a>
        <a href="./customer.php">For Customers</a>
        <a href="./sitter.php">For Sitters</a>
        <a class ="active" href="./login.php">Log In</a>
    </div>
</header>

<body>
    <div class="hero-img">
        <div class="login-html">
            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <input id = "tab-1" type="radio" name="tab" class="sign-in" <?php if (!isset($_GET["signup"])) echo 'checked' ?>>
                <label for="tab-1" class="tab">Sign In</label>

                <input id="tab-2" type="radio" name="tab" class="sign-up" <?php if (isset($_GET["signup"])) echo 'checked' ?>>
                <label for="tab-2" class="tab">Sign Up</label>

                <div class="login-form">
                    <div class="sign-in-htm">
                        <form action="includes/login/login.inc.php" method="post">
                            <div class="group">
                                <label for="email" class="label">email</label>
                                <input id="email" type="email" class="input" name="email" required>
                            </div>

                            <div class="group">
                                <label for="pwd" class="label">Password</label>
                                <input id="pwd" type="password" class="input" name="pwd" required>
                            </div>

                            <div class="group">
                                <input type="submit" class="button" value="Sign In">
                            </div>
                        </form>

                        <?php
                        check_login_errors();
                        ?>
                    </div>

                    <div class="sign-up-htm">
                        <form action="includes/signup/signup.inc.php" method="post">
                            <div class="group">
                                <label for="name" class="label">Full Name</label>
                                <input id="name" type="text" class="input" name="name" required>
                            </div>

                            <div class="group">
                                <label for="email" class="label">Email</label>
                                <input id="email" type="email" class="input" name="email" required>
                            </div>

                            <div class="group">
                                <label for="pwd" class="label">Password</label>
                                <input id="pwd" type="password" class="input" name="pwd" required>
                            </div>

                            <div class="group">
                                <label class="label">Register as: </label>
                                <div class="selection">
                                    
                                    <input id="owner" type="radio" name="user_type" value="Pet Owner">
                                    <label for="owner" class="label">Pet Owner</label>

                                    
                                    <input id="sitter" type="radio" name="user_type" value="Pet Sitter">
                                    <label for="sitter" class="label">Pet Sitter</label>
                                </div>
                            </div>

                            <div class="group">
                                <input type="submit" class="button" value="Sign Up">
                            </div>
                        </form>

                        <?php
                        check_signup_errors();
                        ?>

                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                        
                    </div>
                </div>

                

            <?php 
                } else { 
                    output_username();
            ?>
                <form action="includes/logout.inc.php" method="post">
                    <div class="group">
                        <br>
                        <input type="submit" class="button" value="Logout">
                    </div>
                </form>
            <?php } ?>

        </div>    
    </div>

    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <div class="text-content two-cols">
            <div>
                <h3>Your Bookings:</h3>
            </div>
            <div>
                <?php include('includes/displaybookings.inc.php');?>
            </div>
        </div>
    <?php }?>
</body>