<?php
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once ('lib/pdo.php');
    require_once ('lib/code.php');
    require_once ('templates/headerBootstrap.php');
    require_once ('lib/capacity.php');

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
                        <form method="POST">
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
                                <div class="password-input">
                                    <input type="password" name="password" id="passwordInput" class="form-control" required>
                                    <div class="password-toggle" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye" id="eyeIcon"></i>
                                    </div>
                                </div>    
                            </div>

                            <div class="mb-3">
                                <label for="numberPeople">Nombre de convives par défaut</label>
                                <input type="number" name="numberPeople" id="numberPeople" min="1" max="<?php echo $totalGuests; ?>" class="form-control">
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
