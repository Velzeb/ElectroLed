<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoría</th>
            <th>Marca</th>
            <th>Imagen</th>
            <th>Acciones</th> <!-- Nueva columna para las acciones -->
        </tr>
        <?php
        require 'accion_conexion.php';
        $con = conectarse();
        $result = mysqli_query($con, "SELECT * FROM producto");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['descripcion']}</td>";
            echo "<td>{$row['precio']}</td>";
            echo "<td>{$row['cantidad']}</td>";
        
            // Consulta para obtener el nombre de la categoría
            if (!empty($row['categoria_id'])) {
                $categoriaResult = mysqli_query($con, "SELECT nombre FROM categoria WHERE id = {$row['categoria_id']}");
                $categoriaRow = mysqli_fetch_assoc($categoriaResult);
                $categoriaNombre = $categoriaRow['nombre'];
                echo "<td>{$categoriaNombre}</td>";
            } else {
                echo "<td>N/A</td>";
            }
        
            // Consulta para obtener el nombre de la marca
            if (!empty($row['marca_id'])) {
                $marcaResult = mysqli_query($con, "SELECT nombre FROM marca WHERE id = {$row['marca_id']}");
                $marcaRow = mysqli_fetch_assoc($marcaResult);
                $marcaNombre = $marcaRow['nombre'];
                echo "<td>{$marcaNombre}</td>";
            } else {
                echo "<td>N/A</td>";
            }
        
            echo "<td><img src='{$row['imagen']}' width='100' height='100'></td>";
            echo "<td><a href='editarProducto.php?id={$row['id']}'><button>Edit</button></a></td>"; // Botón de editar
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>
    </table>
</body>
</html>