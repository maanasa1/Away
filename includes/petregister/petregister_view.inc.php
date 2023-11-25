<?php

function check_petregister_errors()
{
    if (isset($_SESSION["errors_petregister"])) {
        $errors = $_SESSION["errors_petregister"];


        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';
        }

        unset($_SESSION["errors_petregister"]);
    } else if (isset($_GET["registration"]) && $_GET["registration"] === "success") {
        echo '<p class="form-success">Your pet is added to your account!</p>';
    }
}