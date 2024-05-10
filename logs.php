<?php
$dir = dirname(__FILE__);
require_once $dir."\accion_logs.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2 class="mt-5">Logs</h2>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>IP</th>
                <th>Exitoso</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $datos = obtenerDatosLog();
            mostrarDatosLog($datos);
           ?> 
        </tbody>
    </table>
</div>
</body>
</html>
