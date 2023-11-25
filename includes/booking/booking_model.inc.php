<?php
declare(strict_types=1);

function get_pet_id(object $pdo, string $pet_name) {
    $query = "SELECT animal_id FROM Animals WHERE name = :pet_name;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":pet_name", $pet_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["animal_id"];
}

function get_sitter(object $pdo, string $sitter_id) {
    $query = "SELECT user_id FROM Sitters WHERE user_id = :sitter_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":sitter_id", $sitter_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_availability(object $pdo, string $sitter_id) {
    $query = "SELECT available_days, available_times FROM Sitters WHERE user_id = :sitter_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":sitter_id", $sitter_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_pets(object $pdo, string $user_id) {
    $query = "SELECT * FROM Animals WHERE owner = :user_id;";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_pet_info(object $pdo, string $pet_id) {
    $query = "SELECT weight FROM Animals WHERE animal_id = :pet_id";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":pet_id", $pet_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_sitter_prefs(object $pdo, string $sitter_id) {
    $query = "SELECT size_pref, type_pref FROM Sitters WHERE user_id = :sitter_id";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":sitter_id", $sitter_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function create_booking(object $pdo, string $user_id, string $sitter_id, string $pet_id, string $service_date, string $start_time, string $end_time) {
    $query = "INSERT INTO Service (booker_id, sitter_id, pet, serivice_date, start_time, end_time) VALUES (:user_id, :sitter_id, :pet_id, :service_date, :start_time, :end_time);";
    $stmt = $pdo->prepare($query); //prevents SQL injection
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":sitter_id", $sitter_id);
    $stmt->bindParam(":pet_id", $pet_id);
    $stmt->bindParam(":service_date", $service_date);
    $stmt->bindParam(":start_time", $start_time);
    $stmt->bindParam(":end_time", $end_time);
    $stmt->execute();
}