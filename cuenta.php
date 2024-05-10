<!DOCTYPE html>
<?php
session_start();
$dir = dirname(__FILE__);
require_once $dir . "/accion_conexion.php";
$link = conectarse();

if(isset($_SESSION["cc"])) {
    $id_usuario = $_SESSION["cc"];
    $query = "SELECT * FROM usuario WHERE id = $id_usuario";
    $resultado = mysqli_query($link, $query);

    // Verificar si se encontró el usuario
    if(mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
?>
<html lang="es">
<head>
    <title>Cuenta - Electroled</title>
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
          <a class="nav-link hvr-float active" href="cuenta.php">Cuenta</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- contenido -->
<div class="container mt-5">
    <p class="fs-1 fw-bold ">Mi cuenta</p>
     <a href="accion_cerrar_sesion.php" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Cerrar Sesión</a>
</div>
    
<div class="container mt-5">
    <div class="row">
    <div class="col-8">
        <p class="fs-1 fw-bold ">Historial de pedidos</p>
        <div>
                <span class="fw-semibold" id="nombre" >Aún no ha hecho ningún pedido.</span>
        </div>
    </div>
    <div class="col-4">
        <p class="fs-1 fw-bold ">Detalles de cuenta</p>
        <!--  
        <div>
            <label for="ci">Ci:</label>
            <span id="ci"><?php echo $usuario["ci"];?></span>
        </div>
        -->
        <div>
            
            <span class="fw-semibold" id="nombre" ><?php echo $usuario["nombre"]; ?> <?php echo $usuario["apellido"]; ?></span>
        </div>
        <!--  
        <div>
            <label for="direccion">Dirección:</label>
            <span id="direccion"><?php echo $usuario["direccion"]; ?></span>
        </div>
        <div>
            <label for="celular">Celular:</label>
            <span id="celular"><?php echo $usuario["celular"]; ?></span>
        </div>
        -->
        <div>
            <span class="fw-semibold" id="email"><?php echo $usuario["email"]; ?></span>
        </div>
        <!-- 
        <div>
            <label for="contrasena">Contraseña:</label>
            <span id="contrasena">********</span>
        </div>
        -->
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

</body>
<?php
    } else {
        echo "No se encontró información del usuario.";
    }
} else {
    header("Location: iniciar_cuenta.php");
    exit();
}
?>
</html>
