<?php
require_once ('pdo.php');

// DELETE AN HOUR

if(isset($_POST['delete_hour']))
{
    $hour_id = $_POST['delete_hour'];

    $query = "DELETE FROM restaurant_hours WHERE id=:hour_id";
    $res = $pdo->prepare($query);
    $res->bindParam(':hour_id', $hour_id);
    $res->execute();

    if($res)
    {
        $_SESSION['message'] = "Horaire supprimé";
        header("Location: /admin/hours/hourIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: /admin/hours/hourIndex.php");
        exit(0);
    }

}

// UPDATE AN HOUR

if(isset($_POST['update_hour']))
{
    $hour_id = $_POST['hour_id'];

    $day = $_POST['day'];
    $lunch_hours = $_POST['lunch_hours'];
    $dinner_hours = $_POST['dinner_hours'];
    $status = $_POST['status'];

    $query = "UPDATE restaurant_hours SET day=:day, lunch_hours=:lunch_hours, dinner_hours=:dinner_hours, status=:status WHERE id=:hour_id";
    $res = $pdo->prepare($query);
    $res->execute([
        'hour_id' => $hour_id,
        'day' => $day,
        'lunch_hours' => $lunch_hours,
        'dinner_hours' => $dinner_hours,
        'status' => $status
    ]);

    if($res)
    {
        $_SESSION['message'] = "Horaire modifié";
        header("Location: /admin/hours/hourIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite";
        header("Location: /admin/hours/hourIndex.php");
        exit(0);
    }
}

// ADD AN HOUR

if(isset($_POST['save_hour']))
{
    $day = $_POST['day'];
    $lunch_hours = $_POST['lunch_hours'];
    $dinner_hours = $_POST['dinner_hours'];
    $status = $_POST['status'];

    $query = "INSERT INTO restaurant_hours (day, lunch_hours, dinner_hours, status) VALUES (:day, :lunch_hours, :dinner_hours, :status)";

    $res = $pdo->prepare($query);
    $res->execute([
        'day' => $day,
        'lunch_hours' => $lunch_hours,
        'dinner_hours' => $dinner_hours,
        'status' => $status
    ]);
    if ($res) {;
        $messages[] = "L'horaire a bien été ajouté"; header("Location: /admin/hours/hourIndex.php");
        exit(0);
    } else {
        $errors[] = "Une erreur s\'est produite."; header("Location: /admin/hours/hourIndex.php");
        exit(0);
    }
}