<?php
    require_once ('lib/user.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once ('lib/dbcon.php');
    require_once('lib/session.php');

    $pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');


    if(!isset($_SESSION['user_id'])) {
            header('location: index.php');
        }

?>

<!doctype html>
   <html lang="fr">
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
      <main>

      <?php

      $user_id = $_SESSION['user_id'];
      echo $user_id;
//print_r($_SESSION['user_id']);
?>
         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '
                  <div class="message">
                     <span>'.$message.'</span>
                  </div>
                  ';
               }
            }
         ?>
         <div class="container mt-4">

            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h2>Espace client
                           <a href="index.php" class=" bttn btn float-end">Accueil</a>
                        </h2>
                     </div>
                     <div class="card-body">
                           <div class="mb-3">
                                <h3>
                                    <a href="book.php?id=<?=$_SESSION['user_id']?>">Réservez une table</a>
                                </h3>
                           </div>

                           <div class="mb-3">
                                <h3>
                                <a href="#">Consultez vos réservations</a>
                                </h3>
                           </div>
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
      margin: 0.5rem;
  }

  .bttn:hover{
  background-color: #cab5a7;
  color:#0f4454;
}
</style>
</html>