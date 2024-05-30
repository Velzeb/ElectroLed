<!DOCTYPE html>
<html>
<head>
    <style>
        #formAgregar {
            display: none;
        }
    </style>
</head>
<body>
    <div id="formSeleccionar">
        <form action="compra.php" method="POST">
            <h2>Seleccionar proveedor</h2>
            <label for="proveedor">Seleccionar Proveedor:</label>
                <select name="proveedor" id="proveedor">
                    <?php
                    require 'accion_conexion.php';
                    $con = conectarse();
                    $result = mysqli_query($con, "SELECT id, nombre FROM proveedor");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=".$row['id'].">".$row['nombre']."</option>";
                    }
                    mysqli_close($con);
                    ?>
                </select>
            <input type="hidden" name="action" value="select">
            <input type="submit" name="submit" value="siguiente">
            
        </form>
        <button id="btnNuevo">Nuevo</button>
        <button onclick="window.location.href = 'menu.php';">Atrás</button>
    </div>

    <div id="formAgregar">
    <form action="compra.php" method="POST">
            <h2>Agregar nuevo proveedor</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="contacto">Contacto:</label>
            <input type="text" id="contacto" name="contacto" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" required>
            <input type="hidden" name="action" value="add">
            <input type="submit" name="submit" value="agregar">
        </form>
        <button id="btnAtras"> Atras</button>
    </div>
   

<script>
    document.getElementById('btnAtras').addEventListener('click', function() {
        document.getElementById('formAgregar').style.display = 'none';
        document.getElementById('formSeleccionar').style.display = 'block';
    });
    document.getElementById('btnNuevo').addEventListener('click', function() {
        document.getElementById('formSeleccionar').style.display = 'none';
        document.getElementById('formAgregar').style.display = 'block';
    });
document.getElementById('formAgregar').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    var nombre = document.getElementById('nombre').value;
    var contacto = document.getElementById('contacto').value;
    var celular = document.getElementById('celular').value;
    var direccion = document.getElementById('direccion').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'accion_addProveedor.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('nombre=' + nombre + '&contacto=' + contacto + '&celular=' + celular + '&direccion=' + direccion);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('formAgregar').style.display = 'none';
            document.getElementById('formSeleccionar').style.display = 'block';
            location.reload();
        }
    };
});

</script>
</body>
</html>