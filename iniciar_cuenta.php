<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Empresa</title>
    <link rel="stylesheet" type="text/css" href="css/iniciar_cuenta.css">
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>
    <section>
        <form action="accion_iniciar_cuenta.php" method="POST">
            <div>
                <label for="nombre">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div>
                <?php
                if(isset($_GET["error"])) {
                  $error = $_GET["error"];
                    switch ($error) {
                      case "error_datos":
                          echo "<p style='color: red;'>Datos Erroneos</p>";
                          break;
                      default:
                          echo "<p style='color: red;'>Error intente mas tarde.</p>";
                    }
                }
                ?>
            </div>
            <div>
                <button type="submit">Iniciar Sesión</button>
                <a href="crear_cuenta.php">Crear Nueva Cuenta</a>
                <a href="cambiar_contrasena_email.html">Olvidaste tu contraseña</a>
            </div>
        </form>
    </section>
    <footer>
        <p>Derechos de autor © 2024 Empresa XYZ. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
