<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../config_session.inc.php';
    $user_id = $_SESSION["user_id"];
    $zipcode = htmlspecialchars($_POST["zipcode"]);
    $availableDays = $_POST["days"];
    $availableTimes = $_POST["time"];
    $sizePref = $_POST["size_pref"];
    $typePref = $_POST["type_pref"];

    try {
        require_once '../dbh.inc.php';
        
        require_once 'sitterfind_contr.inc.php';

        $availableSitters = find_available_sitters($pdo, $zipcode, $availableDays, $availableTimes, $sizePref, $typePref);
        
        //save the array in the session
        $_SESSION['availableSitters'] = $availableSitters;

        // Redirect back to booking.php
        header("Location: ../../booking.php");
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../booking.php");
}
?>