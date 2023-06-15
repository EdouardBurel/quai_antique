<?php
require_once ('pdo.php');
require_once ('tools.php');
require_once ('config.php');

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
          header('location:admin/admin.php');
 
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

# GALLERY CODE-----------------------------------------------------

if(isset($_POST['delete_galery']))
{
    $galery_id = $_POST['delete_galery'];

    $query = "DELETE FROM galery WHERE id=:galery_id";
    $res = $pdo->prepare($query);
    $res->bindParam(':galery_id', $galery_id);
    $res->execute();

    if($res)
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




?>