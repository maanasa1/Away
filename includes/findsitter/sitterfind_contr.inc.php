<?php
function find_available_sitters(object $pdo, int $zipcode, string $availableDay, string $availableTime, string $sizePref, string $typePref) {
    $query = "SELECT * FROM Sitters 
        WHERE zipcode = :zipcode 
        AND available_days LIKE :availableDay
        AND available_times LIKE :availableTime
        AND size_pref LIKE :sizePref
        AND type_pref LIKE :typePref";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindValue(':availableDay', "%$availableDay%");
    $stmt->bindValue(':availableTime', "%$availableTime%");
    $stmt->bindValue(':sizePref', "%$sizePref%");
    $stmt->bindValue(':typePref', "%$typePref%");


    echo $query;

    $stmt->execute();
    $availableSitters = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the array of available sitters
    return $availableSitters;
}
