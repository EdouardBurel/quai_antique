<?php

require_once ('lib/pdo.php');

if(isset($_POST['submit'])) {

    // Sanitize the user inputs
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
  
    // Check if the selected date has availability
    $query = "SELECT SUM(guests) as total_guests FROM reservations WHERE date=:date";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":date", $date);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_guests = $row['total_guests'];
  
    if($total_guests + $guests <= 40) {
  
      // Insert the reservation into the database
      $query = "INSERT INTO reservations (name, date, time, guests) VALUES (:name, :date, :time, :guests)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":date", $date);
      $stmt->bindParam(":time", $time);
      $stmt->bindParam(":guests", $guests);
      $stmt->execute();
  
      // Show a success message
      echo "<script>alert('Your reservation has been confirmed.');</script>";
  
    } else {
  
      // Show an error message
      echo "<script>alert('Sorry, there is no availability on this date. Please choose another date.');</script>";
  
    }
  
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Book</title>
</head>
<body>
    <form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="date">Date:</label>
    <input type="date" name="date" required><br>

    <label for="time">Time:</label>
    <input type="time" name="time" required><br>

    <label for="guests">Number of guests:</label>
    <input type="number" name="guests" min="1" max="40" required><br>

    <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html>