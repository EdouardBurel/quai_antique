<?php

function checkAvailability($pdo,$date, $guests)
{
    $query = "SELECT SUM(guests) as total_guests FROM reservations WHERE date=:date";
    $res = $pdo->prepare($query);
    $res->bindParam(":date", $date);
    $res->execute();
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $total_guests = $row['total_guests'];

    return $total_guests + $guests <= 30;
}

function insertReservation($pdo, $name, $date, $time, $guests, $comments)
{
    $query = "INSERT INTO reservations (name, date, time, guests, comments) VALUES (:name, :date, :time, :guests, :comments)";
    $res = $pdo->prepare($query);
    $res->bindParam(":name", $name);
    $res->bindParam(":date", $date);
    $res->bindParam(":time", $time);
    $res->bindParam(":guests", $guests);
    $res->bindParam(":comments", $comments);
    $res->execute();
}