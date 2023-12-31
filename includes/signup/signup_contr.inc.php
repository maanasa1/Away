<?php
//For taking user data and doing something with it

declare(strict_types=1);

function is_input_empty(string $name, string $email, string $pwd) {
    if (empty($name) || empty($email) || empty($pwd) ) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $name, string $email, string $pwd, string $user_type) {
    set_user($pdo, $name, $email, $pwd, $user_type);
}