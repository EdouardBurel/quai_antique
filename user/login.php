<?php
    require_once('../lib/session.php');
    require_once ('../lib/config.php');
    require_once ('../lib/pdo.php');

    $errors = [];
    $messages = [];

    if(isset($_POST['submit'])){
      $email= $_POST['email'];
      $password = $_POST['password'];

      $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
      $query->bindValue('email', $email);
      $query->execute();
      $res = $query->fetch(PDO::FETCH_ASSOC);

      if ($res) {
         $passwordHash = $res['password'];
         if (password_verify($password, $passwordHash)) {
            $messages[] = "Connexion réussie";
         } else {
            $errors[] = 'Email ou mot de passe incorect.';
         }

         if($res['role'] == 'admin'){
     
            $_SESSION['admin_id'] = $res['id'];
            header('location:/admin/admin.php');
   
         }elseif($res['role'] == 'user'){
   
            $_SESSION['user_id'] = $res['id'];
            header('location:/book.php');

         }
      }
   }
?>
<!doctype html>
   <html lang="fr" class="htmlForm">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Se connecter</title>
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
    <?php include ('../lib/message.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h3>Connexion
                           <a href="/index.php" class=" bttn btn float-end">Retour</a>
                        </h3>
                     </div>
                     <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" required name="email" class="box form-control">
                           </div>

                           <div class="mb-3">
                              <label for="password" class="form-label">Mot de passe</label>
                              <input type="password" name="password" class="form-control">
                           </div>
                           <div class="mb-3">
                              <button type="submit" name="submit" class="bttn btn">Connexion</button>
                           </div>
                           <span style="padding: 1rem; display:block">Vous n'avez pas encore un compte ?
                           <a href="/inscription.php" style="color: #0f4454; text-decoration: underline">Inscription</a> 
                        </span>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php require_once('../templates/footer.php') ;?>