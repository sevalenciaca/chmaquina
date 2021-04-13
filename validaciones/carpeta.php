<?php

session_start();
$message = '';

$carpeta = @scandir('carpeta_archivo');
if (count($carpeta) > 2){
    $message = 'ARCHIVO CARGADO';
}else{
    $message = 'CARGUE ARCHIVO';
}

$_SESSION['message'] = $message;

session_start();
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
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    }
    
?>