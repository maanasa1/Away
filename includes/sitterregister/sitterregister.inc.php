<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../config_session.inc.php';
    //need an error for is userid is not set
    $user_id = $_SESSION["user_id"];
    $zipcode = $_POST["zipcode"];
    $available_days = $_POST["days"];
    $available_times = $_POST["time"];
    $size_pref = $_POST["size_pref"];
    $type_pref = $_POST["type_pref"];
    
    try {
        require_once '../dbh.inc.php';
        require_once 'sitterregister_model.inc.php';
        require_once 'sitterregister_contr.inc.php';

        $errors = [];

        //need an error if already registered 
        if (is_input_empty($zipcode, $available_days, $available_times, $size_pref, $type_pref)) {
            $errors["empty_input"] = "Fill in all fields";
        }
        if (is_zipcode_invalid($zipcode)) {
            $errors["invalid_zipcode"] = "Invalid zipcode";
        }

        if ($errors) {
            $_SESSION["errors_sitterregister"] = $errors;

            
            header("Location: ../../sitter.php?registration=failed");
            die();
        }


        create_sitter($pdo, $user_id, $zipcode, $available_days, $available_times, $size_pref, $type_pref);

        header("Location: ../../sitter.php?registration=success");

        $pdo = null;
        $stmt = null;

        die();



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    // echo $user_id;
    // echo $zipcode;
    // echo strlen($zipcode);
    // foreach ($available_days as $day) {
    //     echo $day;
    // }
    // foreach ($available_times as $time) {
    //     echo $time;
    // }
    // foreach ($size_pref as $size) {
    //     echo $size;
    // }
    // foreach ($type_pref as $type) {
    //     echo $type;
    // }
    

}
else {
    header("Location: ../../sitter.php");
    die();
}
