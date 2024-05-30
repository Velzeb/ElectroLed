<?php
require 'accion_conexion.php';

$con = conectarse();


echo "Datos POST: ";
print_r($_POST);

$cantidad = $_POST['cantidad'];
$subtotal = $_POST['subtotal'];
$compra_id = $_POST['compra_id'];
$producto_id = $_POST['producto_id'];

mysqli_query($con, "INSERT INTO detalle_compra (cantidad, subtotal, compra_id, producto_id) VALUES ($cantidad, $subtotal, $compra_id, $producto_id)");

mysqli_query($con, "UPDATE producto SET cantidad = cantidad + $cantidad WHERE id = $producto_id");

mysqli_close($con);



?>

