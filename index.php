<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Título de la pestaña -->
    <title>CH MAQUINA</title>
    <!-- Favicon de la pestaña -->
    <link rel="icon" href="img/favicon.ico">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php include("mensajevalidacion.php"); ?>
    <?php include("funcionesauxiliares.php"); ?>
    <?php include("lecturarchivo.php"); ?>
    <?php include("maquinas.php"); ?>
    <?php include("tablas.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php
                $is_empty = (bool) (count(scandir($dir)) == 2);
                if ($is_empty==false) {
                    // $velocidad = $_POST['velocidad'];
                    // $memoria = $_POST['memoria'];
                    $kernel = (isset($_POST['kernel'])) ? $_POST['kernel'] : '';
                    if ($kernel==='') {
                        $kernel = 49;
                    }
                    $archivo = fopen('carpeta_archivo/'.$lista_programas[0],'r');
                    $nombre_fichero = 'carpeta_archivo/'.$lista_programas[0];
                    $vacio=(!file_exists($nombre_fichero) || !filesize($nombre_fichero)) ? FALSE : TRUE;
                    fclose($archivo);
                    if (!$vacio) {
                        echo 'EL '.$lista_programas[0].' ARCHIVO ESTÁ VACIO';
                    }
                    elseif ($cont != 0) {
                        echo 'SINTAXIS INCORRECTA. Se encontraron errores de sintaxis en el archivo en las siguientes lineas';
                        for ($j=0; $j < count($errores) ; $j++) { 
                            var_dump($errores[$j]);
                        }
                    }
                    else{
                        validacion_extrema($lista_programas, $lista_completa, $lista_ignorada_comentarios, $lista_variables, $lista_etiquetas, $kernel);
                    }
                }
            ?>
            <?php function validacion_extrema($lista_programas, $lista_completa, $lista_ignorada_comentarios, $lista_variables, $lista_etiquetas, $kernel) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                            <?php tabla_chprogramas($lista_programas, $lista_completa, $lista_variables, $kernel); ?>
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                    <?php tabla_instrucciones($lista_completa, $kernel); ?>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                    <?php tabla_variables($lista_variables, $lista_completa, $kernel); ?>
                                    <?php tabla_etiquetas($lista_etiquetas); ?>
                                    <?php tabla_comentarios($lista_ignorada_comentarios); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <?php tabla_memoriaprincipal($lista_completa, $kernel); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/327c404ca7.js" crossorigin="anonymous"></script>
</html>