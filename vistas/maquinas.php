<div class="container mt-4 mb-3">
    <div class="row d-flex align-items-center">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="position-relative">
                <img class="p-2 img-fluid" src="img/cpu.png" alt="CPU">
                <div class="p-4 position-absolute top-0 end-0 start-0 botton-0">

                    <form id="formCPU" name="formulario" method="post" action="botones/ejecutar.php">
                        <label class="form-label" style="color:white">
                            <strong>Velocidad</strong>
                        </label>
                        <input type="range" class="form-range" name="velocidad">
                        <div class="input-group mt-3">
                            <span class="input-group-text"><strong>Memoria</strong></span>
                            <input type="number" min="0" max="9999" value="0" name="memoria" class="form-control">
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text"><strong>Kernel</strong></span>
                            <input type="number" min="0" max="9999" value="49" name="kernel" class="form-control">
                        </div>
    
                        <!-- <div class="mt-0 d-flex justify-content-center" style="color:white">
                            <input class="btn btn-link text-decoration-none fw-bold" type="submit" value="CARGAR DATOS" style="color: white;"/>
                        </div> -->

                    </form>

                    <div class="mt-4 ps-2 d-flex justify-content-center" style="color:white">
                        <strong>ACUMULADOR: <?php echo $acumulador ?></strong>
                    </div>

                </div>
            </div>
        </div>
        <div class="position-relative col-12 col-md-4 col-lg-5 col-xl-5">
            <img src="img/monitor.png" class="img-fluid" alt="Monitor">
            <div class="p-4 ms-3 position-absolute top-0 end-0 start-0 botton-0" style="color:#2fff00">
                <!-- > _ Resultado = 145 -->
            </div>
        </div>
        <div class="position-relative col-12 col-md-4 col-lg-4 col-xl-4 mb-3">
            <img src="img/impresora.png" class="img-fluid" alt="Impresora">
            <div class="mt-2 position-absolute top-0 start-50 end-0 botton-0">
                <button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-power-off"></i> Imprimir</button>
            </div>
            <div class="position-absolute top-50 start-50 end-0 botton-0 translate-middle">
                <!-- Resultado = 145 -->
            </div>
        </div>
    </div>
</div>