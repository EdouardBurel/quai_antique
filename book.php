<?php
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');

    // SECURE ACCESS TO BOOK PAGE FOR USER
    if(!isset($_SESSION['user_id'])) {
        header('location: user/login.php');
    }

    $errors = [];
    $messages = [];

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guests = $_POST['guests'];
        $comments = $_POST['comments'];
      
        // Check if the selected date has availability
        $query = "SELECT SUM(guests) as total_guests FROM reservations WHERE date=:date";
        $res = $pdo->prepare($query);
        $res->bindParam(":date", $date);
        $res->execute();
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $total_guests = $row['total_guests'];
      
        if($total_guests + $guests <= 30) {
      
          // Insert the reservation into the database
          $query = "INSERT INTO reservations (name, date, time, guests, comments) VALUES (:name, :date, :time, :guests, :comments)";
          $res = $pdo->prepare($query);
          $res->bindParam(":name", $name);
          $res->bindParam(":date", $date);
          $res->bindParam(":time", $time);
          $res->bindParam(":guests", $guests);
          $res->bindParam(":comments", $comments);
          $res->execute();
      
          // Show a success message
         $messages[] = "Merci pour votre réservation";
      
        } else {
          // Show an error message
          echo "<script>alert('Notre restaurant est complet ce jour-ci. Nous vous remercions de bien vouloir choisir une autre date.');</script>";
      
        }
      }
    
    ?>
<!doctype html>
   <html lang="fr" class="htmlForm">
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
    <body class="bodyForm">
        <main>
        <?php require_once ('lib/message.php'); ?>
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
                            $id = (int)$_SESSION['user_id'];
                            $query = "SELECT * FROM users WHERE id = ?";
                            $res = $pdo->prepare($query);
                            $res->execute([$id]);

                            $user = $res->fetch(PDO::FETCH_ASSOC);

                            $reservationName = (string)$user['first_name'];
                            $NumberPeople = (int)$user['Number_People'];
                            $commentUser = (string) $user['Comments'];


                            echo <<<HTML
                            <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="$id">
                            <div class="mb-3">
                                <label for="name">Nom de réservation</label>
                                <input type="text" name="name" id="name" value="$reservationName" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                    <label for="guests">Nombre de couverts</label>
                                    <input type="number" name="guests" id="guests" value="$NumberPeople" min="1" max="30" class="form-control" required>
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
                                    <button type="submit" name="submit" class="bttn btn">Réserver</button>
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
    <?php require_once ('templates/footer.php'); ?>
