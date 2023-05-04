<?php
    require_once('lib/session.php');
    require_once('lib/pdo.php');

    $errors = [];
    $messages = [];

    if(!isset($_SESSION['admin_id'])) {
        header('location: index.php');
    }


?>
<!doctype html>
<html lang="fr">
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
  </head>
  <body>

    <div class="container mt-4">

        <?php include('lib/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4>Galerie page d'accueil
                        <a href="admin.php" class=" bttn btn float-end">Retour</a>
                        <a href="index.php" class=" bttn btn float-end">Accueil</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = 'SELECT * FROM galery';
                                $res = $pdo->prepare($query);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    while ($galery = $res->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                        <tr>
                                            <td><?= $galery['id']; ?> </td>
                                            <td><?= $galery['title']; ?> </td>
                                            <td ><?= $galery['image']; ?> </td>
                                            <td>
                                                <a href="galeryView.php?id=<?= $galery['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="galeryEdit.php?id=<?= $galery['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="lib/code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_galery" value="<?=$galery['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                            <?php

                                    }
                                }
                                else
                                {
                                    echo "<h5> No Record found </h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="galeryCreate.php" class="bttn btn btn-primary float-end">Ajouter un plat </a>
                </div>
                        
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
  </style>
  </body>
</html>

