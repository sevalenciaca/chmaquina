<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="alert alert-info fw-bold shadow" role="alert">
                Mensaje de validación: 
                <?php
                    session_start();
                    if (isset($_SESSION['message']) && $_SESSION['message']){
                        printf('<b>%s</b>', $_SESSION['message']);
                        unset($_SESSION['message']);
                    }
                ?>
            </div>
        </div>
    </div>
</div>