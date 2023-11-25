<?php

declare(strict_types=1);

function is_input_empty(string $name, null|int $weight, null|int $age, string $pet_type)
{
    if (empty($name) || empty($age) || empty($weight) || empty($pet_type)) {
        return true;
    } else {
        return false;
    }
}

function is_pet_registered(object $pdo, string $user_id, string $name)
{
    if (get_pet($pdo, $user_id, $name)) {
        return true;
    } else {
        return false;
    }
}

function is_customer_registered(object $pdo, string $user_id)
{
    if (get_customer($pdo, $user_id)) {
        return true;
    } else {
        return false;
    }
}

function create_pet(object $pdo, string $name, int $user_id, int $weight, int $age)
{
    set_pet($pdo, $name, $user_id, $weight, $age);
}