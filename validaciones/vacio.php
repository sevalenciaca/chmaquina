<?php
    if (validacion_directorio($directorio)) {
        if (isset($_SESSION['validacion5']) && $_SESSION['validacion5']){
            echo
            '
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="alert alert-danger fw-bold shadow" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> '.$_SESSION['validacion5'].' <a href=""><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            ';
            unset($_SESSION['validacion5']);
        }
    }
?>