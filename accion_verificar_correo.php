<?php
$dir = dirname(__FILE__);
require_once $dir."\accion_conexion.php";
$link = conectarse();

$email = mysqli_real_escape_string($link, $_GET['email']);
$hash = mysqli_real_escape_string($link, $_GET['hash']);

$verificar_usuario = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email' AND hash='$hash' AND activa='0'");

if(mysqli_num_rows($verificar_usuario) > 0) {
    mysqli_query($link, "UPDATE usuario SET activa='1' WHERE email='$email' AND hash='$hash' AND activa='0'");
    header("Location: iniciar_cuenta.php");
    exit();
} else {
    echo "El enlace de verificación es inválido o tu cuenta ya ha sido verificada.";
}

mysqli_close($link);
?>
