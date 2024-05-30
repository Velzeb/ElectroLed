<?php
require 'accion_conexion.php';
$con = conectarse();

if(isset($_POST['producto_id'])){
    $id = $_POST['producto_id'];
    $result = mysqli_query($con, "SELECT * FROM producto WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
mysqli_close($con);
?>