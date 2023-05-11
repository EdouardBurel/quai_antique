<?php
require('../../lib/pdo.php');
require_once('../../lib/config.php');
require_once('../../lib/category.php');
require_once('../../lib/menuCard.php');

$categories = getCategories($pdo);

?>

<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du plat menu</title>
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
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Détails du plat menu
                                <a href="menuIndex.php" class="bttn btn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $galery_id = $_GET['id'];
                                $query = "SELECT * FROM menu_card WHERE id = :galery_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":galery_id", $galery_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $menu = $res->fetch(PDO::FETCH_ASSOC);
                                    ?>             
                                        <div class="mb-3">
                                            <label>Titre</label>
                                            <p class="form-control">
                                                <?= $menu['title']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <p class="form-control">
                                                <?= $menu['description']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Prix</label>
                                            <p class="form-control">
                                                <?= $menu['price'];?>€
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Catégorie</label>
                                            <p class="form-control">
                                            <?php foreach ($categories as $category) { ?>
                                                <?php if ($menu['category_id'] == $category['id']) { echo $category['name']; } }?>
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <label>Image</label>
                                        </div>
                                        <img src="<?=getRecipeImage($menu['image']); ?>" alt="<?= $menu['title'];?>" class="img">

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