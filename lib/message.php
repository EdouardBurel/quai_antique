<?php 
if(isset($_SESSION['message'])) :

?> 
   
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Merci admin!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['message']);
    endif;
?>

<?php
foreach ($messages as $message) { ?>
    <div class="success-msg">
        <i class="fa fa-check"></i>
        <?=$message; ?>
    </div> <?php }

foreach ($errors as $error) { ?>
    <div class="error-msg">
        <i class="fa fa-times-circle"></i>
        <?=$error; ?>
    </div> <?php } ?>