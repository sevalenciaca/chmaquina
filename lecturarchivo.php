<?php
    $dir = "carpeta_archivo/";
    $lista_programas = dirToArray($dir);
    // Array con operaciones validas, para validar sintaxis
    $permitidas = array("cargue", "almacene", "nueva", "lea", "sume", "reste", "multiplique", "divida", "potencia", "modulo", "concatene", "elimine", "extraiga", "y", "o", "no", "muestre", "imprima", "vaya", "vayasi", "etiqueta", "retorne", "xxx");
    $is_empty = (bool) (count(scandir($dir)) == 2);
    if ($is_empty==false) {
        if (count($lista_programas)-1<=0) {
            $posicion = 0;
        }else {
            $posicion = count($lista_programas)-1;
        }
        // Ruta del archivo guardado
        $archivo = fopen('carpeta_archivo/'.$lista_programas[$posicion],'r');
        // Abrir archivo
        while (!feof($archivo)) {
            // Se lee cada una de las lineas del archivo y se almacenan en la variable "linea"
            $linea = quitar_tildes(fgets($archivo));
            // Validación funcion para ignorar las lineas que tengan '//' y posteriormente almacenarlas en el arreglo "lista_ignore"
            if (stristr($linea, '//')) {
                $lista_ignorada_comentarios[] = $linea;
            }else {
                $lista_completa[]=$linea;
                if (stristr($linea, 'etiqueta')) {
                    $lista_ignorada_etiquetas[] = $linea;
                    $lista_separada_etiquetas = explode(" ",$linea);
                    $operacion2 = strtolower(array_values($lista_separada_etiquetas)[1]);
                    $operacion3 = strtolower(array_values($lista_separada_etiquetas)[2]);
                    $lista_etiquetas[] = $operacion2;
                    $lista_etiquetas_posicion[] = $operacion3;
                }elseif (stristr($linea, 'nueva')) {
                    $lista_varaibles_completa[] = $linea;
                    $lista_separada_variables = explode(" ",$linea);
                    $operacion = strtolower(array_values($lista_separada_variables)[1]);
                    $operacion4 = strtolower(array_values($lista_separada_variables)[3]);
                    $lista_variables[] = $operacion;
                    $lista_variables_valor[] = $operacion4;
                    $lista[] = $linea;
                    $lista_separada = explode(" ",$linea);
                    $operacion = strtolower(array_values($lista_separada)[0]);
                    $lista_operacion[] = $operacion;
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