<? include('../conexion/conexion.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <main>
    <section>

    </section>
    <div class="principal">
      <form action="../SERVIDOR/validacion.php" method="POST">
        <h1>Login</h1>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="contraseña" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div  id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>Usuario o contraseña incorrecto </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
   
  </main>


  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    let alerta = document.getElementById('alerta');

    if (error) {
      alerta.style.display = 'block';
        }
   
  </script>
  <style>
    main {
      display: grid;
      grid-template-columns: 60% 40%;
      justify-content: center;

    }

    section {
      background-image: url('https://mentor.pe/wp-content/uploads/2023/10/utp-sede-central-diarioahora.pe_.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
    }

    .principal {
      display: flex;
      flex-direction: column;
      margin: auto;
      width: 50%;
    }
    #alerta{
      display: none;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>