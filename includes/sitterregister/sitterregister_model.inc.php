<?php

declare(strict_types=1);

function set_sitter(object $pdo, int $user_id, int $zipcode, array $available_days, array $available_times, array $size_pref, array $type_pref) 
{
    $query = "INSERT INTO Sitters (user_id, zipcode, available_days, available_times, size_pref, type_pref) VALUES (:user_id, :zipcode, :available_days, :available_times, :size_pref, :type_pref);";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":zipcode", $zipcode);
    // $stmt->bindParam(":available_days", $available_days);
    // $stmt->bindParam(":available_times", $available_times);
    // $stmt->bindParam(":size_pref", $size_pref);
    // $stmt->bindParam(":type_pref", $type_pref);
    $stmt->bindParam(":available_days", implode(", ", $available_days));
    $stmt->bindParam(":available_times", implode(", ", $available_times));
    $stmt->bindParam(":size_pref", implode(", ", $size_pref));
    $stmt->bindParam(":type_pref", implode(", ", $type_pref));
    $stmt->execute();

}

function get_sitter(object $pdo, string $user_id) {
    $query = "SELECT user_id FROM Sitters WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
