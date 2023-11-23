<?php

declare(strict_types=1);

function is_input_empty(string $email, string $pwd) {
    if (empty($email) || empty($pwd) ) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong(bool|array $result) {
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $userPwd, string $storedPwd) {
    if ($userPwd !== $storedPwd) {
        return true;
    } else {
        return false;
    }

}