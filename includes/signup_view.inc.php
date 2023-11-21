<?php
//For showing something within website 

declare(strict_types=1);


function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        

        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';

        }
        
        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<p class="form-success">Signup success!</p>';
    }
}

