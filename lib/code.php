<?php
require_once ('pdo.php');
require_once ('tools.php');
require_once ('config.php');

# INSCRIPTION CODE
function addUser($pdo, $first_name, $last_name, $email, $password, $numberPeople, $comments)
{
    $errors = [];
    $messages = [];

    $query = $pdo->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`,`role`,`Number_People`, `Comments` ) VALUES (:first_name, :last_name, :email, :password, :role, :numberPeople, :comments)");

    $role = 'user';
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->bindParam(':numberPeople', $numberPeople, PDO::PARAM_INT);
    $query->bindParam(':comments', $comments, PDO::PARAM_STR);

    $res = $query->execute();

    if ($res) {
        $messages[] = "Merci pour votre inscription";
    } else {
        $errors[] = "Inscription échouée";
    }

    return ['errors' => $errors, 'messages' => $messages];
}



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