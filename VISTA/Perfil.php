<?php
include('../acceso/conexion.php');

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['USUARIO'])) {
    header("Location: login.php");
    exit(); // Detener la ejecución del script después de redirigir
}

$idUsuario = $_SESSION['USUARIO'];

// Preparar la consulta para evitar inyecciones SQL
$sqlConsulta = $conn->prepare("SELECT TRABAJADOR.*, JERARQUIA.JERARQUIA, GENERO.GENERO 
FROM TRABAJADOR
INNER JOIN JERARQUIA ON TRABAJADOR.ID_JERARQUIA = JERARQUIA.ID_JERARQUIA
INNER JOIN GENERO ON TRABAJADOR.ID_GENERO = GENERO.ID_GENERO
WHERE USUARIO = ? ");
$sqlConsulta->bind_param("s", $idUsuario); // Suponiendo que el ID es un string
$sqlConsulta->execute();
$result = $sqlConsulta->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <main style=" width: 100vh;  display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; "> 
        <h1>Perfil </h1>
    <?php if ($result->num_rows > 0) { // Verificar si hay resultados
        while ($row = $result->fetch_assoc()) { ?>
            <section style="display: flex; border-radius: 20px; flex-direction: column; justify-content: center; align-items: center;"  >
                <h2> <?php echo htmlspecialchars($row['NOMBRE']); ?></h2>
                <p> <?php echo htmlspecialchars($row['FECHA_CUMPLEAÑOS']); ?></p>
                <p> <?php echo htmlspecialchars($row['JERARQUIA']); ?></p>

                <p> <?php echo htmlspecialchars($row['GENERO']); ?></p>
                <button type="button" class="btn btn-danger" >
                 <a style="color:white" href="../SERVIDOR/CerrarSession.php">Cerrar Sesion</a>
                </button>

            </section>
        <?php }
    } else { ?>
        <p>No se encontraron datos del trabajador.</p>
    <?php } ?>

    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
