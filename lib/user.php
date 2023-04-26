<?php
function addBooking(PDO $pdo, string $reservation_name, int $number_people, string $reservation_date, string $hour_lunch, string $comments) {
    $sql = "INSERT INTO `table_booking` (`reservation_name`, `number_people`, `reservation_date`,`hour_lunch`, `comments`) VALUES (:reservation_name, :number_people, :reservation_date, :hour_lunch, :comments);";
    $query = $pdo->prepare($sql);

    $query->bindParam(':reservation_name', $reservation_name, PDO::PARAM_STR);
    $query->bindParam(':number_people', $number_people, PDO::PARAM_INT);
    $query->bindParam(':reservation_date', $reservation_date, PDO::PARAM_STR);
    $query->bindParam(':hour_lunch', $hour_lunch, PDO::PARAM_STR);
    $query->bindParam(':comments', $comments, PDO::PARAM_STR);
    
    return $query->execute();
};