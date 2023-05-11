<?php
    require_once('../../lib/session.php');
    require_once('../../lib/pdo.php');

    $errors = [];
    $messages = [];
    // SECURE PAGE IF NOT ADMIN CONNECTED
    if(!isset($_SESSION['admin_id'])) {
        header('location: index.php');
    }
?>
<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion du menu</title>
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
        <?php include('../../lib/message.php'); ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Galerie Menus
                                <a href="../admin.php" class=" bttn btn float-end">Retour</a>
                                <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = 'SELECT * FROM menu_card';
                                        $res = $pdo->prepare($query);
                                        $res->execute();

                                        if ($res->rowCount() > 0) {
                                            while ($menu = $res->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?= $menu['title']; ?> </td>
                                            <td ><?= $menu['description']; ?> </td>
                                            <td ><?= $menu['price']; ?>€ </td>
                                            <td>
                                                <a href="menuView.php?id=<?= $menu['id']; ?>" class="viewBtn btn btn-info btn-sm">Consulter</a>
                                                <form action="../../lib/menuCard.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_menu" value="<?=$menu['id']; ?>" class="btn-delete btn btn-danger btn-sm">Supprimer</a>
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
                            <a href="menuCreate.php" class="bttn btn btn-primary float-end">Ajouter un plat menu </a>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>
