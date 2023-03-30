<?php
    require ('templates/header.php');
    require_once ('lib/user.php');

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
<main>
   <h1>Connexion</h1>

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

   <form action="#" method="POST" enctype="multipart/form-data">
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

</main>

<?php
require_once('templates/footer.php');
?>