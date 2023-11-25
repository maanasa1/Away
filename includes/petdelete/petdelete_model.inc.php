<?php
declare(strict_types=1);

function get_pets(object $pdo, string $user_id)
{
    $query = "SELECT name, weight, age FROM Animals WHERE owner = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function customer_exists(object $pdo, string $user_id)
{
    $query = "SELECT owner FROM Animals WHERE owner = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($result !== false);
}

function delete_pet(object $pdo, string $user_id, string $name)
{
    $query = "DELETE FROM Animals WHERE owner = :user_id AND name = :name;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}