<?php if (validacion_directorio($directorio)) { ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    <?php tabla_chprogramas($array_programas, $directorio, $_SESSION['kernel'], $array_memoria_principal); ?>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_instrucciones($array_memoria_principal2, $kernel, $instrucciones_juntas); ?>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_variables($lista_variables, $lista_completa, $kernel, $lista_programas); ?>
                            <?php //tabla_etiquetas($lista_etiquetas, $kernel, $lista_etiquetas_posicion); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                    <div id="memoriap" style="display: block;">
                        <?php //tabla_memoriaprincipal($array_memoria_principal, $kernel); ?>
                    </div>
                    <div class="mt-3">
                        <?php //tabla_comentarios($lista_ignorada_comentarios); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }else{ ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    <?php //tabla_chprogramas($array_programas, $directorio, $_SESSION['kernel'], $array_memoria_principal); ?>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_instrucciones($array_memoria_principal2, $kernel, $instrucciones_juntas); ?>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_variables($lista_variables, $lista_completa, $kernel, $lista_programas); ?>
                            <?php //tabla_etiquetas($lista_etiquetas, $kernel, $lista_etiquetas_posicion); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                    <div id="memoriap" style="display: block;">
                        <?php tabla_mpvacia($mp_vacia, $_SESSION['kernel'], $_SESSION['memoria']); ?>
                    </div>
                    <div class="mt-3">
                        <?php //tabla_comentarios($lista_ignorada_comentarios); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>