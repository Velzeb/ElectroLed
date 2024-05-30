<?php   
require 'accion_conexion.php';
$con = conectarse();

$nombre = $_POST['nombre'];
$ci = $_POST['ci'];
$celular = $_POST['celular'];

mysqli_query($con, "INSERT INTO usuario (nombre, ci, celular) VALUES ('$nombre', '$ci', '$celular')");

$usuario_id = mysqli_insert_id($con);

mysqli_query($con, "INSERT INTO permisos_usuario (usuario_id, permisos_id) VALUES ($usuario_id, 4)");


header("Location: addCliente.php");
exit();
?>