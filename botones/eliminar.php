<?php
    unset($_SESSION['memoria']);
    unset($_SESSION['tamano']);
    $files = glob('../carpeta_archivo/*'); //obtenemos todos los nombres de los ficheros
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //elimino el fichero
    }
    header("Location: ../index.php");
    die();
?>