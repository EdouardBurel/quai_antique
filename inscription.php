<?php
    require_once ('templates/header.php');
    require_once ('lib/user.php');

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

<div class="bg-img">
    <form method="POST" enctype="multipart/form-data" class="form-inline">
    <h1>Inscription</h1>

    <label for="first_name"><b>Prénom</b></label>
    <input type="text" name="first_name" id="first_name" class="form-control">

    <label for="last_name"><b>Nom</b></label>
    <input type="text" name="last_name" id="last_name" class="form-control">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value=" " class="form-control">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control">

    <button type="submit" value="Inscription" name="addUser" class="btn btn-primary">Inscription</button>
  </form>
</div> 
<!-- 

 <form class="form-inline" action="/action_page.php">
  <label for="email">Email:</label>
  <input type="email" id="email" placeholder="Enter email" name="email">
  <label for="pwd">Password:</label>
  <input type="password" id="pwd" placeholder="Enter password" name="pswd">
  <label>
    <input type="checkbox" name="remember"> Remember me
  </label>
  <button type="submit">Submit</button>
</form> 

<div class="flux">
        <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="first_name" class="form-label"">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label"">Nom</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label"">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <input type="submit" value="Inscription" name="addUser" class="btn btn-primary">
    </form>
                <ul class="container-images">
                    <li>
                        <img src="images/food.jpg" alt="Logo HEC">
                    </li>
                    
                    
                </ul>
</div>

!-->
