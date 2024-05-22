<?php
include('../acceso/conexion.php');
session_start();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];

$sql = "SELECT TRABAJADOR.USUARIO, TRABAJADOR.CONTRASEÑA, JERARQUIA.JERARQUIA 
        FROM TRABAJADOR
        INNER JOIN JERARQUIA ON TRABAJADOR.ID_JERARQUIA = JERARQUIA.ID_JERARQUIA
        WHERE TRABAJADOR.USUARIO = ? AND TRABAJADOR.CONTRASEÑA = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['USUARIO'] = $row['USUARIO'];
        $_SESSION['JERARQUIA'] = $row['JERARQUIA'];
        
        if ($row['JERARQUIA'] == 'ADMINISTRADOR') {
            header('Location: ../VISTA/VistaAdministrador.php');
        } else if ($row['JERARQUIA'] == 'EMPLEADO') {
            header('Location: ../VISTA/VistaEmpleado.php');
        }
    } else {
        header('Location: ../VISTA/login.php?error=invalid_credentials');
    }
    
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

$conn->close();
?>
