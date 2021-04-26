<?php
    include('funciones.php');
    $arch = $array_programas[count($array_programas)-1];
    unlink('../carpeta_archivo/'.$arch);
    header("Location: ../index.php");
    die();
?>