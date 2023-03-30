<?php
require_once ('lib/tools.php');
require_once ('lib/config.php');
require_once('lib/category.php');
require_once('lib/card.php');


$pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');

session_start();

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
    $res = saveRecipe($pdo, $_POST['title'], $_POST['description'], $_POST['price'], $_POST['category_id'], $fileName);
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
  </head>
  <body>
    <div class="container mt-4">

        <?php include('admin/galery/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter un plat
                            <a href="index.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control"></input>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control"></input>
                            </div>
                            <div class="mb-3">
                                <label>Prix</label>
                                <input type="text" name="price" class="form-control"></input>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select name="category_id" id="category_id" class="form-select">

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
                                <button type="submit" name="save_card" class="btn btn-primary">Ajouter plat</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

