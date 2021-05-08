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
        $kernel = 5;
        $memoria = 100;
        $velocidad = 25;
    }

    for ($i=0; $i < $memoria; $i++) {
        $matriz_completa[$i]['posicion'] = substr(str_repeat(0, 4).$i, - 4);
        $matriz_completa[$i]['tipo'] = null;
        $matriz_completa[$i]['programa'] = null;
        $matriz_completa[$i]['valorp'] = null;
        $matriz_completa[$i]['valor1'] = null;
        $matriz_completa[$i]['valor2'] = null;
        $matriz_completa[$i]['valor3'] = null;
        $matriz_completa[$i]['valor4'] = null;
    }

    $matriz_instrucciones = lectura_archivo($directorio, $nombre_archivo);
    $matriz_variables = filtro_variables($matriz_instrucciones);

    // $matriz_etiquetas = filtro($matriz_instrucciones, 'etiqueta');
    
    // $otros_archivos = otros_archivos($matriz_instrucciones_sinseparar, $matriz_variables_nueva);
    // $instrucciones_juntas = programas($directorio, $array_programas);
    // $instrucciones_juntas2 = programas2($directorio, $array_programas);
    // $array_memoria_principal = memoria_principal($matriz_completa, $acumulador, $kernel, $memoria, $instrucciones_juntas);
    // $array_memoria_principal2 = memoria_principal($matriz_completa, $acumulador, $kernel, $memoria, $instrucciones_juntas2);
    // $matriz_sintaxis = sintaxis($matriz_instrucciones);

    $validacion3 = '';
    $validacion4 = '';

    $cont = 0;
    $errores = array();
    // for ($i=0; $i < count($matriz_sintaxis) ; $i++) { 
    //     if (!(in_array($matriz_sintaxis[$i], $permitidas))) {
    //         $cont++;
    //         $errores[] = $matriz_sintaxis[$i];
    //     }
    // }

    if (empty($errores)) {
        $validacion3 =  'El archivo con extensión .ch se cargó correctamente y la sintaxis es correcta';
    }else {
        $validacion4 = 'El archivo con extensión .ch se cargó, sin embargo, la sintaxis es incorrecta. ';
        $validacion4 .= '<br>Se encontraron '.$cont.' errores: ';
        for ($i=0; $i < count($errores); $i++) {
            $validacion4 .= $errores[$i].' ';
        }
    }

    $_SESSION['validacion3'] = $validacion3;
    $_SESSION['validacion4'] = $validacion4;

    $validacion5 = '';
    if (validacion_archivo($matriz_instrucciones)) {
        $validacion5 = 'El archivo está vació';
    }
    $_SESSION['validacion5'] = $validacion5;

    // echo '<pre>';
    // var_dump($matriz_instrucciones);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($matriz_instrucciones_sinseparar);
    // echo '</pre>';
    echo '<pre>';
    var_dump($matriz_variables);
    echo '</pre>';
    // echo '<pre>';
    // var_dump($matriz_variables_nueva);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($matriz_etiquetas);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($otros_archivos);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($array_memoria_principal);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($array_memoria_principal2);
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
    if (count($matriz_instrucciones) == 0) {
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
            $matriz[] = explode(" ",$linea);
            $matriz2[] = trim($linea);
            for ($i=0; $i < count($matriz); $i++) {
                $matrizz[$i]['posicion'] = null;
                $matrizz[$i]['tipo'] = 'i';
                $matrizz[$i]['programa'] = null;
                $matrizz[$i]['valorp'] = $matriz2[$i];
                if (!empty($matriz[$i][0])) {
                    $matrizz[$i]['valor1'] = $matriz[$i][0];
                }else{
                    $matrizz[$i]['valor3'] = null;
                }
                if (!empty($matriz[$i][1])) {
                    $matrizz[$i]['valor2'] = $matriz[$i][1];
                }else{
                    $matrizz[$i]['valor3'] = null;
                }
                if (!empty($matriz[$i][2])) {
                    $matrizz[$i]['valor3'] = $matriz[$i][2];
                }else{
                    $matrizz[$i]['valor3'] = null;
                }
                if (!empty($matriz[$i][3])) {
                    $matrizz[$i]['valor4'] = $matriz[$i][3];
                }else{
                    $matrizz[$i]['valor4'] = null;
                }
            }
        }
    }
    fclose($archivo);
    return $matrizz;
}

