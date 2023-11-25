<?php
//For querying database

declare(strict_types=1);
//Don't need to require link to database, because we link it in signup.inc.php 

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $pwd, string $email, string $user_type)
{
    $query = "INSERT INTO users (email, pwd, user_type) VALUES (:email, :pwd, :user_type);";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->bindParam(":user_type", $user_type);
    $stmt->execute();

    if ($user_type == "Pet Owner") {
        $user_id = $pdo->lastInsertId();
        $query = "INSERT INTO customers (user_id, email) VALUES (:user_id, :email);";
        $stmt = $pdo->prepare($query); //prevents SQL injection
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }
}
