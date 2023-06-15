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
    <div class="alert success-msg" role="alert" id="alertDiv">
        <i class="fa fa-check"></i>
        <?=$message; ?>
        <button type="button" class="btn-close btn-close-white float-end" onclick="closeAlert()" aria-label="Close"></button>
    </div> <?php }

foreach ($errors as $error) { ?>
    <div class="error-msg" role="alert" id="alertDiv">
        <i class="fa fa-times-circle"></i>
        <?=$error; ?>
        <button type="button" class="btn-close btn-close-white float-end" onclick="closeAlert()" aria-label="Close"></button>
    </div> <?php } ?>
    
<script>
    function closeAlert() {
        var alertDiv = document.getElementById("alertDiv");
        alertDiv.style.display = "none";
    }
</script>