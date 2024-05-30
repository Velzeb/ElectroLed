<?php
require 'accion_conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = conectarse();

    $producto_id = $_POST['producto_id'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria_id = $_POST['categoria_id'];
    $marca_id = $_POST['marca_id'];

    // Subir la nueva imagen
    $imagen = $_POST['imagen'];
    $target_dir = "uploads/";
    $ruta_destino = $target_dir . basename($_FILES["imagen"]["name"]);
    
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
        echo "El archivo ". basename( $_FILES["imagen"]["name"]). " ha sido subido.";
    } else {
        echo "Lo sentimos, ha ocurrido un error al subir tu archivo.";
    }

    // Consulta para actualizar el producto
    $query = "UPDATE producto SET descripcion = '$descripcion', precio = $precio, cantidad = $cantidad, categoria_id = $categoria_id, marca_id = $marca_id, imagen = '$ruta_destino' WHERE id = $producto_id";

    // Ejecutar la consulta
    if (mysqli_query($con, $query)) {
        echo "Producto actualizado con éxito";
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($con);
    }

    // Cerrar la conexión
    mysqli_close($con);
}
?>