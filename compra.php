<!DOCTYPE html>
<html>
<head>
    <title>Compra</title>
</head>
<body>
    <h1>Compra</h1>
    <?php
    require 'accion_conexion.php';
    $con = conectarse();

    if ($_POST['action'] == 'select') {
        $proveedor_id = $_POST['proveedor'];
        $result = mysqli_query($con, "SELECT nombre FROM proveedor WHERE id = $proveedor_id");
        $row = mysqli_fetch_assoc($result);
        $nombre_proveedor = $row['nombre'];
    } else {
        alert ("No se selecciono proveedor");
    }

    ?>
    <h2>Proveedor seleccionado: <?php echo $nombre_proveedor; ?></h2>
    <div id="agregarProductos">

    </div>
    <button id="addProductButton">Agregar otro producto</button>
    <button id="nuevoProductoButton">Nuevo Producto</button> 





    <div id="detalleFinal">
        <h2>Detalle compra </h2>
        <lebel for="fecha">Fecha:</lebel>
        <input type="date" id="fecha" name="fecha" required> 
        <label for="total">Total:</label>
        <span id="total">0</span>
        <button id="btFinalizarCompra">Finalizar compra</button>
    </div>
    <button id="btAtras"> Atras</button>





<script>
document.getElementById('btFinalizarCompra').addEventListener('click', function() {
    var fecha = document.getElementById('fecha').value;
    var total = document.getElementById('total').textContent;
    var proveedor_id = <?php echo $proveedor_id; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "accion_insert_compra.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var product_selects = document.getElementsByClassName('producto_id');
            var nuevos_productos = document.getElementsByClassName('nuevoProducto');
            var compra_id = this.responseText;            
            var categorias_ids = document.getElementsByClassName('categoria_id');
            var marcas_ids = document.getElementsByClassName('marca_id');
            var cantidades = document.getElementsByClassName('cantidad');
            var subtotales = document.getElementsByClassName('subtotal');
            var imagenes = document.getElementsByClassName('imagen');
            alert ("salio "+product_selects.length);
            alert ("salio "+nuevos_productos.length);

            if (product_selects.length == 0 && nuevos_productos.length == 0) {
                alert("No hay productos seleccionados");
                return;
            }
            if(product_selects.length != 0){
                for (var i = 0; i < product_selects.length; i++) {
                var product_id = product_selects[i].value; // Aquí obtenemos el valor seleccionado
                var cantidad = cantidades[i].value;
                var subtotal = subtotales[i].value;
                alert("salio "+compra_id+" " +product_id+" "+cantidad+" "+subtotal);
                var xhrDetalle = new XMLHttpRequest();
                xhrDetalle.open("POST", "accion_insert_detalleCompra.php", true);
                xhrDetalle.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhrDetalle.send("compra_id=" + compra_id + "&producto_id=" + product_id + "&cantidad=" + cantidad + "&subtotal=" + subtotal); 
            }
            }

            if(nuevos_productos.length != 0){
                for (var i = 0; i < formCounter; i++) {
                    var form = document.getElementById('form' + i);
                    alert ("salio "+form.querySelector('.subtotal').value);
                    var nombre = form.querySelector('.nuevoProducto').value;
                    var categoria_id = form.querySelector('.categoria_id').value;
                    var marca_id = form.querySelector('.marca_id').value;

                    var cantidad = form.querySelector('.cantidad').value;
                    var subtotal = form.querySelector('.subtotal').value;
                    var frmData = new FormData();
                    var xhrAddProducto = new XMLHttpRequest();
                    xhrAddProducto.open("POST", "accion_addProducto.php", true);
                    
                    frmData.append('imagen', form.querySelector('.imagen').files[0]);
                    frmData.append('compra_id', compra_id);
                    frmData.append('nombre', nombre);
                    frmData.append('categoria_id', categoria_id);
                    frmData.append('marca_id', marca_id);
                    frmData.append('cantidad', cantidad);
                    frmData.append('subtotal', subtotal);
                    
                    xhrAddProducto.send(frmData);
                }        
            }
            alert("Compra finalizada con éxito");
        }
    }
    xhr.send("fecha=" + fecha + "&total=" + total + "&proveedor_id=" + proveedor_id);
});

document.getElementById('addProductButton').addEventListener('click', function() {
    var newProductForm = document.createElement('div');
    newProductForm.innerHTML = `
        <label for="producto_id">Producto:</label>
        <select class="producto_id" name="producto_id" required>
            <?php
            $result = mysqli_query($con, "SELECT id, nombre FROM producto");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="cantidad" name="cantidad" required>
        <label for="subtotal">Subtotal:</label>
        <input type="number" class="subtotal" name="subtotal" onchange="updateTotal()" required>

        <label for="imagen">Imagen:</label>
        <img class="imagen_previa" src="" style="display: none; max-width: 100px; max-height: 100px;">
    `;
    document.getElementById('agregarProductos').appendChild(newProductForm);

});


var formCounter = 0; // Contador para generar ids únicos para los formularios

document.getElementById('nuevoProductoButton').addEventListener('click', function() {
    var formAgregarProducto = document.createElement('div');
    formAgregarProducto.id = 'form' + formCounter++; // Asignar un id único al formulario
    formAgregarProducto.innerHTML = `
        <label for="nuevoProducto">Nombre:</label>
        <input type="text" class="nuevoProducto" name="nuevoProducto" required>
        
        <label for="categoria_id">Categoría:</label>
        <select class="categoria_id" name="categoria_id" required>
            <?php
            $result = mysqli_query($con, "SELECT id, nombre FROM categoria");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>

        <label for="marca_id">Marca:</label>
        <select class="marca_id" name="marca_id" required>
            <?php
            $result = mysqli_query($con, "SELECT id, nombre FROM marca");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="cantidad" name="cantidad" required>
        <label for="subtotal">Subtotal:</label>
        <input type="number" class="subtotal" name="subtotal" onchange="updateTotal()" required>
        <label for="imagen">Imagen:</label>
        <input type="file" class="imagen" name="imagen" accept="image/*" required>
    `;
    document.getElementById('agregarProductos').appendChild(formAgregarProducto);
});

document.getElementById('btAtras').addEventListener('click', function() {
    window.location.href = 'addProveedor.php';
});
function updateTotal() {
    var subtotals = document.querySelectorAll('input[name="subtotal"]');
    var total = 0;
    for (var i = 0; i < subtotals.length; i++) {
        total += parseFloat(subtotals[i].value);
    }
    document.getElementById('total').textContent = total.toFixed(2);
}
</script>
    
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#agregarProductos').on('change', '.producto_id', function(){
        var id = $(this).val();
        var selectElement = $(this);
        $.ajax({
            url: 'get_cantidad.php',
            type: 'post',
            data: {producto_id:id},
            dataType: 'json',
            success: function(response){
                // Mostrar una vista previa de la imagen
                selectElement.siblings('.imagen_previa').attr('src', response.imagen).show();
            }
        });
    });
});
</script>