<?php
$dir = dirname(__FILE__);
require_once $dir."\accion_conexion.php";
$link = conectarse();

$email = mysqli_real_escape_string($link, $_GET['email']);
$hash = mysqli_real_escape_string($link, $_GET['hash']);

$verificar_usuario = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email' AND hash='$hash' AND activa='1'");

if(mysqli_num_rows($verificar_usuario) > 0) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nueva_contrasena = mysqli_real_escape_string($link, $_POST['contrasena']);

        mysqli_query($link, "UPDATE usuario SET contrasena='$nueva_contrasena' WHERE email='$email' AND hash='$hash' AND activa='1'");

        echo "¡Tu contraseña ha sido cambiada exitosamente! Ahora puedes iniciar sesión con tu nueva contraseña.";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña - Empresa</title>
    <link rel="stylesheet" type="text/css" href="css/cambiar_contrasena.css">
</head>
<body>
    <header>
        <h1>Cambiar contraseña</h1>
    </header>
    <section>
        <form  method="post">
            <div>
                <label for="contrasena">Nueva Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div>
                <button type="submit">Cambiar contraseña</button>
            </div>
        </form>
    </section>
    <footer>
        <p>Derechos de autor © 2024 Empresa XYZ. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
} else {
    echo "El enlace es inválido.";
}

mysqli_close($link);
?>
