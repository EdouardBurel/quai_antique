<?php
session_start();
require 'dbcon.php';


if(isset($_POST['delete_galery']))
{
    $hour_id = mysqli_real_escape_string($con, $_POST['delete_galery']);

    $query = "DELETE FROM galery WHERE id='$hour_id' ";
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

if(isset($_POST['update_galery']))
{
    $hour_id = mysqli_real_escape_string($con, $_POST['hour_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $image = mysqli_real_escape_string($con, $_POST['file']);

    $query = "UPDATE galery SET title='$title', image='$image'
                WHERE id='$hour_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Le plat a bien été modifié.";
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