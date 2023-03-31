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
            <h1>Heure d'ouverture</h1>
        </div>
        <div class="box">
            <h3>
                <a href="./admin/hours/index.php">Modifier Horaire</a>
            </h3>
            <h3>
                <a href="card-create.php">Modifier images galerie</a>
            </h3>
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
