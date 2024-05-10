<!DOCTYPE html>
<html lang="es">
<head>
    <title>Restablecer contraseña - Electroled</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- animacion -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="css/hover.css" rel="stylesheet" media="all">
</head>
<body>
<!-- navbar-->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: rgba(255, 255, 255, 0.8);">
  <div class="container-fluid">
    <a class="navbar-brand hvr-grow" href="index.php">
      <img src="images/logo.png" alt="Logo" width="140" height="auto" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link hvr-float" href="#">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-float" href="#">Ofertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-float " href="iniciar_cuenta.php">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- contenido -->     
<div class="container position-absolute top-50 start-50 translate-middle ">
    <div class="row justify-content-center">
        <div class="col-md-4 hvr-grow">
        <form action="accion_cambiar_contrasena.php" method="POST">
            <p class="fs-1 fw-bold">Restablecer la contraseña</p>
            <p class="fs-normal">Te enviaremos un email para restablecer tu contraseña.</p>
            <div class="mb-3">
                <label for="nombre" class="form-label">Correo electronico:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3 text-center">
                    <?php
                    if(isset($_GET["success"])) {
                        $error = $_GET["success"];
                        switch ($error) {
                            case "correo_success":
                                ?>
                                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                      <strong> Email enviado.</strong>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                break;
                            }
                        }
                    ?>
            </div>

            <div class="mb-3 ">
                <button type="submit" class="btn btn-dark hvr-float">Enviar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- pie de pagina -->
<footer class="bg-dark text-light text-center fixed-bottom">
    <div class="container">
        <p class="mt-4">&copy; 2024 Electroled | Todos los derechos reservados.</p>
    </div>
</footer>

</body>
<!-- animacion -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</html>