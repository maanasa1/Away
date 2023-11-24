<?php

declare(strict_types=1);

function is_input_empty(string $zipcode, null|array $available_days, null|array $available_times, null|array $size_pref, null|array $type_pref) {
    if (empty($zipcode) || empty($available_days) || empty($available_times) || empty($size_pref) || empty($type_pref)) {
        return true;
    } else {
        return false;
    }
}

function is_zipcode_invalid(string $zipcode) {
    if (strlen($zipcode) != 5) {
        return true;
    } else {
        return false;
    }
}

function is_sitter_registered(object $pdo, string $user_id) {
    if (get_sitter($pdo, $user_id)) {
        return true;
    } else {
        return false;
    } 
}

function create_sitter(object $pdo, int $user_id, int $zipcode, array $available_days, array $available_times, array $size_pref, array $type_pref) {
    set_sitter($pdo, $user_id, $zipcode, $available_days, $available_times, $size_pref, $type_pref);
}