<?php
require_once ('templates/header.php');
?>

<?php if(!isset($_SESSION['user'])) {
        header('location: login.php');
    }
?>

<h1>Réservation</h1>

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
        <label for="phone" class="form-label"">Numéro de téléphone</label>
        <input type="phone" name="phone" id="phone" class="form-control">
    </div>

    <div class="mb-3">
        <br>
    </div>

    <div class="mb-3">
        <br><br>
    </div>

    <div class="mb-3">
        <button type="submit" name="addBooking" class="btn btn-success float-end">Réserver</button>
    </div>

    <div class="mb-3">
        <br><br>
    </div>


</form>