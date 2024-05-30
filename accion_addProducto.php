<?php
require 'accion_conexion.php';
$con = conectarse();

$compra_id = $_POST['compra_id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$subtotal = $_POST['subtotal'];
$categoria_id = $_POST['categoria_id'];
$marca_id = $_POST['marca_id'];
$imagen = $_POST['imagen'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
    echo "The file ". basename( $_FILES["imagen"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

mysqli_query($con, "INSERT INTO producto (nombre, descripcion, precio, cantidad, categoria_id, imagen, marca_id) VALUES ('$nombre', NULL, 0,$cantidad, $categoria_id, '$target_file', $marca_id)");
$producto_id = mysqli_insert_id($con);

mysqli_query($con, "INSERT INTO detalle_compra (cantidad, subtotal, compra_id, producto_id) VALUES ($cantidad, $subtotal, $compra_id, $producto_id)");

    
mysqli_close($con);

?>