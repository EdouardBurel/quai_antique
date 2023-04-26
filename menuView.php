<?php
require('lib/pdo.php');
require_once('lib/config.php');
require_once('lib/category.php');
require_once('lib/card.php');

$categories = getCategories($pdo);

$errors = [];
$messages = [];

?>

<!doctype html>
<html lang="fr">
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
  </head>
  <body>
    <div class="container mt-4">

        <?php include('lib/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Détails du plat menu
                            <a href="menuIndex.php" class="bttn btn btn float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $galery_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM menu_card WHERE id='$galery_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $menu = mysqli_fetch_array($query_run);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    .img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    height: 30%;
    width: 30%;
    }
  </style>
  </body>
</html>