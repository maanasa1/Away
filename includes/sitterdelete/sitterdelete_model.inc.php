<?php
declare(strict_types=1);

function get_sitter_prefs(object $pdo, string $user_id) {
    $query = "SELECT * FROM Sitters WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_sitter(object $pdo, string $user_id) {
    $query = "SELECT user_id FROM Sitters WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delete_sitter(object $pdo, string $user_id) {
    $query = "DELETE FROM Sitters WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
