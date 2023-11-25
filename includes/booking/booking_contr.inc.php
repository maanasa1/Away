<?php
declare(strict_types=1);

function is_sitter_registered(object $pdo, string $sitter_id) {
    if (get_sitter($pdo, $sitter_id)) {
        return true;
    } else {
        return false;
    } 
}

function is_sitter_available_day(object $pdo, string $sitter_id, string $service_date) {
    $availability = get_availability($pdo, $sitter_id);
    $month = (int)substr($service_date, 5, 3);
    $day = (int)substr($service_date, 8, 3);
    $year = (int)substr($service_date, 0, 4);
    if (str_contains($availability["available_days"], date("l", mktime(0, 0, 0, $month, $day, $year)))) {
        return true;
    } else {
        return false;
    }
}

function is_sitter_available_time(object $pdo, string $sitter_id, string $start_time, string $end_time) {
    $availability = get_availability($pdo, $sitter_id);
    
    if ($start_time < "12:00"){
        $start_tod = "Morning";
    } else if ($start_time < "17:00") {
        $start_tod = "Afternoon";
    } else {
        $start_tod = "Evening";
    }

    if ($end_time < "12:00"){
        $end_tod = "Morning";
    } else if ($end_time < "17:00") {
        $end_tod = "Afternoon";
    } else {
        $end_tod = "Evening";
    }

    if (str_contains($availability["available_times"], $start_tod) && str_contains($availability["available_times"], $end_tod)) {
        return true;
    } else {
        return false;
    }
    
}

function size_in_sitterprefs(object $pdo, string $pet_id, string $sitter_id) {
    $info = get_pet_info($pdo, $pet_id);
    $pref = get_sitter_prefs($pdo, $sitter_id);

    if ($info["weight"] < 15){
        $size = "Small";
    } else if ($info["weight"] < 40) {
        $size = "Medium";
    } else {
        $size = "Large";
    }

    if ($pref["size_pref"] == $size) {
        return true;
    } else {
        return false;
    }


}

function calc_service_cost(object $pdo, string $sitter_id, string $start_time, string $end_time) {
    $sitter_rate = get_sitter_rate($pdo, $sitter_id);
    $hours = substr($end_time,0,2) - substr($start_time,0,2);
    $mins = substr($end_time,3,2) + (60 - substr($start_time,3,2));
    $length = $hours + ($mins/60  - 1);
    $cost = $sitter_rate * $length;

    return $cost;
}

