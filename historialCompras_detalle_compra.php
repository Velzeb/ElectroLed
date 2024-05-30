<!DOCTYPE html>
<html>
<head>
    <title>Detalles de la Compra</title>
</head>
<body>
    <h1>Detalles de la Compra</h1>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php
        require 'accion_conexion.php';
        $con = conectarse();
        // Obtener el id de la compra de los parámetros GET
        $compra_id = $_GET['id'];

        // Consulta para obtener los detalles de la compra
        $result = mysqli_query($con, "SELECT detalle_compra.id, detalle_compra.cantidad, detalle_compra.subtotal, producto.nombre AS producto_nombre FROM detalle_compra INNER JOIN producto ON detalle_compra.producto_id = producto.id WHERE detalle_compra.compra_id = $compra_id");

        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['producto_nombre']}</td>";
            echo "<td>{$row['cantidad']}</td>";
            echo "<td>{$row['subtotal']}</td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>
    </table>
</body>
</html>