<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

require_once 'petdelete/petdelete_model.inc.php';
require_once 'petdelete/petdelete_contr.inc.php';
require_once 'petdelete/petdelete_view.inc.php';
?>

<?php
?>

<div class="text-content two-cols">
    <div>
        <h3>View your pets:</h3>
    </div>

    <div>
        <?php
        $user_id = $_SESSION["user_id"];

        if (pets_exist($pdo, $user_id)) {
            ?>
            <p>Here are your pets:</p>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Weight</th>
                </tr>

                <?php $pets = get_pets($pdo, $user_id); ?>
                <tr>
                    <td>
                        <?php echo $pets["name"]; ?>
                    </td>
                    <td>
                        <?php echo $pets["age"]; ?>
                    </td>
                    <td>
                        <?php echo $pets["weight"]; ?>
                    </td>
                </tr>
            </table>

            <br>
            <form action="includes/petdelete/petdelete.inc.php" method="post">
                <input type="submit" class="btn" value="Delete Preferences">
            </form>
            <?php
            check_petdelete_errors();

        } else { ?>
            <p>You have not added any pets. Use the form above to add pets now!</p>
        <?php } ?>


    </div>
</div>