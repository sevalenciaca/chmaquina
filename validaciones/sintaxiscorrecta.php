<?php
    if (validacion_directorio($directorio)) {
        if (isset($_SESSION['validacion3']) && $_SESSION['validacion3']){
            echo
            '
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="alert alert-success fw-bold shadow" role="alert">
                            <i class="fas fa-check-circle"></i> '.$_SESSION['validacion3'].' <a href=""><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            ';
            unset($_SESSION['validacion3']);
        }
    }
?>