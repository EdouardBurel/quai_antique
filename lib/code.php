<?php
require_once ('dbcon.php');
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

// UPDATE

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

# MENU CARD CODE-----------------------------------------------------

// ADD A MENU CARD IN MENUS PAGE
if (isset($_POST['save_card'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

if (!$errors) {
    $res = saveCard($pdo, $_POST['title'], $_POST['description'], $_POST['price'], $_POST['category_id'], $fileName);

    if ($res) {;
        $messages[] = 'Le plat a bien été ajouté';
    } else {
        $errors[] = "Une erreur s\'est produite.";
    }
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