<?php
require_once('../../lib/pdo.php');
require_once ('../../templates/headerBootstrap.php');


?>
<body class="bodyForm">
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Détails de l'horaire
                                <a href="hourIndex.php" class="bttn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id']))
                            {
                                $hour_id = $_GET['id'];
                                $query = "SELECT * FROM restaurant_hours WHERE id = :hour_id";
                                $res = $pdo->prepare($query);
                                $res->bindParam(":hour_id", $hour_id);
                                $res->execute();

                                if ($res->rowCount() > 0) {
                                    $hour = $res->fetch(PDO::FETCH_ASSOC);
                            ?>            
                                        <div class="mb-3">
                                            <label>Jour</label>
                                            <p class="form-control">
                                                <?= $hour['day']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Heure du midi</label>
                                            <p class="form-control">
                                                <?= $hour['lunch_hours']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Heure du soir</label>
                                            <p class="form-control">
                                                <?= $hour['dinner_hours']; ?>
                                            </p>                                    
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <p class="form-control">
                                                <?= $hour['status']; ?>
                                            </p>
                                        </div>

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

