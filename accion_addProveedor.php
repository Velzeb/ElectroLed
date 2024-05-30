<?php   
require 'accion_conexion.php';
$con = conectarse();

$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];

mysqli_query($con, "INSERT INTO proveedor (nombre, contacto, celular, direccion) VALUES ('$nombre', '$contacto', '$celular', '$direccion')");
mysqli_close($con);

header("Location: addProveedor.php");
exit();
?>