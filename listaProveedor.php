<!DOCTYPE html>
<html>
<head>
    <title>Listado de Proveedores</title>
</head>
<body>
    <h1>Listado de Proveedores</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>Historial</th>
        </tr>
        <?php
        require 'accion_conexion.php';
        $con = conectarse();
        // Consulta para obtener el listado de proveedores
        $result = mysqli_query($con, "SELECT * FROM proveedor");

        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['contacto']}</td>";
            echo "<td>{$row['celular']}</td>";
            echo "<td>{$row['direccion']}</td>";
            echo "<td><a href='listaProveedor_historial.php?id={$row['id']}'>Historial</a></td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>
    </table>
</body>
</html>