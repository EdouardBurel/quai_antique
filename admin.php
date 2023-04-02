<?php
    require_once ('templates/header.php');
    require_once('lib/session.php');
    require_once ('lib/config.php');
    require_once('lib/pdo.php');

    if(!isset($_SESSION['admin_id'])) {
            header('location: index.php');
        }


?>

<main div class="bodyAdmin">
<div class="containerAdmin">
    <div class="row">
        <div>
            <h1>Espace admin</h1>
        </div>
        <div class="box">
            <h2>
                <a href="./admin/hours/index.php">Horaires du restaurant</a>
            </h2>
            <h2>
                <a href="/admin/galery/index.php">Galerie d'images - page d'accueil</a>
            </h2>
        </div>
    </div>
</div>
</main>

<?php
require_once('templates/footer.php');
?>

<style>


.containerAdmin {
    display: flex;
    padding: 3rem;
    margin-left: 5rem;
    min-height: 70vh;

}

.footer {
    max-height: 20%;
}
</style>
