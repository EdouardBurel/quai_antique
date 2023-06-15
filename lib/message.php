<?php
foreach ($messages as $message) { ?>
    <div class="alert success-msg text-center" role="alert" id="alertDiv">
        <i class="fa fa-check"></i>
        <?=$message; ?>
        <button type="button" class="btn-close btn-close-white float-end" onclick="closeAlert()" aria-label="Close"></button>
    </div> <?php }

foreach ($errors as $error) { ?>
    <div class="error-msg text-center" role="alert" id="alertDiv">
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