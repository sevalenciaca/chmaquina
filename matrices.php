<?php

$directorio = 'carpeta_archivo';
$array_programas = directorios_array($directorio);
$nombre_archivo = $array_programas[0];
$acumulador = 0;
$kernel = 10; //(10*4)+9;
$memoria = 100;
$matriz_instrucciones = lectura_archivo($directorio, $nombre_archivo);
$matriz_instrucciones_sinseparar = lectura_archivo2($directorio, $nombre_archivo);
$matriz_variables = filtro($matriz_instrucciones, 'nueva');
$matriz_variables_nueva = nueva($matriz_variables);
$matriz_etiquetas = filtro($matriz_instrucciones, 'etiqueta');
$otros_archivos = otros_archivos($matriz_instrucciones_sinseparar, $matriz_variables_nueva);
$instrucciones_juntas = programas($directorio, $array_programas, $matriz_variables_nueva);
$array_memoria_principal = memoria_principal($acumulador, $kernel, $memoria, $instrucciones_juntas);

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

function nueva ($matriz_variables) {
    for ($i=0; $i < count($matriz_variables); $i++) { 
        if (!isset($matriz_variables[$i][3])) {
            $matriz_variables[$i][3] = (string)0;
        }
    }
    return $matriz_variables;
}

function filtro ($matriz_instrucciones, $palabra) {
    for ($i=0; $i < count($matriz_instrucciones); $i++) { 
        if ($matriz_instrucciones[$i][0] == $palabra) {
            $matriz[] = array_unique($matriz_instrucciones[$i]);
        }
    }
    return $matriz;
}

function otros_archivos ($matriz_instrucciones_sinseparar, $matriz_variables_nueva) {
    for ($i=0; $i < count($matriz_instrucciones_sinseparar); $i++) {
        $array[] = $matriz_instrucciones_sinseparar[$i];
    }
    for ($i=0; $i < count($matriz_variables_nueva); $i++) {
        array_push($array, $matriz_variables_nueva[$i][1]);
    }
    return $array;
}

function programas ($directorio, $array_programas, $matriz_variables_nueva) {
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
        array_push($array, '***RESERVADO KERNEL***');
    }
    for ($i=0; $i < count($instrucciones_juntas); $i++) {
        array_push($array, $instrucciones_juntas[$i]);
    }
    for ($i=0; $i < $memoria-$var; $i++) {
        array_push($array, null);
    }
    return $array;
}

function directorios_array($dir) {
    //creo un array
    $lista_programas = array();
    //abro los directorios contenidos en $dir
    if($handler = opendir($dir)) {
        //leo todos los elementos contenidos 
        while (($file = readdir($handler)) !== FALSE) {
            //verifico que hayan elementos
            if ($file != "." && $file != "..") {
                /*si los elementos son archivos, guardo los elementos 
                en algún indice (dimensión) del array*/
                if(is_file($dir."/".$file)) {
                    $lista_programas[] = $file;
                /*si los elementos son directorios, guardo los elementos 
                en otro índice o dimensión, repitiendo hasta que hayan elementos*/
                }elseif(is_dir($dir."/".$file)){
                    $lista_programas[$file] = dirToArray ($dir."/".$file);
                }
            }
        }
        closedir($handler);
    }
    return $lista_programas;
}

// echo '<pre>';
// var_dump($matriz_instrucciones);
// echo '</pre>';
// echo '<pre>';
// var_dump($matriz_instrucciones_sinseparar);
// echo '</pre>';
// echo '---------------------------------------------';
// echo '<pre>';
// var_dump($matriz_etiquetas);
// echo '</pre>';
// echo '---------------------------------------------';
// echo '<pre>';
// var_dump($matriz_variables);
// echo '</pre>';
// echo '---------------------------------------------';
// echo '<pre>';
// var_dump($matriz_variables_nueva);
// echo '</pre>';
// echo '---------------------------------------------';
echo '<pre>';
var_dump($array_memoria_principal);
echo '</pre>';
// echo '---------------------------------------------';
// echo '<pre>';
// var_dump($otros_archivos);
// echo '</pre>';
// echo '<pre>';
// var_dump($instrucciones_juntas);
// echo '</pre>';
// echo '<pre>';
// var_dump($otros_archivos);
// echo '</pre>';
?>