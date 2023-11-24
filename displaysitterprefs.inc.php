<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

require_once 'sitterdelete/sitterdelete_model.inc.php';
require_once 'sitterdelete/sitterdelete_contr.inc.php';
?>


<?php

?>
<div class="text-content two-cols">
    <div>
        <h3>Already registered?</h3>
    </div>
    
    <div>
        <?php
        $user_id = $_SESSION["user_id"];

        if (is_sitter_registered($pdo, $user_id)) {
        ?>
            <p>Here are your sitter preferences:</p>

            <table>
                <tr>
                    <th>Zipcode</th>
                    <th>Available Days</th>
                    <th>Available Times</th>
                    <th>Pet Size</th>
                    <th>Pet Type</th>
                </tr>

                <tr>
                    <?php $prefs = get_sitter_prefs($pdo, $user_id); ?>
                    <td><?php echo $prefs["zipcode"]; ?></td>
                    <td><?php echo $prefs["available_days"]; ?></td>
                    <td><?php echo $prefs["available_times"]; ?></td>
                    <td><?php echo $prefs["size_pref"]; ?></td>
                    <td><?php echo $prefs["type_pref"]; ?></td>
                </tr>
            </table>

            <br>
            <form action="includes/sitterdelete/sitterdelete.inc.php" method="post">
                <input type="submit" class="btn" value="Delete Registration">
            </form>
            <?php 
            check_sitterdelete_errors(); 
    
        } else {?>
            <p>You are not registered as a sitter. Use the form above to register now!</p>

        <?php } ?>

                
    </div>
</div>
<!-- 
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    if (is_sitter_registered($pdo, $user_id)) {
        echo '<p>Here are your sitter preferences:</p>';

        echo' 
        <form action="includes/sitterdelete/sitterdelete.inc.php" method="post">
            <input type="submit" class="btn" value="Delete Registration">
        </form>';

    check_sitterdelete_errors(); 
    } else {
        echo '<p>You are not registered as a sitter. Use the form above to register now!</p>';
    }

    
             
} -->


<!-- 
    // $user_id = $_SESSION["user_id"];

    
    // require_once 'sitterdelete_model.inc.php';
    // require_once 'sitterdelete_contr.inc.php';

    // if (is_sitter_registered($pdo, $user_id)) {
    //     echo '<p>Here are your sitter preferences:</p>';
    //     require_once '../dbh.inc.php';
        
    //     $query = "SELECT * FROM Sitters WHERE user_id = :user_id;";
    //     $stmt = $pdo->prepare($query); //prevents SQL injection
    //     $stmt->bindParam(":user_id", $user_id);
    //     $stmt->execute();
    
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
        

    //     $pdo = null;
    //     $stmt = null;

        

    // } else {
    //     echo '<p>You are not registered as a sitter. Use the form above to register now!</p>';
    // }
    
    
 -->
