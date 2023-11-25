<?php
declare(strict_types=1);

function is_customer_registered(object $pdo, string $user_id)
{
    if (get_customer($pdo, $user_id)) {
        return true;
    } else {
        return false;
    }
}

function pets_exist(object $pdo, string $user_id)
{
    if (customer_exists($pdo, $user_id)) {
        return true;
    } else {
        return false;
    }
}
