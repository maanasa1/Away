<?php
//show user info if registered

//if not, say "you have no preferences registered. register them above"

//delete button

//check if user is registered 


//if so delete their data from table 



if ($_SERVER["REQUEST_METHOD"] === "POST") {    
    require_once '../config_session.inc.php';
    $user_id = $_SESSION["user_id"];
    try {
        require_once '../dbh.inc.php';
        require_once 'sitterdelete_model.inc.php';
        require_once 'sitterdelete_contr.inc.php';

        $errors = [];
        if (!is_sitter_registered($pdo, $user_id)) {
            $errors["not_registered"] = "No registration to delete";
        }

        if ($errors) {
            $_SESSION["errors_sitterdelete"] = $errors;

            
            header("Location: ../../sitter.php?deletion=failed");
            die();
        }

        delete_sitter($pdo, $user_id);
        header("Location: ../../sitter.php?deletion=success");

        $pdo = null;
        $stmt = null;

        die();



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    

}
else {
    header("Location: ../../sitter.php");
    die();
}
