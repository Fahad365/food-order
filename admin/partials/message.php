<?php
 if(isset($_SESSION['message'])):
 ?>
    <div class="alert alert-danger alert-dismissible fade show mb-8" role="alert">
    <strong>Hay!</strong></br><?= $_SESSION['message'];?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        unset($_SESSION['message']);
        endif;          
    ?>