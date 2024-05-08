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
</head>
<body>

<h2>Logs</h2>

<table>
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

</body>
</html>