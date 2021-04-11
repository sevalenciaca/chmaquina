<!-- CH PROGRAMAS -->
<?php function tabla_chprogramas($lista_programas){ ?>
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
                for ($i=0; $i < count($lista_programas); $i++) {
                    $number = $i;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$string.'</td>
                        <td>'.$lista_programas[$i].'</td>
                        <td>28</td>
                        <td>11</td>
                        <td>32</td>
                        <td>38</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- MEMORIA PRINCIPAL -->
<?php function tabla_memoriaprincipal($lista_completa, $kernel){ ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color: #212529; color:white">MEMORIA PRINCIPAL</p>
    <table class="table table-dark table-striped shadow">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Direct</th>
                <th scope="col">Contenido</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><i class="fas fa-sort-amount-down" style="color: red;"></i></th>
                <td>0000</td>
                <td>0</td>
            </tr>
            <?php
                for ($i=0; $i < $kernel; $i++) {
                    $number = $i+1;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                    <th scope="row"><i class="fas fa-window-maximize" style="color: green;"></i></th>
                        <td>'.$string.'</td>
                        <td>***KERNEL SEBAS***</td>
                    </tr>
                    '
                    ;
                }
            ?>
            <?php
                for ($i=0; $i < count($lista_completa); $i++) {
                    $number = $i+$kernel+1;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <th scope="row"><i class="fas fa-file-code" style="color: yellow;"></i></th>
                        <td>'.$string.'</td>
                        <td>'.$lista_completa[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- INSTRUCCIONES -->
<?php function tabla_instrucciones($lista_completa, $kernel){ ?>
    <table class="table table-light table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Instrucción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($lista_completa); $i++) {
                    $number = $i+$kernel+1;
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$string.'</td>
                        <td>'.$lista_completa[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- COMENTARIOS -->
<?php function tabla_comentarios($lista_ignorada_comentarios){ ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color:#FFF3CD">COMENTARIOS (LINEAS IGNORADAS)</p>
    <table class="table table-warning table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Comentario</th>
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
<?php function tabla_variables($lista_variables, $lista_completa, $kernel){ ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color:#C5E8EF">VARIABLES</p>
    <table class="table table-info table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Variable</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i <= count($lista_variables)-1; $i++) {
                    $number = $i+$kernel+1+count($lista_completa);
                    $length = 4;
                    $string = substr(str_repeat(0, $length).$number, - $length);
                    echo 
                    '
                    <tr>
                        <td scope="row">'.$string.'</td>
                        <td>'.$lista_variables[$i].'</td>
                    </tr>
                    '
                    ;
                }
            ?>
        </tbody>
    </table>
<?php } ?>
<!-- ETIQUETAS -->
<?php function tabla_etiquetas($lista_etiquetas){ ?>
    <p class="fs-5 mb-0 p-2 d-flex justify-content-center" style="background-color:#C5E8EF">ETIQUETAS</p>
    <table class="table table-info table-striped shadow">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Etiqueta</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i <= count($lista_etiquetas)-1; $i++) {
                    $number = $i;
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