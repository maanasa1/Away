<?php

if ([$_SERVER["REQUEST_METHOD"] === "POST"]) {
    require_once '../config_session.inc.php';
    $user_id = $_SESSION["user_id"];
    $name = $_POST["name"];
    try {
        require_once '../dbh.inc.php';
        require_once 'petdelete_model.inc.php';
        require_once 'petdelete_contr.inc.php';

        $errors = [];
        if (!is_pet_registered($pdo, $user_id, $name)) {
            $errors["not_registered"] = "Pet does not exist!";
        }

        if ($errors) {
            $_SESSION["errors_petdelete"] = $errors;


            header("Location: ../../customer.php?deletion=failed");
            die();
        }

        delete_pet($pdo, $user_id, $name);
        header("Location: ../../customer.php?deletion=success");

        $pdo = null;
        $stmt = null;

        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../customer.php");
    die();
}
