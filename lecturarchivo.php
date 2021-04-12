<?php
    $dir = "carpeta_archivo/";
    $lista_programas = dirToArray($dir);
    $permitidas = array("cargue", "almacene", "nueva", "lea", "sume", "reste", "multiplique", "divida", "potencia", "modulo", "concatene", "elimine", "extraiga", "y", "o", "no", "muestre", "imprima", "vaya", "vayasi", "etiqueta", "retorne", "xxx");
    $is_empty = (bool) (count(scandir($dir)) == 2);
    if ($is_empty==false) {
        for ($i=0; $i <= count($lista_programas); $i++) { 
            // Ruta del archivo guardado
            $archivo = fopen('carpeta_archivo/'.$lista_programas[$i],'r');
            // Abrir archivo
            while (!feof($archivo)) {
                // Se lee cada una de las lineas del archivo y se almacenan en la variable "linea"
                $linea = quitar_tildes(trim(fgets($archivo)));
                // Validación funcion para ignorar las lineas que tengan '//' y posteriormente almacenarlas en el arreglo "lista_ignore"
                if (stristr($linea, '//')) {
                    $lista_ignorada_comentarios[] = $linea;
                }else {
                    $lista_completa[]=$linea;
                    if (stristr($linea, 'cargue')) {
                        $lista_separada_completa = explode(" ",$linea);
                        $operacion_com_1 = strtolower(array_values($lista_separada_completa)[0]);
                        $operacion_com_2 = strtolower(array_values($lista_separada_completa)[1]);
                        $lista_com[$operacion_com_2] = $operacion_com_1;
                    }
                    $array_completo = [];

                    // foreach ($lista_completa as $cadena) {
                    //     array_push($array_completo, $cadena);
                    // }
                    if (stristr($linea, 'etiqueta')) {
                        $lista_ignorada_etiquetas[] = $linea;
                        $lista_separada_etiquetas = explode(" ",$linea);
                        $operacion2 = strtolower(array_values($lista_separada_etiquetas)[1]);
                        $operacion3 = strtolower(array_values($lista_separada_etiquetas)[2]);
                        $lista_etiquetas[] = $operacion2;
                        $lista_etiquetas_posicion[] = $operacion3;
                    }elseif (stristr($linea, 'nueva')) {
                        $lista_variables_completa[] = $linea;
                        $lista_separada_variables = explode(" ",$linea);
                        $operacion = strtolower(array_values($lista_separada_variables)[1]);
                        $operacion4 = strtolower(array_values($lista_separada_variables)[3]);
                        $lista_var[$operacion] = $operacion4;
                        $lista_variables[] = $operacion;
                        $lista_variables_valor[] = $operacion4;
                        $lista[] = $linea;
                        $lista_separada = explode(" ",$linea);
                        $operacion = strtolower(array_values($lista_separada)[0]);
                        $lista_operacion[] = $operacion;
                        
                        // foreach ($lista_variables_valor as $cadena) {
                        //     array_push($array_completo, $cadena);
                        // }
                    }
                }
            }
            
            // echo '<pre>';
            // var_dump(array_intersect_key($lista_var, $lista_com));
            // echo '</pre>';
            $lista_cargue = array_intersect_key($lista_var, $lista_com);

            // echo '<pre>';
            // var_dump($lista_com);
            // echo '</pre>';

            // echo '<pre>';
            // var_dump($lista_var);
            // echo '</pre>';

            // echo '<pre>';
            // var_dump($lista_com);
            // echo '</pre>';

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
    }
?>