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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la cuenta de usuario</title>
</head>
<body>
    <div class="container">
        <h2>Detalles de la cuenta de usuario</h2>
        <div>
            <label for="ci">Ci:</label>
            <span id="ci"><?php echo $usuario["ci"]; ?></span>
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <span id="nombre"><?php echo $usuario["nombre"]; ?></span>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <span id="apellido"><?php echo $usuario["apellido"]; ?></span>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <span id="direccion"><?php echo $usuario["direccion"]; ?></span>
        </div>
        <div>
            <label for="celular">Celular:</label>
            <span id="celular"><?php echo $usuario["celular"]; ?></span>
        </div>
        <div>
            <label for="email">Correo electrónico:</label>
            <span id="email"><?php echo $usuario["email"]; ?></span>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <span id="contrasena">********</span> <!-- No mostrar la contraseña por razones de seguridad -->
        </div>
    </div>
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
