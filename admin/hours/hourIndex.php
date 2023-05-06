<?php
    require_once('../../lib/pdo.php');
    $errors = [];
    $messages = [];

?>
<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Hours</title>
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
            <?php include('../../lib/message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h3>Horaires Restaurant
                            <a href="/admin.php" class=" bttn btn float-end">Retour</a>
                            <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                        </h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jour</th>
                                    <th>Heure du midi</th>
                                    <th>Heure du soir</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = 'SELECT * FROM restaurant_hours';
                                    $res = $pdo->query($query);

                                    if($res->rowCount() > 0) {
                                        while($hour = $res->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $hour['day']; ?> </td>
                                        <td><?= $hour['lunch_hours']; ?> </td>
                                        <td ><?= $hour['dinner_hours']; ?> </td>
                                        <td><?= $hour['status']; ?> </td>
                                        <td>
                                            <a href="hourView.php?id=<?= $hour['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="hourEdit.php?id=<?= $hour['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="../../lib/code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_hour" value="<?=$hour['id']; ?>" class="btn-delete btn btn-danger btn-sm">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record found </h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="hourCreate.php" class="bttn btn btn-primary float-end">Ajouter horaire </a>
                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>

