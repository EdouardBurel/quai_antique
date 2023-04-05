<?php
    require_once ('lib/user.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');

    $pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');


    $errors = [];
    $messages = [];

    if (isset($_POST['addUser'])) {
        $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);

        if ($res) {;
            $messages[] = 'Merci pour votre inscription';
        } else {
            $errors[] = "Une erreur s\'est produite lors de votre inscription";
        }
 
    }

    ?>
<!doctype html>
   <html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ajouter un plat</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
   </head>
      <main class="body-login">
        <?php foreach ($messages as $message) { ?>
        <div class="success-msg">
            <i class="fa fa-check"></i>
            <?=$message; ?>
        </div>
        <?php } ?>

        <?php foreach ($errors as $error) { ?>
            <div class="error-msg">
            <i class="fa fa-times-circle"></i>
                <?=$error; ?>
            </div>
        <?php } ?>
         <div class="container mt-4">

            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4>Inscription
                           <a href="index.php" class=" bttn btn float-end">Retour</a>
                        </h4>
                     </div>
                     <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="mb-3">
                                <label for="first_name"><b>Prénom</b></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                           </div>

                           <div class="mb-3">
                                <label for="last_name"><b>Nom</b></label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                           </div>

                           <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                           <input type="submit" value="Inscription" name="addUser" class="btn btn-primary">

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
  </body>

<style>
  body{
      background-color: #cab5a7;
  }

  .card-header{
      background-color: #05263b;
      font-family: 'Cinzel', serif;
      color: #fcf8f5;
  }
  .card-body{
      background-color: #fcf8f5;
      font-family: 'Bree Serif', serif;
  }

  .bttn {
      background-color: #0f4454;
      color: #fcf8f5;
      font-family: 'Cinzel', serif;
  }

  .bttn:hover{
  background-color: #cab5a7;
  color:#0f4454;
}
</style>
</html> 
