<?php
require_once('../../lib/session.php');
require_once ('../../lib/tools.php');
require_once ('../../lib/pdo.php');
require_once('../../lib/config.php');
require_once('../../lib/capacity.php');

$errors = [];
$messages = [];

if(isset($_POST['update_capacity']))
{
    $capacity_id = $_POST['capacity_id'];
    $totalGuests= (int)$_POST['totalGuests'];

    $res = updateCapacity($pdo, $capacity_id, $totalGuests);

    if ($res) {
        $messages[] = "Mise à jour réussie";
    } else {
        $errors[] = "Mise à jour échouée";
    }
}
?>

<!doctype html>
<html lang="fr" class="htmlForm">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier plat galerie</title>
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
    <?php include ('../../lib/message.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Modifier le nombre de convives
                                <a href="maxCapacity.php" class=" bttn btn float-end">Retour</a>
                                <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $capacity_id = $_GET['id'];
                                $query = "SELECT * FROM capacity WHERE id = :capacity_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":capacity_id", $capacity_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $capacity = $res->fetch(PDO::FETCH_ASSOC);
                                    ?>             
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type='hidden' name="capacity_id" value="<?= $capacity['id']; ?>">
                                        <div class="mb-3">
                                            <label>Nombre de convives maximum</label>
                                            <input type="number" name="totalGuests" value="<?= $capacity['totalGuests']; ?>" class="form-control" min=1>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="update_capacity" class="bttn btn">Mettre à jour</button>
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
    </main>
    <?php require_once('../../templates/footer.php') ;?>