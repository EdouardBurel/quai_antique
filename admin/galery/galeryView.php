<?php
require('../../lib/pdo.php');
require_once('../../lib/config.php');
require_once('../../lib/menuCard.php');
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
                            <h3>Détails du plat galerie
                                <a href="galeryIndex.php" class="bttn btn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $galery_id = $_GET['id'];
                                $query = "SELECT * FROM galery WHERE id = :galery_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":galery_id", $galery_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $galery = $res->fetch(PDO::FETCH_ASSOC);
                                    ?>             
                                        <div class="mb-3">
                                            <label>Titre</label>
                                            <p class="form-control">
                                                <?= $galery['title']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <p type="hidden" class="form-control">
                                                <?= $galery['image']; ?>
                                            </p>
                                        </div>
                                        <img src="<?=getRecipeImage($galery['image']); ?>" alt="<?= $galery['title'];?>" class="img">

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