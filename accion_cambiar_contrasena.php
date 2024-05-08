<?php
$dir = dirname(__FILE__);
require_once $dir . "/accion_conexion.php";
require_once $dir . "/accion_correo.php";
$link = conectarse();

$email = mysqli_real_escape_string($link, $_POST['email']);
$hash = md5(uniqid(rand(), true));

$existe_correo = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email'");
$fila = mysqli_fetch_array($existe_correo);

if (mysqli_num_rows($existe_correo) > 0) {
        $update_query = "UPDATE usuario SET hash='$hash' WHERE email='$email'";
        mysqli_query($link, $update_query);
        $envio_correo = enviarCorreo($email, "Cambiar Contraseña ElectroLed", "http://localhost/ElectroLed-main/cambiar_contrasena.php?email=" . urlencode($email) . "&hash=$hash");
        exit();
} else {
        exit();
}

mysqli_close($link);
?>