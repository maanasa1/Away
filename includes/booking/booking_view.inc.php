<?php

function check_booking_errors() {
    if (isset($_SESSION["errors_booking"])) {
        $errors = $_SESSION["errors_booking"];
        

        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';
        }
        
        unset($_SESSION["errors_booking"]);
    } else if (isset($_GET["booking"]) && $_GET["booking"] === "success") {
        echo '<p class="form-success">Booking success!</p>';
    }
}

function pet_select() {
    require_once 'includes/config_session.inc.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/booking/booking_model.inc.php';
    $user_id = $_SESSION["user_id"];
    
    $user_pets = get_pets($pdo, $user_id);
    foreach ($user_pets as $pet)
    {
        // echo $pet["name"];
        echo '<option value=' . $pet["name"]. '>' . $pet["name"]. '</option>';
    }
}


