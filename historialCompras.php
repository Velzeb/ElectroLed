<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras</title>
</head>
<body>
    <h1>Historial de Compras</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Proveedor</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Detalles</th>
        </tr>
        <?php
        require 'accion_conexion.php';
        $con = conectarse();
        // Consulta para obtener el historial de compras
        $result = mysqli_query($con, "SELECT compra.id, proveedor.nombre AS proveedor_nombre, compra.total, compra.fecha FROM compra INNER JOIN proveedor ON compra.proveedor_id = proveedor.id");

        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['proveedor_nombre']}</td>";
            echo "<td>{$row['total']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td><a href='historialCompras_detalle_compra.php?id={$row['id']}'>Detalles</a></td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>
    </table>
</body>
</html>