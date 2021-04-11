<?php
function quitar_tildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}
//función para obtener el nombre de las carpetas y los archivos en array multidimensional
function dirToArray($dir) {
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
?>