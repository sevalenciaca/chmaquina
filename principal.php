<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    <?php //tabla_chprogramas($lista_programas, $lista_completa, $lista_variables, $kernel); ?>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_instrucciones($lista_completa, $kernel); ?>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <?php //tabla_variables($lista_variables, $lista_completa, $kernel, $lista_programas); ?>
                            <?php //tabla_etiquetas($lista_etiquetas, $kernel, $lista_etiquetas_posicion); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                    <?php tabla_memoriaprincipal($array_memoria_principal, $kernel); ?>
                    <div class="mt-3">
                        <?php //tabla_comentarios($lista_ignorada_comentarios); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>