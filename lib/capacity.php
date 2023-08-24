<?php

function updateCapacity(PDO $pdo, int $capacity_id, int $totalGuests) {

    $query= "UPDATE capacity SET totalGuests=:totalGuests WHERE id=:capacity_id";
    $res = $pdo->prepare($query);
    $res->bindParam(":totalGuests", $totalGuests);
    $res->bindParam(":capacity_id", $capacity_id);
    return $res->execute();
};

function getNumberCapacity(PDO $pdo) {
    $query = "SELECT totalGuests FROM capacity"; // Select only the 'totalGuests' column
    $res = $pdo->query($query); // Use query() instead of prepare() since there are no bound parameters
    
    if ($res !== false) {
        $row = $res->fetch(PDO::FETCH_ASSOC); // Fetch the first row
        if ($row !== false) {
            return $row['totalGuests']; // Return the 'totalGuests' value
        }
    }
    
    return false; // Return a default value or handle the case where data is not available
}

// Assuming you have a valid PDO connection $pdo
$totalGuests = getNumberCapacity($pdo);
if ($totalGuests !== false) {
    echo $totalGuests;
} else {
    echo "Failed to fetch total guests.";
}
