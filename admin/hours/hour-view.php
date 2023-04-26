<?php
require_once('../../lib/pdo.php');

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'horaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">

  </head>
  <body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Détails de l'horaire
                            <a href="index.php" class="bttn btn float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $hour_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM restaurant_hours WHERE id='$hour_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $hour = mysqli_fetch_array($query_run);
                                ?>             
                                    <div class="mb-3">
                                        <label>Jour</label>
                                        <p class="form-control">
                                            <?= $hour['day']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Heure d'ouverture</label>
                                        <p class="form-control">
                                            <?= $hour['lunch_hours']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Heure de fermeture</label>
                                        <p class="form-control">
                                            <?= $hour['dinner_hours']; ?>
                                        </p>                                    
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <p class="form-control">
                                            <?= $hour['status']; ?>
                                        </p>
                                    </div>

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

    .card-body p{
        font-family: 'Poppins', sans-serif;
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

