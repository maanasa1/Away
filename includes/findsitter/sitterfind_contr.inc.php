<?php

function find_available_sitters(object $pdo, int $zipcode, array $availableDays, array $availableTimes, array $sizePref, array $typePref) {
    $query = "SELECT * FROM Sitters 
    WHERE zipcode = :zipcode 
    AND ARRAY[:availableDays] <@ string_to_array(available_days, ',')
    AND ARRAY[:availableTimes] <@ string_to_array(available_times, ',')
    AND ARRAY[:sizePref] <@ string_to_array(size_pref, ',')
    AND ARRAY[:typePref] <@ string_to_array(type_pref, ',')";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindValue(':availableDays', implode(",", $availableDays));
    $stmt->bindValue(':availableTimes', implode(",", $availableTimes));
    $stmt->bindValue(':sizePref', implode(",", $sizePref));
    $stmt->bindValue(':typePref', implode(",", $typePref));

    $stmt->execute();

    $availableSitters = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the array of available sitters
    return $availableSitters;
}