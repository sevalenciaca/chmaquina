<?php
    include('../funciones.php');
    $archivo = fopen('../'.$directorio.'/'.$array_programas[count($array_programas)-1],'a');
    fclose($archivo);
    unlink('../'.$directorio.'/'.$array_programas[count($array_programas)-1]);
    header("Location: ../index.php");
    die();
?>