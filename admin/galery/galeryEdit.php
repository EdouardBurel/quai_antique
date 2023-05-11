<?php
require_once('../../lib/session.php');
require_once ('../../lib/tools.php');
require('../../lib/pdo.php');
require_once('../../lib/config.php');
require_once('../../lib/menuCard.php');

$errors = [];
$messages = [];

if(isset($_POST['update_galery']))
{
    $galery_id = $_POST['galery_id'];
    $title= $_POST['title'];

    $old_image = $_POST['image'];

    $query= "UPDATE galery SET title=:title WHERE id=:galery_id";
    $res = $pdo->prepare($query);
    $res->bindParam(":title", $title);
    $res->bindParam(":galery_id", $galery_id);
    $res->execute();


    if ($_FILES['new_img']['error'] == 0)
    {
        $filename = uniqid() . '_' . $_FILES['new_img']['name'];
        move_uploaded_file($_FILES['new_img']['tmp_name'], '../../uploads/card-img/'.$filename);
        $query= "UPDATE galery SET title=:title, image=:filename WHERE id=:galery_id";

        $res = $pdo->prepare($query);
        $res->bindParam(":title", $title);
        $res->bindParam(":filename", $filename);
        $res->bindParam(":galery_id", $galery_id);
        $res->execute();

        if($res)
        {
            if($_FILES['new_img']['name'] !='')
            {
                move_uploaded_file($_FILES['new_img']['tmp_name'], '../../uploads/card-img/'.$filename);
                unlink("uploads/card-img/".$old_image);
                header('location: galeryIndex.php');
            }
    }   
    }

    if ($res) {
        $messages[] = "Mise à jour réussie";
    } else {
        $errors[] = "Mise à jour échouée";
    }

}

?>

<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier plat galerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
  </head>
  <body class="bodyForm">
    <main>
    <?php include ('../../lib/message.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Modifier plat galerie
                                <a href="galeryIndex.php" class=" bttn btn float-end">Retour</a>
                                <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $galery_id = $_GET['id'];
                                $query = "SELECT * FROM galery WHERE id = :galery_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":galery_id", $galery_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $galery = $res->fetch(PDO::FETCH_ASSOC);
                                    ?>             
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type='hidden' name="galery_id" value="<?= $galery['id']; ?>">
                                        <div class="mb-3">
                                            <label>Titre</label>
                                            <input type="text" name="title" value="<?= $galery['title']; ?>" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input type="hidden" name="image" value="<?= $galery['image']; ?>" class="form-control">
                                        </div>

                                        <img src="<?=getRecipeImage($galery['image']); ?>" alt="<?= $galery['title'];?>" class="img">

                                        <div class="mb-3">
                                            <label for="file" class="form-label">Image</label>
                                            <input type="file" name="new_img" id="file">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="update_galery" class="bttn btn btn-primary">Mettre à jour le plat</button>
                                        </div>

                                    </form>

                                    <?php
                                }
                                else
                                {
                                echo "<h4> No such Id found</h4>"; 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>