<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $pwd)) {
            $errors["empty_input"] = "Fill in all fields";
        }

        $result = get_user($pdo, $email);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect email";
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect password";
        }
        
        require_once '../config_session.inc.php'; //Starts session for errors 

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);


        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["user_email"] = $result["email"];

        $_SESSION["last_regeneration"] = time();

        header("Location: ../../login.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} 
else {
    header("Location: ../../login.php");
    die();
}
