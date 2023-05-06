<?php
require_once ('lib/tools.php');
require_once ('lib/config.php');
require_once('lib/category.php');
require_once('lib/card.php');
require_once('lib/session.php');
require_once ('lib/pdo.php');


$categories = getCategories($pdo);

$errors = [];
$messages = [];

if (isset($_POST['save_galery'])) {
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
    $res = saveGalery($pdo, $_POST['title'], $fileName);

    if ($res) {;
        $messages[] = 'Le plat a bien été ajouté'; 
    } else {
        $errors[] = "Une erreur s\'est produite.";
    }
}
}


?>

<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un plat</title>
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
        <?php include ('lib/message.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ajouter une image à la galerie
                                <a href="galeryIndex.php" class=" bttn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Image</label>
                                    <input type="file" name="file" id="file" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_galery" class=" bttn btn btn-primary">Ajouter le plat à la galerie</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('templates/footer.php') ;?>

