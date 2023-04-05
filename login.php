<?php
    require_once ('lib/user.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');

    $pdo = new PDO('mysql:dbname=edouardburel_quai-antique;host=mysql-edouardburel.alwaysdata.net', '302132_ecf2023', 'Ecf-2023');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

     
        $select = $pdo->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select->execute([$email, $password]);
        $row = $select->fetch(PDO::FETCH_ASSOC);
     
        if($select->rowCount() > 0){
     
           if($row['role'] == 'admin'){
     
              $_SESSION['admin_id'] = $row['id'];
              header('location:admin.php');
     
           }elseif($row['role'] == 'user'){
     
              $_SESSION['user_id'] = $row['id'];
              header('location:index.php');
     
           }else{
              $message[] = 'no user found!';
           }
           
        }else{
           $message[] = 'Incorrect email or password.';
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
                        <h4>Connexion
                           <a href="index.php" class=" bttn btn float-end">Retour</a>
                        </h4>
                     </div>
                     <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" required name="email" placeholder="veuillez votre email" class="box form-control">
                           </div>

                           <div class="mb-3">
                              <label for="password" class="form-label">Mot de passe</label>
                              <input type="password" name="password" class="form-control">
                           </div>

                           <input type="submit" value="Connnexion" name="submit" class="btn btn-primary">

                        </form>
                        <span style="padding: 1rem">Vous n'avez pas encore un compte ?
                           <a href="inscription.php" style="color: red">Inscription</a> 
                        </span>
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

