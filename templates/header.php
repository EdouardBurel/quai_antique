<?php
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once('lib/pdo.php');

    $currentPage = basename($_SERVER['SCRIPT_NAME']);

?>

<?php
/*
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" type="text/javascript" defer></script>
    <title>Quai Antique - Restaurant</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.php" />
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cinzel&family=Gloock&display=swap" rel="stylesheet">
</head>
<body>
        <header>
            <nav class="navbar">
                <div class="brand-title">
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
                    <li class="nav-link">
                        <a href="<?=$key; ?>" target="_self"><?=$value ;?></a>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="list-logins">
                <ul>
                <?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id']) )  {?>
                    <li class="nav-login">
                        <a href="login.php" class="buttonLogin">Se connecter</a>
                    </li>
                    <li class="nav-login">
                        <a href="inscription.php" class="buttonLogin">S'incrire</a>
                    </li>
                    <?php } else {?>
                    <a href="logout.php" class="buttonLogin">Se déconnecter</a>
                    <?php } ?>
                </ul>
            </div>
            </nav>
        </header>