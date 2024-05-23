<?php
include('../acceso/conexion.php');

session_start();

$idUsuario = $_SESSION['USUARIO'];

if (!isset($_SESSION['USUARIO'])) {
    header("Location: VISTA/login.php");
}

?>
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Reportes De trabajo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Usuario : <?php echo $idUsuario ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="VistaAdministrador.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <button>
                            <a href="../SERVIDOR/CerrarSession.php">Cerrar Sesion</a>
                        </button>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>