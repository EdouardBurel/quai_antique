<?php
require_once ('pdo.php');

function checkAvailability($pdo, $date, $guests)
{    
    $query = "SELECT totalGuests FROM capacity";
    $res = $pdo->query($query);
    $totalGuests = $res->fetchColumn();

    $query = "SELECT SUM(guests) as total_guests FROM reservations WHERE date = :date";
    $res = $pdo->prepare($query);
    $res->bindParam(":date", $date);
    $res->execute();
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $total_reserved_guests = $row['total_guests'];

    return $total_reserved_guests + $guests <= $totalGuests;
}

function insertReservation($pdo, $name, $date, $time, $guests, $comments, $email)
{
    $query = "INSERT INTO reservations (name, date, time, guests, comments, email) VALUES (:name, :date, :time, :guests, :comments, :email)";
    $res = $pdo->prepare($query);
    $res->bindParam(":name", $name);
    $res->bindParam(":date", $date);
    $res->bindParam(":time", $time);
    $res->bindParam(":guests", $guests);
    $res->bindParam(":comments", $comments);
    $res->bindParam(":email", $email);
    $res->execute();
}