<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_hour']))
{
    $hour_id = mysqli_real_escape_string($con, $_POST['delete_hour']);

    $query = "DELETE FROM restaurant_hours WHERE id='$hour_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Horaire supprimé";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['update_hour']))
{
    $hour_id = mysqli_real_escape_string($con, $_POST['hour_id']);

    $day = mysqli_real_escape_string($con, $_POST['day']);
    $lunch_hours = mysqli_real_escape_string($con, $_POST['lunch_hours']);
    $dinner_hours = mysqli_real_escape_string($con, $_POST['dinner_hours']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE restaurant_hours SET day='$day', lunch_hours='$lunch_hours', dinner_hours='$dinner_hours', status='$status'
                WHERE id='$hour_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Horaire modifié";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['save_hour']))
{
    $day = mysqli_real_escape_string($con, $_POST['day']);
    $lunch_hours = mysqli_real_escape_string($con, $_POST['lunch_hours']);
    $dinner_hours = mysqli_real_escape_string($con, $_POST['dinner_hours']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "INSERT INTO restaurant_hours (day, lunch_hours, dinner_hours, status) VALUES
    ('$day', '$lunch_hours', '$dinner_hours', '$status')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Horaire ajouté";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite";
        header("Location: student-create.php");
        exit(0);
    }

}

?>