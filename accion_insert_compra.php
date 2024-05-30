
<?php
require 'accion_conexion.php';
$con = conectarse();
//compra 
$fecha = $_POST['fecha'];
$total = $_POST['total'];
$proveedor_id = $_POST['proveedor_id'];

mysqli_query($con, "INSERT INTO compra (fecha, total, proveedor_id) VALUES ('$fecha', $total, $proveedor_id)");
$compra_id = mysqli_insert_id($con);
echo "$compra_id";
?>