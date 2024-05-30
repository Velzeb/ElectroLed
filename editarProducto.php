<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
        <div>
            <h1>Editar Producto</h1>
            <label for="producto_id">Producto:</label>
            <select class="producto_id" name="producto_id" required>

            <?php
            require 'accion_conexion.php';
            $con = conectarse();
            // Consulta para obtener el listado de productos
            $result = mysqli_query($con, "SELECT * FROM producto");
            // Mostrar los resultados
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
            </select>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" rows="4" cols="50" required></textarea>
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" required>
        </div>


        <div>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required> 
            
        </div>

        <div>
            <select name="categoria_id" required>
                <?php
                // Consulta para obtener el listado de categorías
                $result = mysqli_query($con, "SELECT * FROM categoria");
                // Mostrar los resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>

        <div>
           <select name="marca_id" required>
                <?php
                // Consulta para obtener el listado de marcas
                $result = mysqli_query($con, "SELECT * FROM marca");
                // Mostrar los resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        
        <div> 
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*" required>
            <img id="imagen_previa" src="" alt="Imagen actual" style="display: none; max-width: 200px; max-height: 200px;">
        </div>

     

        <div>
            <button id="guardar" type="button">Guardar</button>
            <button id="cancelar" type="button">Cancelar</button>
        </div>
    </form>

</body>
</html>
<script>
    function actualizarPagina() {
        location.reload();
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.getElementById('cancelar').addEventListener('click', function() {
        window.location.href = 'menu.php';
    });
    document.getElementById('guardar').addEventListener('click', function() {
        var descripcion =document.getElementsByName('descripcion')[0].value;
        var precio = document.getElementsByName('precio')[0].value;
        var cantidad = document.getElementsByName('cantidad')[0].value;
        var categoria_id = document.getElementsByName('categoria_id')[0].value;
        var marca_id = document.getElementsByName('marca_id')[0].value;
        var imagen = document.getElementsByName('imagen')[0].files[0];
        var producto_id = document.getElementsByName('producto_id')[0].value;
        var formData = new FormData();
        formData.append('descripcion', descripcion);
        formData.append('precio', precio);
        formData.append('cantidad', cantidad);
        formData.append('categoria_id', categoria_id);
        formData.append('marca_id', marca_id);
        formData.append('imagen', imagen);
        formData.append('producto_id', producto_id);
        $.ajax({
            url: 'accion_editarProducto.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                alert('Producto actualizado correctamente');
                actualizarPagina();
            }
        });
        
    });
    
$(document).ready(function(){
    $('.producto_id').change(function(){
        var id = $(this).val();
        $.ajax({
            url: 'get_producto.php',
            type: 'post',
            data: {producto_id:id},
            dataType: 'json',
            success: function(response){
                // Actualizar los campos con los datos del producto
                $('textarea[name="descripcion"]').val(response.descripcion);
                $('input[name="precio"]').val(response.precio);
                $('input[name="cantidad"]').val(response.cantidad);
                $('select[name="categoria_id"]').val(response.categoria_id);
                $('select[name="marca_id"]').val(response.marca_id);
                // Mostrar una vista previa de la imagen
                $('#imagen_previa').attr('src', response.imagen).show();

            }
        });
    });
});
</script>