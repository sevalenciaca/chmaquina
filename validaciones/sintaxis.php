<?php

if (validacion_directorio($directorio)) {

    $message = '';
    $message2 = '';

    $cont = 0;
    $errores = array();
    for ($i=0; $i < count($matriz_sintaxis) ; $i++) { 
        if (!(in_array($matriz_sintaxis[$i], $permitidas))) {
            $cont++;
            $errores[] = $i;
        }
    }
    if (empty($errores)) {
        $message =  'El archivo con extensión .ch se cargó correctamente y la sintaxis es correcta';
    }else {
        $message2 = 'El archivo con extensión .ch se cargó, sin embargo, la sintaxis es incorrecta. ';
        $message2 .= 'Se encontraron '.$cont.' errores';
    }
    
    $_SESSION['message'] = $message;
    
    if (isset($_SESSION['message']) && $_SESSION['message']){
        echo
        '
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <div class="alert alert-success fw-bold shadow" role="alert">
                        <i class="fas fa-check-circle"></i> '.$_SESSION['message'].'
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    $_SESSION['message2'] = $message2;
    
    if (isset($_SESSION['message2']) && $_SESSION['message2']){
        echo
        '
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <div class="alert alert-danger fw-bold shadow" role="alert">
                        <i class="fas fa-times-circle"></i> '.$_SESSION['message2'].'
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

?>