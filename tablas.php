<!-- CH PROGRAMAS -->
<?php function tabla_chprogramas($array_programas, $instrucciones_juntas, $kernel, $directorio, $matriz_variables_nueva){ ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color: #212529; color:white">CH PROGRAMAS</p>
    <table class="table table-dark table-striped shadow">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Programa</th>
                <th scope="col"># Instrucciones</th>
                <th scope="col">RB</th>
                <th scope="col">RLC</th>
                <th scope="col">RLP</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // $RB = $kernel+1;
                // $RLC = $kernel + count($instrucciones_juntas);
                // $RLP = $kernel + $no_instrucciones;
                for ($i=0; $i < count($array_programas); $i++) {
                    $instrucciones = otros_archivos(lectura_archivo2($directorio, $array_programas[$i]), $matriz_variables_nueva);
                    $posicion = substr(str_repeat(0, 4).$i, - 4);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$posicion.'</td>
                        <td>'.$array_programas[$i].'</td>
                        <td>'.count($instrucciones).'</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- MEMORIA PRINCIPAL -->
<?php function tabla_memoriaprincipal($array_memoria_principal, $kernel) { ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color: #212529; color:white">MEMORIA PRINCIPAL</p>
    <div class="table-wrapper-scroll-y my-custom-scrollbar shadow fs-6">
        <table class="table table-dark table-striped shadow">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Posición</th>
                    <th scope="col">Contenido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><i class="fas fa-layer-group fa-lg" style="color: red;"></i></th>
                    <td>0000</td>
                    <td><?php echo $array_memoria_principal[0]; ?></td>
                </tr>
                <?php
                    for ($i=1; $i <= $kernel; $i++) {
                        $posicion = substr(str_repeat(0, 4).$i, - 4);
                        echo
                        '
                        <tr>
                            <th scope="row"><i class="fas fa-sd-card fa-lg" style="color: green;"></i></th>
                            <td>'.$posicion.'</td>
                            <td>'.$array_memoria_principal[$i].'</td>
                        </tr>
                        '
                        ;
                    }
                    for ($i=$kernel+1; $i < count($array_memoria_principal); $i++) {
                        $posicion = substr(str_repeat(0, 4).$i, - 4);
                        echo '
                        <tr>
                        <th scope="row"><i class="fas fa-file-code fa-lg" style="color: yellow;"></i></th>
                        <td>'.$posicion.'</td>
                        <td>'.$array_memoria_principal[$i].'</td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<!-- INSTRUCCIONES -->
<?php function tabla_instrucciones($array_memoria_principal2, $kernel, $instrucciones_juntas){ ?>
    <div class="table-wrapper-scroll-y2 my-custom-scrollbar2">
        <table class="table table-light table-striped shadow">
            <thead>
                <tr>
                    <th scope="col">Posición</th>
                    <th scope="col">Instrucción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=(1+$kernel); $i < (1+$kernel) + count($instrucciones_juntas); $i++) {
                        $posicion = substr(str_repeat(0, 4).$i, - 4);
                        echo 
                        '
                        <tr>
                            <td scope="row">'.$posicion.'</td>
                            <td>'.$array_memoria_principal2[$i].'</td>
                        </tr>
                        '
                        ;
                    }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<!-- COMENTARIOS -->
<?php function tabla_comentarios($lista_ignorada_comentarios){ ?>
    <table class="table table-warning table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Comentarios (Lineas ignoradas)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($lista_ignorada_comentarios); $i++) {
                    $number = $i;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <td>'.$lista_ignorada_comentarios[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- VARIABLES -->
<?php function tabla_variables($lista_variables, $lista_completa, $kernel, $lista_programas){ ?>
    <table class="table table-info table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Variable</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($j=0; $j < count($lista_programas); $j++) {
                    $number2 = $j;
                }
                for ($i=0; $i < count($lista_variables); $i++) {
                    $number = $i+$kernel+1+count($lista_completa);
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    $proceso = substr(str_repeat(0, $length).$number2, - $length);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$string.'</td>
                        <td>'.$proceso.' '.$lista_variables[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- ETIQUETAS -->
<?php function tabla_etiquetas($lista_etiquetas, $kernel, $lista_etiquetas_posicion){ ?>
    <table class="table table-info table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Etiqueta</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($lista_etiquetas); $i++) {
                    $posicion = (int)$lista_etiquetas_posicion[$i];
                    $number = $posicion+$kernel;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$string.'</td>
                        <td>'.$lista_etiquetas[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>