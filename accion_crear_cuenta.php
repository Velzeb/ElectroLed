<?php
$dir = dirname(__FILE__);
require_once $dir . "/accion_conexion.php";
require_once $dir . "/accion_correo.php";
$link = conectarse();

$nombre = mysqli_real_escape_string($link, $_POST['nombre']);
$apellido = mysqli_real_escape_string($link, $_POST['apellido']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$contrasena = mysqli_real_escape_string($link, $_POST['contrasena']);
$hash = md5(uniqid(rand(), true));

$existe_correo = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email'");
$fila = mysqli_fetch_array($existe_correo);

if (mysqli_num_rows($existe_correo) > 0) {
    if ($fila["activa"] == 0) {
        $update_query = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena', hash='$hash' WHERE email='$email'";
        if(mysqli_query($link, $update_query)){
            echo "Verifica tu correo electrónico";
            $envio_correo = enviarCorreo($email, "Verificar Correo ElectroLed", "http://localhost/ElectroLed-main/accion_verificar_correo.php?email=" . urlencode($email) . "&hash=$hash");
            exit();
        }else{
            header("Location: crear_cuenta.php?error=registro_error");
            exit();
        }
    } else {
        header("Location: crear_cuenta.php?error=email_existente");
        exit();
    }
} else {
    $insert_query = "INSERT INTO usuario (nombre, apellido, email, contrasena, hash, activa, intentos) VALUES ('$nombre', '$apellido', '$email', '$contrasena', '$hash', 0, 0)";
    if (mysqli_query($link, $insert_query)) {
        echo "Verifica tu correo electrónico";
        $envio_correo = enviarCorreo($email, "Verificar Correo ElectroLed", "http://localhost/ElectroLed-main/accion_verificar_correo.php?email=" . urlencode($email) . "&hash=$hash");
        exit();
    } else {
        header("Location: crear_cuenta.php?error=registro_error");
        exit();
    }
}

mysqli_close($link);
?>
