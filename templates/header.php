<?php
    ini_set('display_errors', 'off');
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once('lib/pdo.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restautant gastronomique du Chef Arnaud Michant à Chambery.">
    <title>Quai Antique - Restaurant</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="brand-title" id="quai_antique">
                <a href="index.php" class="nav-branding">Quai Antique</a>
            </div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <?php foreach ($mainMenu as $key => $value) {?>
                    <li>
                        <a href="<?=$key; ?>" target="_self"><?=$value ;?></a>
                    </li>
                    <?php } ?>
                    <?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id']) )   {?>
                    <li>
                        <a href="inscription.php" class="">S'inscrire</a>
                    </li>
                    <li>
                        <a href="../user/login.php" class="">Se connecter</a>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user_id']) )   {?>
                    <li>
                        <a href="../lib/logout.php" class="">Se déconnecter</a>
                    </li>
                    <?php } ?>

                    <?php if(isset($_SESSION['admin_id']) )   {?>
                    <li>
                        <a href="admin/admin.php" class="">Espace admin</a>
                    </li>
                    <li>
                        <a href="../lib/logout.php">Se déconnecter</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>