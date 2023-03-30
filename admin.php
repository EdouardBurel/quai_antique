<?php
    require_once ('templates/header.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once('lib/pdo.php');

    if(!isset($_SESSION['admin_id'])) {
            header('location: index.php');
        }


?>

<main>
<h1>Heure d'ouverture</h1>

<h4>
    <a href="./admin/hours/index.php">Modifier Horaire</a>
</h4>
<h4>
    <a href="./admin/galery/index.php">Modifier images galerie</a>
</h4>
