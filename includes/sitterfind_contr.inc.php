<?php
function find_available_sitters(object $pdo, int $zipcode, array $availableDays, array $availableTimes, array $sizePref, array $typePref) {
    $query = "SELECT * FROM Sitters 
              WHERE zipcode = :zipcode 
              AND string_to_array(available_days, ',') <@ ARRAY[:availableDays]
              AND string_to_array(available_times, ',') <@ ARRAY[:availableTimes]
              AND string_to_array(size_pref, ',') <@ ARRAY[:sizePref]
              AND string_to_array(type_pref, ',') <@ ARRAY[:typePref]";

    
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':zipcode', $zipcode);
    // Use bindValue to pass values directly
    $stmt->bindValue(':availableDays', implode(", ", $availableDays));
    $stmt->bindValue(':availableTimes', implode(", ", $availableTimes));
    $stmt->bindValue(':sizePref', implode(", ", $sizePref));
    $stmt->bindValue(':typePref', implode(", ", $typePref));


    $stmt->execute();

    $availableSitters = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the array of available sitters
    return $availableSitters;
}