<?php
session_start();
$dir = dirname(__FILE__);
require_once $dir . "/accion_conexion.php";
require_once $dir . "/accion_logs.php";
require_once $dir . "/accion_correo.php";
$link = conectarse();

$email = mysqli_real_escape_string($link, $_POST["email"]);
$contrasena = mysqli_real_escape_string($link, $_POST["contrasena"]);
$ip = $_SERVER['REMOTE_ADDR'];

$r = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email'");
if(mysqli_num_rows($r) == 1) {
    $fila = mysqli_fetch_array($r);
    if($fila["activa"] == 1){
        if($contrasena == $fila["contrasena"]) {
            $_SESSION["cc"] = $fila["id"];
            header("Location: cuenta.php");
            insertarDatosLogInicioSesion($email, $ip, 1);
            exit();
        } else {
            if($fila["intentos"] == 3){
                $intentos_update = "UPDATE usuario SET intentos = 0 WHERE email='$email'";
                mysqli_query($link, $intentos_update);
                $envio_correo = enviarCorreo($email, "Intentaron acceder a tu cuenta.", "Cuidado intentaron acceder a tu cuenta.");
                insertarDatosLogInicioSesion($email, $ip, 0);
                header("Location: iniciar_cuenta.php?error=error_datos");
                exit();
            } else {
               $intentos = $fila["intentos"] + 1;
               $intentos_update = "UPDATE usuario SET intentos = $intentos WHERE email='$email'";
               mysqli_query($link, $intentos_update);
               insertarDatosLogInicioSesion($email, $ip, 0);
               header("Location: iniciar_cuenta.php?error=error_datos"); 
               exit();
            }
        }
    } else {
        echo "Verifica tu correo electrónico";
        insertarDatosLogInicioSesion($email, $ip, 0);
        exit();
    }
} else {
    insertarDatosLogInicioSesion($email, $ip, 0);
    header("Location: iniciar_cuenta.php?error=error_datos");
    exit();
}
?>
