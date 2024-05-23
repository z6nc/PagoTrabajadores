<?php
include('../acceso/conexion.php');
session_start();
session_destroy();
header("Location: ../VISTA/login.php");
?>