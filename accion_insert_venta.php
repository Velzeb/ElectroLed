<?php
require 'accion_conexion.php';
$con = conectarse();
//venta
$fecha = $_POST['fecha'];
$total = $_POST['total'];
$admin_id = $_POST['admin_id'];
$clie_id = $_POST['clie_id'];

mysqli_query($con, "INSERT INTO venta (fecha, total, usuario_id, usuario_2_id) 
VALUES ('$fecha', $total, $admin_id, $clie_id)");
$venta_id = mysqli_insert_id($con);
echo "$venta_id";

?>