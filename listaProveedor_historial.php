<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras del Proveedor</title>
</head>
<body>
    <h1>Historial de Compras del Proveedor</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Detalles</th>
        </tr>
        <?php
        require 'accion_conexion.php';
        $con = conectarse();
        // Obtener el id del proveedor de los parámetros GET
        $proveedor_id = $_GET['id'];

        // Consulta para obtener el historial de compras del proveedor
        $result = mysqli_query($con, "SELECT * FROM compra WHERE proveedor_id = $proveedor_id");

        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td>{$row['total']}</td>";
            echo "<td><a href='historialCompras_detalle_compra.php?id={$row['id']}'>Detalles</a></td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>
    </table>
</body>
</html>