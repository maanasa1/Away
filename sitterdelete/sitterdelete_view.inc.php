<?php


function check_sitterdelete_errors() {
    if (isset($_SESSION["errors_sitterdelete"])) {
        $errors = $_SESSION["errors_sitterdelete"];
        

        foreach ($errors as $error) {
            echo '<p class="form-error">' . "Error: " . $error . '</p>';
        }
        
        unset($_SESSION["errors_sitterdelete"]);
    } else if (isset($_GET["deletion"]) && $_GET["deletion"] === "success") {
        echo '<p class="form-success">Deletion successful</p>';
    }
}



