<?php
    require_once ('lib/user.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');

    if(!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }

    $errors = [];
    $messages = [];

    if (isset($_POST['bookTable'])) {
        $res = addBooking($pdo, $_POST['reservation_name'], $_POST['number_people'], $_POST['reservation_date'], $_POST['hour_lunch'], $_POST['comments']);

        if ($res) {;
            $messages[] = 'Merci pour votre réservation.';
        } else {
            $errors[] = "Une erreur s\'est produite lors de votre réservation";
        }
 
    }
    ?>
<!doctype html>
   <html lang="fr" class="htmlBook">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Réserver une table</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <link rel="stylesheet" href="assets/css/styles.css">
   </head>
    <body class="bodyBook">
        <main>
        <?php require_once ('lib/message.php'); ?>
         <div class="container mt-4">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">

                     <div class="card-header">
                        <h4>Réservation
                           <a href="user-page.php" class=" bttn btn float-end">Retour</a>
                           <a href="index.php" class=" bttn btn float-end">Accueil</a>
                        </h4>
                     </div>

                     <div class="card-body">
                            <?php
                            $id = (int)$_SESSION['user_id'];
                            $query = "SELECT * FROM users WHERE id = ?";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$id]);

                            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                            $name = (string)$user['first_name'];
                            $NumberPeople = (int)$user['Number_People'];
                            $comments = (string) $user['Comments'];


                            echo <<<HTML
                            <form action= "" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="$id">
                            <div class="mb-3">
                                <label for="reservation_name">Nom de réservation</label>
                                <input type="text" name="reservation_name" id="reservation_name" value="$name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                    <label for="number_people">Nombre de couverts</label>
                                    <input type="number" name="number_people" id="number_people" value="$NumberPeople" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                    <label for="date">Date</label>
                                    <input type="date" name="reservation_date" id="reservation_date" class="form-control" required>
                                </div>
                            HTML;
                            ?>

                                <?php
                                echo <<<HTML
                                <div class="mb-3" id="sub_meal">
                                    <label for="hour_lunch">Heure de réservation </label>
                                    <select type="time" id="hour_lunch" name="hour_lunch" class="form-control" required>
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
                                    <input type="text" name="comments" id="comments" value="$comments" class="form-control">
                                </div>

                            <input type="submit" value="Réserver" name="bookTable" class="bttn btn">
                            </form>
                            HTML;
                            ?>
                     </div>            
                  </div>       
               </div>
            </div>
         </div>
    </main>
    <?php require_once ('templates/footer.php'); ?>
