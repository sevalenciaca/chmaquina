<div class="container">
    <div class="row">
        <?php
            $is_empty = (bool) (count(scandir($dir)) == 2);
            if ($is_empty==false) {
                // $velocidad = $_POST['velocidad'];
                $memoria = (isset($_POST['memoria'])) ? $_POST['memoria'] : '';
                if ($memoria=='') {
                    // Por defecto
                    $memoria = 101;
                }
                // var_dump($array_memoria);
                $kernel = (isset($_POST['kernel'])) ? $_POST['kernel'] : '';
                if ($kernel=='') {
                    // Por defecto
                    $z = 4;
                    $kernel = (10*$z)+9;
                }
                $array_memoria[0] = $acumulador;
                for ($j=1; $j <= $kernel; $j++) {
                    $array_memoria[$j] = '***RESERVADO KERNEL***';
                }
                foreach ($lista_completa as $cadena) {
                    array_push($array_memoria, $cadena);
                }
                foreach ($lista_variables_valor as $cadena) {
                    array_push($array_memoria, $cadena);
                }
                if ($memoria < count($array_memoria)) {
                    echo 'Memoria llena, ya no hay espacio para más programas';
                }else{
                    $var = $memoria - count($array_memoria);
                    for ($i=0; $i < $var-1; $i++) { 
                        array_push($array_memoria, null );
                    }
                }
                
                if (count($lista_programas)-1<=0) {
                    $posicion = 0;
                }else {
                    $posicion = count($lista_programas)-1;
                }
                $archivo = fopen('carpeta_archivo/'.$lista_programas[$posicion],'r');
                $nombre_fichero = 'carpeta_archivo/'.$lista_programas[$posicion];
                $vacio=(!file_exists($nombre_fichero) || !filesize($nombre_fichero)) ? FALSE : TRUE;
                fclose($archivo);
                if (!$vacio) {
                    echo 'El archivo: '.$lista_programas[0].' está vacío';
                }
                elseif ($cont != 0) {
                    echo 'SINTAXIS INCORRECTA. Se encontraron errores de sintaxis en el archivo en las siguientes lineas';
                    for ($j=0; $j < count($errores) ; $j++) {
                        var_dump($errores[$j]);
                    }
                }
                else{
                    validacion_extrema($lista_programas, $lista_completa, $lista_ignorada_comentarios, $lista_variables, $lista_etiquetas, $kernel, $lista_etiquetas_posicion, $lista_variables_valor, $acumulador);
                }
            }
        ?>
        <?php function validacion_extrema($lista_programas, $lista_completa, $lista_ignorada_comentarios, $lista_variables, $lista_etiquetas, $kernel, $lista_etiquetas_posicion, $lista_variables_valor, $acumulador) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                        <?php tabla_chprogramas($lista_programas, $lista_completa, $lista_variables, $kernel); ?>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <?php tabla_instrucciones($lista_completa, $kernel); ?>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <?php tabla_variables($lista_variables, $lista_completa, $kernel, $lista_programas); ?>
                                <?php tabla_etiquetas($lista_etiquetas, $kernel, $lista_etiquetas_posicion); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                        <?php tabla_memoriaprincipal($lista_completa, $kernel, $lista_variables, $lista_variables_valor, $acumulador); ?>
                        <div class="mt-3">
                            <?php tabla_comentarios($lista_ignorada_comentarios); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>