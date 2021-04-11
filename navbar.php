<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand"><i class="fas fa-laptop-code"></i> CH MÁQUINA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-file-alt"></i> Archivo
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <form method="POST" action="upload.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="p-2">
                                        <input type="file" class="form-control-file" name="uploadedFile"/>
                                    </div>
                                    <div class="p-2">
                                        <input type="submit" name="uploadBtn" value="Cargar"/>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-upload"></i> Cargar</a></li> -->
                    </ul>
                </li>
                <li class="d-flex align-items-center nav-item">
                    <button type="button" class="btn btn-secondary btn-sm" form="form1"><i class="fas fa-play"></i> Ejecutar</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-pause"></i> Pausar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-list"></i> Pasos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-memory"></i> Memoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-book"></i> Instrucciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/eliminar.php"><i class="fas fa-sign-out-alt"></i> Salir (Eliminar)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>