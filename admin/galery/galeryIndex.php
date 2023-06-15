<?php
    require_once('../../lib/session.php');
    require_once('../../lib/pdo.php');
    require_once ('../../templates/headerBootstrap.php');


    $errors = [];
    $messages = [];

    if(!isset($_SESSION['admin_id'])) {
        header('location: index.php');
    }


?>
<body class="bodyForm">
    <main>
        <?php include('../../lib/message.php'); ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h3>Galerie page d'accueil
                            <a href="../admin.php" class=" bttn btn float-end">Retour</a>
                            <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                        </h3>
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
                                                    <a href="galeryView.php?id=<?= $galery['id']; ?>" class="btn btn-info btn-sm">Consulter</a>
                                                    <a href="galeryEdit.php?id=<?= $galery['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                                    <form action="../../lib/galery.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_galery" value="<?=$galery['id']; ?>" class="btn-delete btn btn-danger btn-sm">Supprimer</a>
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
                        <a href="galeryCreate.php" class="bttn btn float-end">Ajouter un plat </a>
                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>

