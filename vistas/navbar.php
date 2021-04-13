<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 shadow">
    <div class="container d-flex justify-content-center">
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
                        <li> <?php include('botones/archivo.php') ?> </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-play"></i> Ejecutar</a>
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
                    <a class="nav-link" href="botones/eliminar.php"><i class="fas fa-trash"></i> Eliminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>