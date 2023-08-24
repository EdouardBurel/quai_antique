<?php
    require_once('../lib/session.php');
    require_once ('../lib/config.php');
    require_once ('../lib/pdo.php');
    require_once ('../lib/code.php');
    require_once ('../templates/headerBootstrap.php');


    $errors = [];
    $messages = [];

    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      $result = loginUser($pdo, $email, $password);
  
      $errors = $result['errors'];
      $messages = $result['messages'];
  }
?>

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
                                <label for="password">Mot de passe</label>
                                <div class="password-input">
                                    <input type="password" name="password" id="passwordInput" class="form-control" required>
                                    <div class="password-toggle" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye" id="eyeIcon"></i>
                                    </div>
                                </div>    
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

   <script>
   function togglePasswordVisibility() {
      var passwordInput = document.getElementById("passwordInput");
      var eyeIcon = document.getElementById("eyeIcon");

      if (passwordInput.type === "password") {
         passwordInput.type = "text";
         eyeIcon.classList.remove("fa-eye");
         eyeIcon.classList.add("fa-eye-slash");
      } else {
         passwordInput.type = "password";
         eyeIcon.classList.remove("fa-eye-slash");
         eyeIcon.classList.add("fa-eye");
      }
   }

   </script>
      <?php require_once('../templates/footer.php') ;?>