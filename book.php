<?php
require_once('lib/session.php');
require_once('lib/config.php');
require_once('lib/bookCode.php');
require_once('lib/pdo.php');
require_once('templates/headerBootstrap.php');
require_once('lib/capacity.php');

$errors = [];
$messages = [];

if (isset($_POST['submitReservation'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $comments = $_POST['comments'];

    if (checkAvailability($pdo, $date, $guests)) {
        insertReservation($pdo, $name, $date, $time, $guests, $comments, $email);
        $messages[] = "Merci pour votre réservation";
    } else {
        $errors[] = "Notre restaurant est complet ce jour-ci. Nous vous remercions de bien vouloir choisir une autre date.";
    }
}
?>

<body class="bodyForm">
    <main>
        <?php require_once('lib/message.php'); ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h3>Réservation
                                <a href="index.php" class=" bttn btn float-end">Accueil</a>
                            </h3>
                        </div>

                        <div class="card-body">
                            <?php

                            $query = "SELECT totalGuests FROM capacity";
                            $res = $pdo->query($query);
                            $totalGuests = $res->fetchColumn();

                            if (!isset($_SESSION['user_id'])) {
                                $id = '';
                                $reservationName = '';
                                $NumberPeople = '';
                                $commentUser = '';
                                $email = '';
                            } else {
                                $id = (int)$_SESSION['user_id'];
                                $query = "SELECT * FROM users WHERE id = ?";
                                $res = $pdo->prepare($query);
                                $res->execute([$id]);

                                $user = $res->fetch(PDO::FETCH_ASSOC);

                                $reservationName = (string)$user['first_name'];
                                $NumberPeople = (int)$user['Number_People'];
                                $commentUser = (string)$user['Comments'];
                                $email = (string)$user['email'];
                            }

                            echo <<<HTML
                            <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="$id">
                            <div class="mb-3">
                                <label for="name">Nom de réservation</label>
                                <input type="text" name="name" id="name" value="$reservationName" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="$email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                    <label for="guests">Nombre de couverts</label>
                                    <input type="number" name="guests" id="guests" value="$NumberPeople" min="1" max="$totalGuests" class="form-control" required>
                            </div>
                            

                            <div class="mb-3">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                            HTML;
                            ?>

                            <?php
                            echo <<<HTML
                                <div class="mb-3" id="sub_meal">
                                    <label for="time">Heure de réservation </label>
                                    <select type="time" id="time" name="time" class="form-control" required>
                                        <option disabled>MIDI</option>
                                        <option type="time">12:00</option>
                                        <option type="time">12:15</option>
                                        <option type="time">12:30</option>
                                        <option type="time">12:45</option>
                                        <option type="time">13:00</option>
                                        <option type="time">13:15</option>
                                        <option type="time">13:30</option>
                                        <option disabled>SOIR</option>
                                        <option type="time">19:00</option>
                                        <option type="time">19:15</option>
                                        <option type="time">19:30</option>
                                        <option type="time">19:45</option>
                                        <option type="time">20:00</option>
                                        <option type="time">20:15</option>
                                        <option type="time">20:30</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="comments">Mention des allergies / Commentaires</label>
                                    <input type="text" name="comments" id="comments" value="$commentUser" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="submitReservation" class="bttn btn">Réserver la table</button>
                                </div>
                            </form>
                            HTML;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('templates/footer.php'); ?>