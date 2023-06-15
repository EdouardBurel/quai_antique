<?php
    require_once('../../lib/session.php');
    require_once('../../lib/pdo.php');
    require_once('../../lib/capacity.php');
    require_once ('../../templates/headerBootstrap.php');


    // SECURE PAGE IF NOT ADMIN CONNECTED
    if(!isset($_SESSION['admin_id'])) {
        header('location: index.php');
    }
?>
<body class="bodyForm">
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestion nombre de convives
                                <a href="../admin.php" class=" bttn btn float-end">Retour</a>
                                <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre de convives maximum</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = 'SELECT * FROM capacity';
                                        $res = $pdo->prepare($query);
                                        $res->execute();

                                        if ($res->rowCount() > 0) {
                                            while ($capacity = $res->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?= $capacity['totalGuests']; ?> </td>
                                            <td>
                                            <a href="capacityEdit.php?id=<?= $capacity['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
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
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>

