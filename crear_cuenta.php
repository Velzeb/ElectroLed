<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Empresa</title>
    <link rel="stylesheet" type="text/css" href="css/crear_cuenta.css">
</head>
<body>
    <header>
        <h1>Crear Nueva Cuenta</h1>
    </header>
    <section>
        <form action="accion_crear_cuenta.php" method="POST">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="nombre">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
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
                      case "email_existente":
                          echo "<p style='color: red;'>Email ya registrado.</p>";
                          break;
                      case "registro_error":
                          echo "<p style='color: red;'>Error al registrarte.</p>";
                          break;
                      default:
                          echo "<p style='color: red;'>Error intente mas tarde.</p>";
                    }
                }
                ?>
            </div>
            <div>
                <button type="submit">Crear Cuenta</button>
            </div>
        </form>
    </section>
    <footer>
        <p>Derechos de autor © 2024 Empresa XYZ. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
