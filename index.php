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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand"><i class="fas fa-laptop-code"></i> CH MÁQUINA</a>
            <span class="navbar-text">
                <i class="fas fa-user"></i> Sebastián Valencia Carvajal
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-file-alt"></i> Archivo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <form method="POST" action="upload.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="p-2">
                                            <input type="file" class="form-control-file" name="uploadedFile"/>
                                        </div>
                                        <div class="p-2">
                                            <input type="submit" name="uploadBtn" value="Cargar"/>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Cargar</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-play"></i> Ejecutar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-pause"></i> Pausar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-list"></i> Pasos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-memory"></i> Memoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="fs-6 fw-bold m-3">
        MENSAJE DE VALIDACIÓN: 
        <?php
            session_start();
        ?>
        <?php
            if (isset($_SESSION['message']) && $_SESSION['message']){
                printf('<b>%s</b>', $_SESSION['message']);
                unset($_SESSION['message']);
            }
        ?>
    </div>
    <?php
        function quitar_tildes($cadena) {
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $texto = str_replace($no_permitidas, $permitidas ,$cadena);
            return $texto;
        }
        function validacion_archivo() {
            $nombre_fichero = 'archivo.ch';
            $vacio=(!file_exists($nombre_fichero) || !filesize($nombre_fichero)) ? FALSE : TRUE;
            /*Prueba de la variable*/
            var_dump($vacio);
        }
        // Array con operaciones validas, para validar sintaxis
        $permitidas = array("cargue", "almacene", "nueva", "lea", "sume", "reste", "multiplique", "divida", "potencia", "modulo", "concatene", "elimine", "extraiga", "y", "o", "no", "muestre", "imprima", "vaya", "vayasi", "etiqueta", "retorne", "xxx");
        // Ruta del archivo guardado
        $archivo = fopen('carpeta_archivo/archivo.ch','r');
        // Abrir archivo
        while (!feof($archivo)) {
            // Se lee cada una de las lineas del archivo y se almacenan en la variable "linea"
            $linea = quitar_tildes(trim(fgets($archivo)));
            // Validación funcion para ignorar las lineas que tengan '//' y posteriormente almacenarlas en el arreglo "lista_ignore"
            if (stristr($linea, '//')) {
                $lista_ignorada_comentarios[] = $linea;
            }else {
                $lista_completa[]=$linea;
                if (stristr($linea, 'etiqueta')) {
                    $lista_ignorada_etiquetas[] = $linea;
                    $lista_separada_etiquetas = explode(" ",$linea);
                    $operacion2 = strtolower(array_values($lista_separada_etiquetas)[1]);
                    $lista_etiquetas[] = $operacion2;
                }
                else {
                    $lista[] = $linea;
                    $lista_separada = explode(" ",$linea);
                    $operacion = strtolower(array_values($lista_separada)[0]);
                    $lista_operacion[] = $operacion;
                    $lista_variables_sinduplicar[] = $operacion;
                    $lista_variables = array_unique($lista_variables_sinduplicar);
                    // echo $operacion.'<br/>';
                    // echo $linea.'<br/>';
                    // $lista2[] = $linea2;
                }
            }
        }
        fclose($archivo);
        // echo '<pre>';
        // print_r($lista);
        // echo '</pre>';
        // var_dump($lista);
        // var_dump($lista_operacion);
        $cont = 0;
        $errores = array();
        for ($i=0; $i < count($lista_operacion) ; $i++) { 
            if (!(in_array($lista_operacion[$i], $permitidas))) {
                $cont++;
                $errores[] = $i;
            }
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card p-3">
                    <?php
                        if($cont != 0){
                            echo 'SINTAXIS INCORRECTA. Se encontraron errores de sintaxis en el archivo en las siguientes lineas';
                            for ($j=0; $j < count($errores) ; $j++) { 
                                var_dump($errores[$j]);
                            }
                        }else{
                            echo 'SINTAXIS CORRECTA';
                            echo '<br>';
                            echo '<br>';
                            echo 'MEMORIA PRINCIPAL';
                            var_dump($lista_completa);
                            echo 'COMENTARIOS (LINEAS IGNORADAS)';
                            var_dump($lista_ignorada_comentarios);
                    ?>
                </div>
            </div>
            <div class="col-5">
                <div class="card p-3">
                    <?php
                        echo 'VARIABLES';
                        var_dump($lista_variables);
                        echo 'ETIQUETAS';
                        var_dump($lista_etiquetas);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/327c404ca7.js" crossorigin="anonymous"></script>
</html>