function filtro_variables($matriz_instrucciones) {
    for ($i=0; $i < count($matriz_instrucciones); $i++) { 
        if ($matriz_instrucciones[$i]['valor1'] == 'nueva') {
            $matriz[] = array_unique($matriz_instrucciones[$i]);
            $matriz[$i]['tipo'] = 'v';
        }
    }
    for ($i=0; $i < count($matriz); $i++) { 
        if (!isset($matriz[$i]['valor4'])) {
            $matriz[$i]['valor4'] = (string)0;
        }
    }
    return $matriz;
}

function filtro_etiquetas($matriz_instrucciones) {
    for ($i=0; $i < count($matriz_instrucciones); $i++) { 
        if ($matriz_instrucciones[$i]['valor1'] == 'nueva') {
            $matriz[] = array_unique($matriz_instrucciones[$i]);
            $matriz[$i]['tipo'] = 'v';
        }
    }
    for ($i=0; $i < count($matriz); $i++) { 
        if (!isset($matriz[$i]['valor4'])) {
            $matriz[$i]['valor4'] = (string)0;
        }
    }
    return $matriz;
}

function otros_archivos($matriz_instrucciones_sinseparar, $matriz_variables_nueva) {
    for ($i=0; $i < count($matriz_instrucciones_sinseparar); $i++) {
        $array[] = $matriz_instrucciones_sinseparar[$i];
    }
    for ($i=0; $i < count($matriz_variables_nueva); $i++) {
        array_push($array, $matriz_variables_nueva[$i][3]);
    }
    return $array;
}

function otros_archivos2($matriz_instrucciones_sinseparar, $matriz_variables_nueva) {
    for ($i=0; $i < count($matriz_instrucciones_sinseparar); $i++) {
        $array[] = $matriz_instrucciones_sinseparar[$i];
    }
    for ($i=0; $i < count($matriz_variables_nueva); $i++) {
        array_push($array, $matriz_variables_nueva[$i][1]);
    }
    return $array;
}

function programas($directorio, $array_programas) {
    if (count($array_programas) > 1) {
        $matriz = otros_archivos(lectura_archivo2($directorio, $array_programas[0]), nueva(filtro(lectura_archivo($directorio, $array_programas[0]),'nueva')));
        for ($i=1; $i < count($array_programas); $i++) {
            $lectura = otros_archivos(lectura_archivo2($directorio, $array_programas[$i]), nueva(filtro(lectura_archivo($directorio, $array_programas[$i]),'nueva')));
            for ($j=0; $j < count($lectura); $j++) {
                array_push($matriz, $lectura[$j]);
            }
        }
    }else {
        $matriz = otros_archivos(lectura_archivo2($directorio, $array_programas[0]), nueva(filtro(lectura_archivo($directorio, $array_programas[0]),'nueva')));
    }
    return $matriz;
}

function programas2($directorio, $array_programas) {
    if (count($array_programas) > 1) {
        $matriz = otros_archivos2(lectura_archivo2($directorio, $array_programas[0]), nueva(filtro(lectura_archivo($directorio, $array_programas[0]),'nueva')));
        for ($i=1; $i < count($array_programas); $i++) {
            $lectura = otros_archivos2(lectura_archivo2($directorio, $array_programas[$i]), nueva(filtro(lectura_archivo($directorio, $array_programas[$i]),'nueva')));
            for ($j=0; $j < count($lectura); $j++) {
                array_push($matriz, $lectura[$j]);
            }
        }
    }else {
        $matriz = otros_archivos2(lectura_archivo2($directorio, $array_programas[0]), nueva(filtro(lectura_archivo($directorio, $array_programas[0]),'nueva')));
    }
    return $matriz;
}

function memoria_principal ($matriz_completa, $acumulador, $kernel, $memoria, $instrucciones_juntas) {
    $var = 1+$kernel+count($instrucciones_juntas);
    $matriz_completa[0]["tipo"] = 'a';
    $matriz_completa[0]["valorp"] = $acumulador;
    for ($i=1; $i <= $kernel; $i++) {
        $matriz_completa[$i]['tipo'] = 'k';
        $matriz_completa[$i]['valorp'] = '*** KERNEL ***';
    }
    for ($i=(1+$kernel); $i < $var; $i++) {
        $matriz_completa[$i]['tipo'] = 'e';
        $matriz_completa[$i]['valorp'] = $instrucciones_juntas[$i-1-$kernel];
    }




    $validacion2 = '';
    if ($var < $memoria) {
        for ($i=0; $i < $memoria-$var; $i++) {
            array_push($matriz_completa, null);
        }
    }else {
        $validacion2 = 'Se ha alcanzado el límite de la memoria principal, no se permite cargar más programas';
    }
    $_SESSION['validacion2'] = $validacion2;
    
    return $matriz_completa;
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