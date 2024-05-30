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
        <form action="venta.php" method="POST">
            <h2>Seleccionar cliente</h2>
            <label for="cliente">Seleccionar Cliente:</label>
                <select name="cliente" id="cliente">
                    <?php
                    require 'accion_conexion.php';
                    $con = conectarse();
                    $result = mysqli_query($con, "SELECT usuario.id, usuario.nombre
                                FROM usuario
                                JOIN permisos_usuario ON usuario.id = permisos_usuario.usuario_id
                                JOIN permisos ON permisos.id = permisos_usuario.permisos_id
                                WHERE permisos.permiso = 2 /*or permisos.permiso = 2*/;");
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
            <h2>Agregar nuevo cliente</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="NIT/carnet">NIT/carnet:</label>
            <input type="text" id="ci" name="ci" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>
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
    var ci = document.getElementById('ci').value;
    var celular = document.getElementById('celular').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'accion_addCliente.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`nombre=${nombre}&ci=${ci}&celular=${celular}`);

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