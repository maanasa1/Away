<?php

//Database log in info
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $user_type = $_POST["user_type"];

    try {
        //Connect to the database
        require_once '../dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS 
        $errors = [];

        if (is_input_empty($email, $pwd)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered";
        }
        
        require_once '../config_session.inc.php'; //Starts session for errors 

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "email" => $email,
                "user_type" => $user_type
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../../login.php?signup=failed");
            die();
        }


        create_user($pdo, $pwd, $email, $user_type);

        header("Location: ../../login.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../../login.php");
    die();
}