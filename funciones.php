<?php

$permitidas = array("cargue", "almacene", "nueva", "lea", "sume", "reste", "multiplique", "divida", "potencia", "modulo", "concatene", "elimine", "extraiga", "y", "o", "no", "muestre", "imprima", "vaya", "vayasi", "etiqueta", "retorne", "xxx");
$directorio = 'carpeta_archivo';

if (validacion_directorio($directorio)) {
    $array_programas = directorios_array($directorio);
    $nombre_archivo = $array_programas[0];
    $acumulador = 0;
    if (isset($_POST['kernel'], $_POST['memoria'], $_POST['velocidad'])) {
        $kernel = $_POST['kernel'];
        $memoria = $_POST['memoria'];
        $velocidad = $_POST['velocidad'];
    }else {
        $kernel = 49;
        $memoria = 100;
        $velocidad = 25;
    }
    $matriz_instrucciones = lectura_archivo($directorio, $nombre_archivo);
    $matriz_instrucciones_sinseparar = lectura_archivo2($directorio, $nombre_archivo);
    $matriz_variables = filtro($matriz_instrucciones, 'nueva');
    $matriz_variables_nueva = nueva($matriz_variables);
    $matriz_etiquetas = filtro($matriz_instrucciones, 'etiqueta');
    $otros_archivos = otros_archivos($matriz_instrucciones_sinseparar, $matriz_variables_nueva);
    $instrucciones_juntas = programas($directorio, $array_programas, $matriz_variables_nueva);
    $array_memoria_principal = memoria_principal($acumulador, $kernel, $memoria, $instrucciones_juntas);
    $matriz_sintaxis = sintaxis($matriz_instrucciones);

    $validacion3 = '';
    $validacion4 = '';

    $cont = 0;
    $errores = array();
    for ($i=0; $i < count($matriz_sintaxis) ; $i++) { 
        if (!(in_array($matriz_sintaxis[$i], $permitidas))) {
            $cont++;
            $errores[] = $i;
        }
    }
    if (empty($errores)) {
        $validacion3 =  'El archivo con extensión .ch se cargó correctamente y la sintaxis es correcta';
    }else {
        $validacion4 = 'El archivo con extensión .ch se cargó, sin embargo, la sintaxis es incorrecta. ';
        $validacion4 .= 'Se encontraron '.$cont.' errores';
    }

    $_SESSION['validacion3'] = $validacion3;
    $_SESSION['validacion4'] = $validacion4;

    $validacion5 = '';
    if (validacion_archivo($matriz_instrucciones)) {
        $validacion5 = 'El archivo está vació';
    }
    $_SESSION['validacion5'] = $validacion5;

    // echo '<pre>';
    // var_dump($instrucciones_juntas);
    // echo '</pre>';
}

function validacion_directorio($directorio) {
    $carpeta = @scandir($directorio);
    if (count($carpeta) > 2){
        return true;
    }else{
        return false;
    }
}

function validacion_archivo($matriz_instrucciones) {
    if ($matriz_instrucciones == false) {
        return true;
    }else {
        return false;
    }
}

function lectura_archivo($directorio, $nombre_archivo) {
    $archivo = fopen($directorio.'/'.$nombre_archivo,'r');
    while (!feof($archivo)) {
        $linea = trim(fgets($archivo));
        if (!stristr($linea, '//')) {
            $linea_separada = explode(" ",$linea);
            $matriz[] = $linea_separada;
        }else {
            $lista_ignorada_comentarios[] = $linea;
        }
    }
    fclose($archivo);
    return $matriz;
}

function lectura_archivo2($directorio, $nombre_archivo) {
    $archivo = fopen($directorio.'/'.$nombre_archivo,'r');
    while (!feof($archivo)) {
        $linea = trim(fgets($archivo));
        if (!stristr($linea, '//')) {
            $matriz[] = trim($linea);
        }else {
            $lista_ignorada_comentarios[] = $linea;
        }
    }
    fclose($archivo);
    return $matriz;
}

function filtro ($matriz_instrucciones, $palabra) {
    for ($i=0; $i < count($matriz_instrucciones); $i++) { 
        if ($matriz_instrucciones[$i][0] == $palabra) {
            $matriz[] = array_unique($matriz_instrucciones[$i]);
        }
    }
    return $matriz;
}

