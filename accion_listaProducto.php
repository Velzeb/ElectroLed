<?php
require 'accion_conexion.php';
$con = conectarse();

$query = "SELECT * FROM producto";
$resultado = mysqli_query($con, $query);

$productos = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $productos[] = $row;
}

mysqli_close($con);
?>