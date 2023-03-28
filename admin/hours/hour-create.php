<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Exercice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter un horaire
                            <a href="index.php" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Choisir jour</label>
                                <select type="text" name="day" class="form-select">
                                    <option>---</option>
                                    <option>Lundi</option>
                                    <option>Mardi</option>
                                    <option>Mercredi</option>
                                    <option>Jeudi</option>
                                    <option>Vendredi</option>
                                    <option>Samedi</option>
                                    <option>Dimanche</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Définir heure d'ouverture (HH:MM)</label>
                                <input type="text" name="lunch_hours" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Définir heure de fermeture (HH:MM)</label>
                                <input type="text" name="dinner_hours" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select type="text" name="status" class="form-select">
                                    <option>---</option>
                                    <option>Ouvert</option>
                                    <option>Fermé</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_hour" class="btn btn-primary">Ajouter horaire</button>
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

