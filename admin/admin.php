<?php
    require_once('../lib/session.php');
    require_once ('../lib/config.php');
    require_once ('../lib/pdo.php');

   // SECURE ACCESS TO ADMIN PAGE
    if(!isset($_SESSION['admin_id'])) {
            header('location: index.php');
        }
?>

<!doctype html>
   <html lang="fr" class="htmlForm">
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
      <link rel="stylesheet" href="/assets/css/styles.css">
   </head>
   <body class="bodyForm">
      <main>
         <div class="container mt-4">

            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h2>Espace admin
                           <a href="/index.php" class=" bttn btn float-end">Accueil</a>
                        </h2>
                     </div>
                     <div class="card-body">
                           <div class="mb-3">
                                <h4>
                                    <a href="hours/hourIndex.php">Horaires du restaurant</a>
                                </h4>
                           </div>

                           <div class="mb-3">
                                <h4>
                                <a href="galery/galeryIndex.php">Gestion galerie d'images - page d'accueil</a>
                                </h4>
                           </div>

                           <div class="mb-3">
                                <h4>
                                <a href="menus/menuIndex.php">Ajouter / Supprimer plat menus - page menus</a>
                                </h4>
                           </div>
                           <div class="mb-3">
                                <h4>
                                <a href="capacity/maxCapacity.php">Définir le seuil de convives maximum</a>
                                </h4>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php require_once('../templates/footer.php') ;?>