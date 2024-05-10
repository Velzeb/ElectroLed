<!DOCTYPE html>
<?php
session_start();
$dir = dirname(__FILE__);
require_once $dir . "/accion_conexion.php";
$link = conectarse();
?>
<html lang="es">
<head>
    <title>Inicio - Electroled</title>
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
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(255, 255, 255, 0.8);">
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
          <?php
            if(isset($_SESSION["cc"])) {
          ?>
            <a class="nav-link hvr-float" href="cuenta.php">Cuenta</a>
          <?php
          }else {
          ?>
            <a class="nav-link hvr-float" href="iniciar_cuenta.php">Iniciar Sesion</a>
          <?php
          }
          ?>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<!-- carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/1.jpg" class="d-block w-100" alt="1">
                        <div class="carousel-caption d-none d-md-block text-center" style="top: 65%; transform: translateY(-50%); font-size: 2em;">
                            <p class="fs-1 fw-bold hvr-grow-rotate">Confiables</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/2.jpg" class="d-block w-100" alt="2">
                        <div class="carousel-caption d-none d-md-block text-center" style="top: 65%; transform: translateY(-50%); font-size: 2em;">
                            <p class="fs-1 fw-bold hvr-grow-rotate">Seguras</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/3.jpg" class="d-block w-100 " alt="3">
                        <div class="carousel-caption d-none d-md-block text-center" style="top: 65%; transform: translateY(-50%); font-size: 2em;">
                            <p class="fs-1 fw-bold hvr-grow-rotate">Duraderas</p>
                        </div>
                    </div>
            </div>
  </div>

<!-- refran -->
<div class="container d-flex  w-50 text-center " data-aos="fade-up" >
  <p class="mt-5 fs-4 text fw-light fst-italic ">"En ElectroLed, herramientas para cada tarea, soluciones que nunca fallan, y calidad que perdura."</p>
</div>

<!-- promociones -->
<div class="container mt-5 " data-aos="fade-up">
    <img src="images/5.png" class="img-fluid" alt="5">
</div>

<!-- productos -->
<div class="container mt-5" data-aos="fade-up">
  <div class="card-group ">
    <div class="card border-0 hvr-grow">
      <img src="images/brocha.png" class="card-img-top" alt="...">
      <div class="card-body ">
        <h5 class="card-title">Brocha Wilson</h5>
        <p class="card-text">Perfecta para trabajos de pintura. Proporciona un acabado suave y uniforme en interiores y exteriores.</p>
        <p class="fs-6">80bs</p>
      </div>
    </div>
    <div class="card border-0 hvr-grow">
      <img src="images/multimetro.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Multimetro JZK</h5>
        <p class="card-text">Herramienta esencial para medir voltaje, corriente, resistencia y más. Ideal para electricistas y aficionados al bricolaje.</p>
        <p class="fs-6">300bs</p>
      </div>
    </div>
    <div class="card border-0 hvr-grow">
      <img src="images/foco.png" class="card-img-top" alt="...">
      <div class="card-body ">
        <h5 class="card-title">Foco Led Phillips</h5>
        <p class="card-text">Foco LED de alta calidad para iluminar áreas de trabajo, jardines y patios. Duradero y eficiente en energía.</p>
        <p class="fs-6">50bs</p>
      </div>
    </div>
  </div>
  <div class="container mt-3 text-center">
    <a class="btn btn-dark hvr-float" href="#" role="button">
      Ver Todo 
      <i class="fa-solid fa-arrow-right fa-sm "></i>
    </a>
  </div>
</div>


<!-- pie de pagina -->
<footer class="bg-dark text-light text-center py-4 mt-5">
    <div class="container">
        <p class="fs-1 fw-bold mb-4">Contáctanos</p>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                    <iframe class="embed-responsive-item hvr-grow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2705.1058183940454!2d-68.14280986157281!3d-16.495914473427007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f21e873f907b9%3A0x90430e8c5a350266!2sElectro%20LED!5e0!3m2!1ses!2sbo!4v1715227731417!5m2!1ses!2sbo" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
            </div>
        </div>
        <div class="social-icons mt-4">
            <a href="https://www.facebook.com/?locale=es_LA" target="_blank" class="text-light me-3"><i class="fab fa-facebook fa-2x hvr-grow-rotate"></i></a>
            <a href="https://www.instagram.com/" target="_blank" class="text-light me-3"><i class="fab fa-instagram fa-2x hvr-grow-rotate"></i></a>
            <a href="https://www.whatsapp.com/?lang=es_LA" target="_blank" class="text-light"><i class="fab fa-whatsapp fa-2x hvr-grow-rotate"></i></a>
        </div>
        <p class="mt-4">&copy; 2024 Electroled | Todos los derechos reservados.</p>
    </div>
</footer>
    
</body>
<!-- animacion -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</html>

