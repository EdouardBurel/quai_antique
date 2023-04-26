<?php
require 'dbcon.php';
require_once 'pdo.php';

# LOGIN CODE
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

 
    $select = $pdo->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select->execute([$email, $password]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
 
    if($select->rowCount() > 0){
 
       if($row['role'] == 'admin'){
 
          $_SESSION['admin_id'] = $row['id'];
          header('location:admin.php');
 
       }elseif($row['role'] == 'user'){
 
          $_SESSION['user_id'] = $row['id'];
          header('location:index.php');
 
       }else{
          $message[] = 'no user found!';
       }
       
    }else{
       $message[] = 'Incorrect email or password.';
    }
 
 }

# HOUR CODE-----------------------------------------------------

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

# MENU CARD CODE-----------------------------------------------------


if(isset($_POST['save_card']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
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

# GALLERY CODE-----------------------------------------------------

if(isset($_POST['delete_galery']))
{
    $galery_id = mysqli_real_escape_string($con, $_POST['delete_galery']);

    $query = "DELETE FROM galery WHERE id='$galery_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Plat supprimé";
        header("Location: /galeryIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: /galeryIndex.php");
        exit(0);
    }

}

# MENU CODE-----------------------------------------------------

if(isset($_POST['delete_menu']))
{
    $galery_id = mysqli_real_escape_string($con, $_POST['delete_menu']);

    $query = "DELETE FROM menu_card WHERE id='$galery_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Plat supprimé";
        header("Location: /menuIndex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: /menuIndex.php");
        exit(0);
    }

}

?>