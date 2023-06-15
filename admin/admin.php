<?php
    require_once('../lib/session.php');
    require_once ('../lib/config.php');
    require_once ('../lib/pdo.php');
    require_once ('../templates/headerBootstrap.php');

   // SECURE ACCESS TO ADMIN PAGE
    if(!isset($_SESSION['admin_id'])) {
            header('location: index.php');
        }
?>

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