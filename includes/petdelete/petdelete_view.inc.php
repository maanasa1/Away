<?php

function check_petdelete_errors()
{
    if (isset($_SESSION["errors_petdelete"])) {
        $errors = $_SESSION["errors_petdelete"];

        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';
        }

        unset($_SESSION["errors_petdelete"]);
    } else if (isset($_GET["deletion"]) && $_GET["deletion"] === "success") {
        echo '<p class="form-success">Deletion successful</p>';
    }
}