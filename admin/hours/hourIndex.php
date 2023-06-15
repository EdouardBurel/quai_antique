<?php
    require_once('../../lib/pdo.php');
    require_once ('../../templates/headerBootstrap.php');

    $errors = [];
    $messages = [];

?>
<body class="bodyForm">
    <main>
        <div class="container mt-4">
            <?php include('../../lib/message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h3>Horaires Restaurant
                            <a href="../admin.php" class=" bttn btn float-end">Retour</a>
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
                                            <a href="hourEdit.php?id=<?= $hour['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                            <form action="../../lib/hour.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_hour" value="<?=$hour['id']; ?>" class="btn-delete btn btn-danger btn-sm">Supprimer</a>
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
                        <a href="hourCreate.php" class="bttn btn float-end">Ajouter horaire </a>
                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('../../templates/footer.php') ;?>

