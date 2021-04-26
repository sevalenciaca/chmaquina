<?php
    if (validacion_directorio($directorio)) {
        if (isset($_SESSION['validacion5']) && $_SESSION['validacion5']){
            echo
            '
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> '.$_SESSION['validacion5'].'
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            ';
            unset($_SESSION['validacion5']);
        }
    }
?>