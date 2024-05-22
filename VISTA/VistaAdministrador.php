<?php
include('../acceso/conexion.php');

session_start();

$idUsuario = $_SESSION['USUARIO'];

if (!isset($_SESSION['USUARIO'])) {
    header("Location: VISTA/login.php"); 
}


// Hacer la consulta
$sql = "SELECT TRABAJADOR.*, JERARQUIA.JERARQUIA, GENERO.GENERO, PAGOS.*
        FROM TRABAJADOR
        INNER JOIN JERARQUIA ON TRABAJADOR.ID_JERARQUIA = JERARQUIA.ID_JERARQUIA
        INNER JOIN GENERO ON TRABAJADOR.ID_GENERO = GENERO.ID_GENERO
        INNER JOIN PAGOS ON TRABAJADOR.ID_TRABAJADOR = PAGOS.ID_TRABAJADOR
        WHERE JERARQUIA.ID_JERARQUIA = '2'";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<div  id="alertas" class="alert alert-dismissible fade show" role="alert">
        <div></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <nav>
       <?php include('navbar.php') ?>
    </nav>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">USUARIO</th>
                <th scope="col">JERARQUIA</th>
                <th scope="col">FECHA CUMPLEAÑOS</th>
                <th scope="col">GENERO</th>
                <th scope="col">SALARIO POR HORA</th>
                <th scope="col">HORAS DE TRABAJO</th>
                <th scope="col">IMPUESTO</th>
                <th scope="col">SUELDO BRUTO</th>
                <th scope="col">DESCUENTO</th>
                <th scope="col">SUELDO NETO</th>
 
               
                <th scope="col">Acciones</th>



            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <th><?php echo $row['ID_TRABAJADOR'] ?></th>
                    <td><?php echo $row['NOMBRE'] ?></td>
                    <td><?php echo $row['USUARIO'] ?></td>
                    <td><?php echo $row['JERARQUIA'] ?></td>
                    <td><?php echo $row['FECHA_CUMPLEAÑOS'] ?></td>
                    <td class=""><?php echo $row['GENERO'] ?></td>
                    <td class="">S/ <?php echo $row['SALARIO'] ?></td>
                    <td class=""><?php echo $row['HORASTRABAJO']  ?> horas</td>
                    <td class=""><?php echo $row['IMPUESTO'] ?></td>
                    <td class="">S/ <?php echo $row['SUELDO_BRUTO'] ?></td>
                    <td class=""><?php echo $row['DESCUENTO_PLANILLA'] ?></td>
                    <td class="">S/ <?php echo $row['SUELDO_NETO'] ?></td>


                    <td>
                        <div>
                        <a href="editar.php?id=<?php echo $row['ID_TRABAJADOR']; ?>"> <button type="button" class="btn btn-primary">Editar</button>  </a>
                        <a href="eliminar.php?id=<?php echo $row['ID_TRABAJADOR']; ?>">  <button type="button" class="btn btn-danger">Eliminar</button></a>
                        </div>
                    </td>

                </tr>
            <?php }
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
<style>
    #alertas{
        display: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    let estado = document.querySelectorAll('.enlinea');
    estado.forEach(element => {
        if (element.innerHTML == '1') {
            element.innerHTML = '🟢';
        } else {
            element.innerHTML = '🔴';
        }
    });
</script>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const succes = urlParams.get('succes');

    let alerta = document.getElementById('alertas');
    let alertas = document.getElementById('alertas div');



    if (succes) {
        alerta.style.display = 'block';
        alerta.classList.add('alert-success');
        alertas.innerHTML = 'Se ha eliminado correctamente';
    } else if (error) {
        alerta.style.display = 'block';
        alerta.classList.add('alert-danger');
    }
</script>
</html>