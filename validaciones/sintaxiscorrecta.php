<?php
    if (validacion_directorio($directorio)) {
        if (isset($_SESSION['validacion3']) && $_SESSION['validacion3']){
            echo
            '
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> '.$_SESSION['validacion3'].'
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            ';
            unset($_SESSION['validacion3']);
        }
    }
?>