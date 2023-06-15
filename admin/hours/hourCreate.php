<?php
require_once ('../../lib/pdo.php');
require_once ('../../templates/headerBootstrap.php');

$errors = [];
$messages = [];

?>

<body class="bodyForm">
    <main>
        <?php include('../../lib/message.php'); ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ajouter un horaire
                                <a href="hourIndex.php" class="bttn btn float-end">Retour</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="../../lib/hour.php" method="POST">
                                <div class="mb-3">
                                    <label>Jour de la semaine</label>
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
                                    <label>Définir heures d'ouverture midi (HH:MM)</label>
                                    <input type="text" name="lunch_hours" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Définir heures d'ouverture soir (HH:MM)</label>
                                    <input type="text" name="dinner_hours" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select type="text" name="status" class="form-select" required>
                                        <option>---</option>
                                        <option>Ouvert</option>
                                        <option>Fermé</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save_hour" class="bttn btn">Ajouter horaire</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  <?php require_once('../../templates/footer.php') ;?>

