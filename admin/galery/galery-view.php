<?php
require('dbcon.php');

define('_RECIPES_IMG_PATH_', '/uploads/card-img/');
define('_ASSETS_IMG_PATH_', '/assets/images/');

function getRecipeImage(string|null $image) {
    if ($image === null) {
        return _ASSETS_IMG_PATH_.'recipe_default.jpg';
    } else {
        return _RECIPES_IMG_PATH_.$image;
    }
  }

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'horaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Détails du plat
                            <a href="index.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $hour_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM galery WHERE id='$hour_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $hour = mysqli_fetch_array($query_run);
                                ?>             
                                    <div class="mb-3">
                                        <label>Titre</label>
                                        <p class="form-control">
                                            <?= $hour['title']; ?>
                                        </p>
                                    </div>
                
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <p class="form-control">
                                            <?= $hour['image']; ?>
                                        </p>
                                    </div>
                                    <img src="<?=getRecipeImage($hour['image']); ?>" alt="<?= $hour['title'];?>" class="img">


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
  </body>

  <style>
    .img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  height: 30%;
  width: 30%;
}


  </style>
</html>

