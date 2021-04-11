<?php
    $dir = "carpeta_archivo/";
    $lista_programas = dirToArray($dir);
    // Array con operaciones validas, para validar sintaxis
    $permitidas = array("cargue", "almacene", "nueva", "lea", "sume", "reste", "multiplique", "divida", "potencia", "modulo", "concatene", "elimine", "extraiga", "y", "o", "no", "muestre", "imprima", "vaya", "vayasi", "etiqueta", "retorne", "xxx");
    $is_empty = (bool) (count(scandir($dir)) == 2);
    if ($is_empty==false) {
        // Ruta del archivo guardado
        $archivo = fopen('carpeta_archivo/'.$lista_programas[0],'r');
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
                    $lista_etiquetas[0] = null;
                    $lista[] = $linea;
                    $lista_separada = explode(" ",$linea);
                    $operacion = strtolower(array_values($lista_separada)[0]);
                    $lista_operacion[] = $operacion;
                    $lista_variables_sinduplicar[] = $operacion;
                    $lista_variables = array_values(array_unique($lista_variables_sinduplicar));
                }
            }
        }
        fclose($archivo);
        $cont = 0;
        $errores = array();
        for ($i=0; $i < count($lista_operacion) ; $i++) { 
            if (!(in_array($lista_operacion[$i], $permitidas))) {
                $cont++;
                $errores[] = $i;
            }
        }
    }
?>