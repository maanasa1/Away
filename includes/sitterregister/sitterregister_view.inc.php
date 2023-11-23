<?php

declare(strict_types=1);

function check_sitterregister_errors() {
    if (isset($_SESSION["errors_sitterregister"])) {
        $errors = $_SESSION["errors_sitterregister"];
        

        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';
        }
        
        unset($_SESSION["errors_sitterregister"]);
    } else if (isset($_GET["registration"]) && $_GET["registration"] === "success") {
        echo '<p class="form-success">Registration success!</p>';
    }

}