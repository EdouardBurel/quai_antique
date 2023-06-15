<?php
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/code.php');

    $errors = [];
    $messages = [];
    
    if (isset($_POST['addUser'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email=$_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $numberPeople = $_POST['numberPeople'];
        $comments = $_POST['comments'];
    
        $result = addUser($pdo, $first_name, $last_name, $email, $password, $numberPeople, $comments);
    
        $errors = $result['errors'];
        $messages = $result['messages'];
    }

?>
<!doctype html>
   <html lang="fr" class="htmlForm">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>S'inscrire</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/styles.css">
   </head>
   <body class="bodyForm">
    <main>
    <?php include ('lib/message.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h3>Inscription
                           <a href="index.php" class=" bttn btn float-end">Retour</a>
                        </h3>
                     </div>
                     <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="mb-3">
                                <label for="first_name">Prénom</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                           </div>

                           <div class="mb-3">
                                <label for="last_name">Nom</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                           </div>

                           <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="numberPeople">Nombre de convives par défaut</label>
                                <input type="number" name="numberPeople" id="numberPeople" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="comments">Mention des allergies</label>
                                <input type="text" name="comments" id="comments" class="form-control">
                            </div>
                            <div class="mb-3">
                              <button type="submit" name="addUser" class="bttn btn">S'inscrire</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php require_once('templates/footer.php') ;?>
