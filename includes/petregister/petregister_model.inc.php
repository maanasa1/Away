<?php

declare(strict_types=1);

function set_pet(object $pdo, string $name, int $user_id, int $weight, int $age, string $pet_type)
{
    $query = "INSERT INTO Animals (name, owner, weight, age, animal_type) VALUES (:name, :user_id, :weight, :age, :pet_type);";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":weight", $weight);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":pet_type", $pet_type);
    $stmt->execute();

}

function get_pet(object $pdo, string $user_id, string $name)
{
    $query = "SELECT owner FROM Animals WHERE owner = :user_id and name = :name;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_customer(object $pdo, string $user_id)
{
    $query = "SELECT user_id FROM Customers WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
