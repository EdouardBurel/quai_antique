<?php
session_start();
require('dbcon.php');

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier horaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier horaire
                            <a href="index.php" class="btn btn-danger float-end">Retour</a>
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
                                <form action="code.php" method="POST">
                                    <input type='hidden' name="hour_id" value="<?= $hour['id']; ?>">
                                    <div class="mb-3">
                                        <label>Jour</label>
                                        <input type="text" name="day" value="<?= $hour['day']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Heure d'ouverture</label>
                                        <input type="text" name="lunch_hours" value="<?= $hour['lunch_hours']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Heure de fermeture</label>
                                        <input type="text" name="dinner_hours" value="<?= $hour['dinner_hours']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="text" name="status" value="<?= $hour['status']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_hour" class="btn btn-primary">Mettre à jour horaire</button>
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

