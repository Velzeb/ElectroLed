<?php
require 'accion_conexion.php';
$con = conectarse();

echo "Datos POST: ";
print_r($_POST);

$cantidad = $_POST['cantidad'];
$subtotal = $_POST['subtotal'];
$producto_id = $_POST['producto_id'];
$venta_id = $_POST['venta_id'];

mysqli_query($con, "INSERT INTO detalle_venta (cantidad, subtotal, venta_id, producto_id) VALUES ($cantidad, $subtotal, $venta_id, $producto_id)");

mysqli_query($con, "UPDATE producto SET cantidad = cantidad - $cantidad WHERE id = $producto_id");

mysqli_close($con);
?>