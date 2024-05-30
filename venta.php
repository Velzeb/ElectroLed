<!DOCTYPE html>
<html>
<head>
    <title>Venta</title>
</head>
<body>
    <h1>Venta</h1>
    <div id="administrador"> 
        <label for="admin">Administrador:</label>
        <select id="admin">
            <?php
            require 'accion_conexion.php';
            $con = conectarse();

            
            $result = mysqli_query($con, "
            SELECT usuario.id, usuario.nombre
            FROM usuario
            JOIN permisos_usuario ON usuario.id = permisos_usuario.usuario_id
            JOIN permisos ON permisos.id = permisos_usuario.permisos_id
            WHERE permisos.permiso = 1;"
            );
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>
    </div>

    <div id="cliente">
            <?php
            if ($_POST['action'] == 'select') {
                $cliente_id = $_POST['cliente'];
                $result = mysqli_query($con, "SELECT nombre FROM usuario WHERE id = $cliente_id");            
                $row = mysqli_fetch_assoc($result);
                $nombre_cliente = $row['nombre'];
            } else {
                echo "No se selecciono cliente";
            }
            ?>
        <h2>Cliente seleccionado: <?php echo $nombre_cliente; ?></h2>
    </div>



    <h1>Venta detalle</h1>  
    <div id="agregarProductos"></div>
    <button id="addProductButton">Agregar otro producto</button>


    <div id="detalleFinal">
        <h2>Detalle venta </h2>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required> 
        <label for="total">Total:</label>
        <span id="total">0</span>
        <button id="btFinalizarVenta">Finalizar venta</button>
    </div>
    <button id="btAtras"> Atras</button>

</body>
</html>

<script>
document.getElementById('btFinalizarVenta').addEventListener('click', function() {
    var fecha = document.getElementById('fecha').value;
    var total = document.getElementById('total').textContent;
    var admin_id = document.getElementById('admin').value;
    var clie_id = <?php echo $cliente_id; ?>;
    alert (`fecha=${fecha}&total=${total}&admin_id=${admin_id}&clie_id=${clie_id}`);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "accion_insert_venta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var product_selects = document.getElementsByClassName('producto_id');
            var cantidades = document.getElementsByClassName('cantidad');
            var subtotales = document.getElementsByClassName('subtotal');
            var venta_id = this.responseText;

            for (var i = 0; i < product_selects.length; i++) {
                var producto_id = product_selects[i].value;
                var cantidad = product_selects[i].parentNode.querySelector('.cantidad').value;
                var subtotal = product_selects[i].parentNode.querySelector('.subtotal').value;
                alert (`venta_id=${venta_id}&producto_id=${producto_id}&cantidad=${cantidad}&subtotal=${subtotal}`);
                var xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "accion_insert_detalleVenta.php", true);
                xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr2.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        console.log(this.responseText);
                    }
                };
                xhr2.send("venta_id=" + venta_id + "&producto_id=" + producto_id + "&cantidad=" + cantidad + "&subtotal=" + subtotal);
            }
        }
    };
    xhr.send("fecha=" + fecha + "&total=" + total + "&admin_id=" + admin_id + "&clie_id=" + clie_id);
});

document.getElementById('addProductButton').addEventListener('click', function() {
    var newProductForm = document.createElement('div');
    newProductForm.innerHTML = `
    <label for="producto_id">Producto:</label>
            <select class="producto_id" name="producto_id" required onchange="updateProduct(this)">
            <?php
                $result = mysqli_query($con, "SELECT id, nombre, precio, imagen FROM producto");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}' data-precio='{$row['precio']}' data-imagen='{$row['imagen']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" class="cantidad" name="cantidad" onchange="updateSubtotal(this)"  required>

            <label for="precio">Precio:</label>
            <input type="number" class="precio" name="precio" onchange= "updateTotal()" onchange="updateSubtotal(this)" required>

            <label for="subtotal">Subtotal:</label>
            <input type="number" class="subtotal" name="subtotal" onchange="updateTotal()" required>


            <label for="imagen">Imagen:</label>
            <img class="imagen_previa" src="" style="max-width: 100px; max-height: 100px;">
    `;
    document.getElementById('agregarProductos').appendChild(newProductForm);

});
function updateProduct(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var precio = selectedOption.getAttribute('data-precio');
        var imagen = selectedOption.getAttribute('data-imagen');
        var precioInput = selectElement.parentNode.querySelector('.precio');
        var imagenPrevia = selectElement.parentNode.querySelector('.imagen_previa');
        precioInput.value = precio;
        imagenPrevia.src = imagen;
        imagenPrevia.style.display = 'block';

}


function updateSubtotal(inputElement) {
    var cantidad = inputElement.value;
    var precio = inputElement.parentNode.querySelector('.precio').value;
    var subtotal = cantidad * precio;
    inputElement.parentNode.querySelector('.subtotal').value = subtotal;
    updateTotal();
}
function updateTotal() {
    var subtotals = document.querySelectorAll('input[name="subtotal"]');
    var total = 0;
    for (var i = 0; i < subtotals.length; i++) {
        total += parseFloat(subtotals[i].value || 0); // use 0 if the value is not a number
    }
    document.getElementById('total').textContent = total.toFixed(2);
}
</script>