<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../config_session.inc.php';
    $user_id = $_SESSION["user_id"];
    $sitter_id = $_POST["sitter_id"];
    $pet_name = $_POST["pet_name"];
    $service_date = $_POST["service_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    
    
    
    try {
        require_once '../dbh.inc.php';
        require_once 'booking_model.inc.php';
        require_once 'booking_contr.inc.php';
        $pet_id = get_pet_id($pdo, $pet_name);
        

        $errors = [];

        if (!is_sitter_registered($pdo, $sitter_id)) {
            $errors["unregistered_sitter"] = "ID does not belong to a registered sitter";

            $_SESSION["errors_booking"] = $errors;

            header("Location: ../../booking.php?booking=failed");
            die();
        }

        if (!is_sitter_available_day($pdo, $sitter_id, $service_date)) {
            $errors["unavilable_day"] = "Selected sitter is not available on the given day";
        }

        if (!is_sitter_available_time($pdo, $sitter_id, $start_time, $end_time)) {
            $errors["unavilable_time"] = "Selected sitter is not available at the given time";
        }
        
        if ($start_time >= $end_time) {
            $errors["incorrect_time"] = "Start time must be earlier than end time";
        }

        if (!size_in_sitterprefs($pdo, $pet_id, $sitter_id)) {
            $errors["wrong_size"] = "Pet size does not fit sitter's preferences";
        }

        //add error for pet type

        if ($errors) {
            $_SESSION["errors_booking"] = $errors;

            header("Location: ../../booking.php?booking=failed");
            die();
        }


        create_booking($pdo, $user_id, $sitter_id, $pet_id, $service_date, $start_time, $end_time);

        header("Location: ../../booking.php?booking=success");

        $pdo = null;
        $stmt = null;

        die();



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    

}
else {
    header("Location: ../../booking.php");
    die();
}
