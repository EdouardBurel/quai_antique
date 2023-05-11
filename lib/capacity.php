<?php

function updateCapacity(PDO $pdo, int $capacity_id, int $totalGuests) {

    $query= "UPDATE capacity SET totalGuests=:totalGuests WHERE id=:capacity_id";
    $res = $pdo->prepare($query);
    $res->bindParam(":totalGuests", $totalGuests);
    $res->bindParam(":capacity_id", $capacity_id);
    return $res->execute();
};
