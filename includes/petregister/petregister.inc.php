<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../config_session.inc.php';
    $user_id = $_SESSION["user_id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $weight = $_POST["weight"];
    $pet_type = $_POST["pet_type"];

    try {
        require_once '../dbh.inc.php';
        require_once 'petregister_model.inc.php';
        require_once 'petregister_contr.inc.php';

        $errors = [];

        if (is_input_empty($name, $weight, $age, $pet_type)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        if (is_pet_registered($pdo, $user_id, $name)) {
            $errors["pet_registered"] = "Already registered as a pet";
        }
        if (!is_customer_registered($pdo, $user_id)) {
            $errors["customer_not_registered"] = "Not registered as a customer";
        }

        if ($errors) {
            $_SESSION["errors_petregister"] = $errors;


            header("Location: ../../customer.php?registration=failed");
            die();
        }

        create_pet($pdo, $name, $user_id, $weight, $age, $pet_type);

        header("Location: ../../customer.php?registration=success");

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
