<?php
session_start();
require_once('lib/dbcon.php');

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
    <title>Modifier galerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">

        <?php include('lib/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier galerie
                            <a href="admin.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $galery_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM galery WHERE id='$galery_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $hours = mysqli_fetch_array($query_run);
                                ?>             
                                <form action="lib/code.php" method="POST">
                                    <input type='hidden' name="galery_id" value="<?= $hours['id']; ?>">
                                    <div class="mb-3">
                                        <label>Titre</label>
                                        <input type="text" name="title" value="<?= $hours['title']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" value="<?= $hours['image']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_galery" class="btn btn-primary">Mettre à jour galerie</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

