<?php

if (validacion_directorio($directorio)) {

    $message = '';

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
        $message = 'El archivo con extensión .ch se cargó, sin embargo la sintaxis es incorrecta. ';
        $message .= 'Se encontraron '.$cont.' errores';
    }
    
    $_SESSION['message'] = $message;
    
    if (isset($_SESSION['message']) && $_SESSION['message']){
        echo
        '
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <div class="alert alert-info fw-bold shadow" role="alert">
                        '.$_SESSION['message'].'
                    </div>
                </div>
            </div>
        </div>
        ';
    }

}

?>