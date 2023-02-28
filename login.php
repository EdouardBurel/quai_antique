<?php
require_once ('templates/header.php');
require_once ('lib/user.php');

$errors = [];
$messages = [];

if (isset($_POST['loginUser'])) {
    $user = verifyUserLoginPassword($pdo, $_POST['email'],  $_POST['password']);

    if ($user) {
        $_SESSION['user'] = ['email' => $user['email'], 'name' => $user['name']];
        header('location:book.php');

    } else {
        $errors[] = 'Email ou mot de passe incorrect';
    }
}

?>

<h1 class='loginTitle'>Connexion</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="loginEmail">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="loginEmail">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <input type="submit" value="Connnexion" name="loginUser" class="loginEmail">


</form>

<?php
require_once('templates/footer.php');
?>

