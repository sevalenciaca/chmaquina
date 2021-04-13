<?php
    if (isset($_POST['kernel']) && $_POST['kernel'] && isset($_POST['memoria']) && $_POST['memoria'] && isset($_POST['velocidad']) && $_POST['velocidad']){
        $kernel = $_POST['kernel'];
        $memoria = $_POST['memoria'];
        $velocidad = $_POST['velocidad'];
    }
    // echo $velocidad;
    // echo '<br>';
    // echo $memoria;
    // echo '<br>';
    // echo $kernel;
    header("Location: index.php");
?>