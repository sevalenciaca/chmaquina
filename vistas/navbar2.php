<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-laptop-code"></i> CH MÁQUINA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-file-alt"></i> Archivo
                    </a>
                    <ul class="dropdown-menu disabled" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <?php
                            if (isset($_SESSION['tam'])) {
                                if ($_SESSION['tam'] < $_SESSION['memoria']) {
                                    include('botones/archivo.php');
                                }else {
                                    include('botones/archivo2.php');
                                    unset($_SESSION['tam']);
                                }
                            }else {
                                include('botones/archivo.php');
                            }
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" type="submit" form="formCPU"><i class="fas fa-play"></i> Ejecutar</button>
                    <!-- <a class="nav-link" form=><i class="fas fa-play"></i> Ejecutar</a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="fas fa-pause"></i> Pausar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="fas fa-list"></i> Pasos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-memory"></i> Memoria
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="javascript:document.getElementById('memoriap').style.display='block';void0"><i class="fas fa-eye"></i> Mostrar</a></li>
                        <li><a class="dropdown-item" href="javascript:document.getElementById('memoriap').style.display='none';void0"><i class="fas fa-eye-slash"></i> Ocultar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-book"></i> Instrucciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-trash"></i> Eliminar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../botones/eliminar.php">Todos los programas</a></li>
                        <li><a class="dropdown-item" href="../botones/eliminarultimo.php">Último programa</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
                <!-- <li class="nav-item"> -->
                    <!-- <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Prueba</a> -->
                    <!-- <button type="button" class="btn btn-info" id='mostrar_fileupload_contrato' style="margin-left: 10px">Subir</button> -->
                <!-- </li> -->
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info-circle"></i> Para iniciar el programa debe ingresar los valores de la <strong>memoria</strong> y el <strong>kernel</strong>
                e inmediatamente darle en el botón <strong><span>" <i class="fas fa-play"></i> Ejecutar"</span></strong>
            </div>
        </div>
    </div>
</div>