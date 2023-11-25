<?php
require_once 'includes/config_session.inc.php';
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
        <a href="./index.html">Home</a>
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

            <?php }?>


        </div>
    </div>
    


</body>
</html>