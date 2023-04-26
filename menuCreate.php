<?php
require_once ('lib/tools.php');
require_once ('lib/config.php');
require_once('lib/category.php');
require_once('lib/card.php');
require_once('lib/pdo.php');

$categories = getCategories($pdo);

$errors = [];
$messages = [];
$card = [
    'title' => '',
    'description' => '',
    'price' => '',
    'category_id' => '',
];

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


?>

<!doctype html>
<html lang="en">
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
  </head>
  <body>
    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Merci admin!</strong><?=$message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa fa-times-circle"></i>
            <?=$error; ?>
        </div>
    <?php } ?>

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter un plat
                            <a href="admin.php" class=" bttn btn float-end">Retour</a>
                            <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control" required></input>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" required></input>
                            </div>
                            <div class="mb-3">
                                <label>Prix</label>
                                <input type="text" name="price" class="form-control" required></input>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select name="category_id" id="category_id" class="form-select" required>

                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?=$category['id']; ?>" <?php if ($card['category_id'] == $category['id']) { echo 'selected="selected"'; } ?>><?=$category['name'];?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Image</label>
                                <input type="file" name="file" id="file">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_card" class=" bttn btn btn-primary">Ajouter plat</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>

  <style>
    body{
        background-color: #cab5a7;
    }

    .card-header{
        background-color: #05263b;
        font-family: 'Cinzel', serif;
        color: #fcf8f5;
    }
    .card-body{
        background-color: #fcf8f5;
        font-family: 'Bree Serif', serif;
    }

    .bttn {
        background-color: #0f4454;
        color: #fcf8f5;
        font-family: 'Cinzel', serif;
        margin: 0.5rem;
    }

    .bttn:hover{
    background-color: #cab5a7;
    color:#0f4454;
}
  </style>
</html>

