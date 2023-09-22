<?php

function updateCapacity(PDO $pdo, int $capacity_id, int $totalGuests) {

    $query= "UPDATE capacity SET totalGuests=:totalGuests WHERE id=:capacity_id";
    $res = $pdo->prepare($query);
    $res->bindParam(":totalGuests", $totalGuests);
    $res->bindParam(":capacity_id", $capacity_id);
    return $res->execute();
};

function getNumberCapacity(PDO $pdo) {
    $query = "SELECT totalGuests FROM capacity"; // Select the 'totalGuests' value
    $result = $pdo->query($query);
    
    return $result ? $result->fetchColumn() : false; // Fetch the 'totalGuests' value or return false if not found
}

$totalGuests = getNumberCapacity($pdo);
if ($totalGuests !== false) {
    $totalGuests;
} else {
    echo "Failed to fetch total guests.";
}