function nueva ($matriz_variables) {
    for ($i=0; $i < count($matriz_variables); $i++) { 
        if (!isset($matriz_variables[$i][3])) {
            $matriz_variables[$i][3] = (string)0;
        }
    }
    return $matriz_variables;
}

function otros_archivos($matriz_instrucciones_sinseparar, $matriz_variables_nueva) {
    for ($i=0; $i < count($matriz_instrucciones_sinseparar); $i++) {
        $array[] = $matriz_instrucciones_sinseparar[$i];
    }
    for ($i=0; $i < count($matriz_variables_nueva); $i++) {
        array_push($array, $matriz_variables_nueva[$i][1]);
    }
    return $array;
}

function programas($directorio, $array_programas, $matriz_variables_nueva) {
    if (count($array_programas) > 1) {
        $matriz = otros_archivos(lectura_archivo2($directorio, $array_programas[0]), $matriz_variables_nueva);
        for ($i=1; $i < count($array_programas); $i++) {
            $lectura = otros_archivos(lectura_archivo2($directorio, $array_programas[$i]), $matriz_variables_nueva);
            for ($j=0; $j < count($lectura); $j++) {
                array_push($matriz, $lectura[$j]);
            }
        }
    }else {
        $matriz = otros_archivos(lectura_archivo2($directorio, $array_programas[0]), $matriz_variables_nueva);
    }
    return $matriz;
}

function memoria_principal ($acumulador, $kernel, $memoria, $instrucciones_juntas) {
    $var = 1+$kernel+count($instrucciones_juntas);
    $array[0] = $acumulador;
    for ($i=0; $i < $kernel; $i++) {
        array_push($array, '*** KERNEL ***');
    }
    for ($i=0; $i < count($instrucciones_juntas); $i++) {
        array_push($array, $instrucciones_juntas[$i]);
    }

    $validacion2 = '';
    if ($var < $memoria) {
        for ($i=0; $i < $memoria-$var; $i++) {
            array_push($array, null);
        }
    }else {
        $validacion2 = 'Se ha alcanzado el límite de la memoria principal, no se permite cargar más programas';
    }
    $_SESSION['validacion2'] = $validacion2;
    
    return $array;
}

function directorios_array($directorio) {
    //creo un array
    $lista_programas = array();
    //abro los directorios contenidos en $directorio
    if($handler = opendir($directorio)) {
        //leo todos los elementos contenidos 
        while (($nombre_archivo = readdir($handler)) !== FALSE) {
            //verifico que hayan elementos
            if ($nombre_archivo != "." && $nombre_archivo != "..") {
                /*si los elementos son archivos, guardo los elementos 
                en algún indice (dimensión) del array*/
                if(is_file($directorio."/".$nombre_archivo)) {
                    $lista_programas[] = $nombre_archivo;
                /*si los elementos son directorios, guardo los elementos 
                en otro índice o dimensión, repitiendo hasta que hayan elementos*/
                }elseif(is_dir($directorio."/".$nombre_archivo)){
                    $lista_programas[$nombre_archivo] = directorios_array($directorio."/".$nombre_archivo);
                }
            }
        }
        closedir($handler);
    }
    return $lista_programas;
}

function quitar_tildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}

function sintaxis($matriz_instrucciones) {
    for ($i=0; $i < count($matriz_instrucciones); $i++) { 
        $array[] = quitar_tildes(strtolower($matriz_instrucciones[$i][0]));
    }
    return $array;
}

// if (is_dir($directorio)) {
//     //Escaneamos el directorio
//     $carpeta = @scandir($directorio);
//     //Miramos si existen archivos
//     if (count($carpeta) > 2){
//         echo 'El directorio tiene archivos';
//         //Miramos si existe el archivo pasado como parámetro
//         if (file_exists($directorio.'/'.$nombre_archivo)) 
//             echo 'El archivo existe';
//         else
//             echo 'El archivo no existe';
//     }else{
//         echo 'El directorio está vacío';
//     }
// }
// else {
//     echo 'El directorio no existe.';
// }
?>