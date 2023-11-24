<?php
declare(strict_types=1);

function is_sitter_registered(object $pdo, string $user_id) {
    if (get_sitter($pdo, $user_id)) {
        return true;
    } else {
        return false;
    } 
}
