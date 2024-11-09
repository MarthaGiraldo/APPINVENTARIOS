<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
include '../APP/controllers/ventas/listado_de_ventas.php';
require '../APP/controllers/almacen/listado_de_productos.php';
require '../APP/controllers/clientes/listado_de_clientes.php';

// Obtener los datos de los clientes
$sql_clientes = "SELECT identificador, nombre_cliente FROM tb_clientes";
$result_clientes = $conexion->query($sql_clientes);
$clientes = [];
if ($result_clientes->num_rows > 0) {
    while($row = $result_clientes->fetch_assoc()) {
        $clientes[] = $row;
    }
}

// Obtener los datos de los productos
$sql_productos = "SELECT identificador, nombre FROM tb_almacen";
$result_productos = $conexion->query($sql_productos);
$productos = [];
if ($result_productos->num_rows > 0) {
    while($row = $result_productos->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Registrar Venta</h2>  
        <form action= "../APP/controllers/ventas/registrar_venta.php" method="post">
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="id_cliente" id="cliente" class="form-control" required>
                    <!-- Opciones de cliente -->
                    <?php 
                    // Supongamos que $clientes contiene los datos de los clientes obtenidos de la base de datos
                    foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['identificador']; ?>"><?php echo $cliente['nombre_cliente']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="productos">Productos:</label>
                <div id="productos">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <select name="productos[0][id_producto]" class="form-control" required>
                                <!-- Opciones de productos -->
                                <?php 
                                // Supongamos que $productos contiene los datos de los productos obtenidos de la base de datos
                                foreach ($productos as $producto): ?>
                                    <option value="<?php echo $producto['identificador']; ?>"><?php echo $producto['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="productos[0][cantidad]" class="form-control" placeholder="Cantidad" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="productos[0][precio_venta]" class="form-control" placeholder="Precio Unitario" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-producto">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-producto">Agregar Producto</button>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" name="total" id="total" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>

    

    <script>
        $(document).ready(function() {
            var productoIndex = 1;

            function calcularTotal() {
                let total = 0;
                $('.producto-row').each(function() {
                    const cantidad = parseFloat($(this).find('.cantidad-input').val()) || 0;
                    const precio = parseFloat($(this).find('.precio-input').val()) || 0;
                    total += cantidad * precio;
                });
                $('#total').val(total.toFixed(2));
            }

            $('#add-producto').click(function() {
                $('#productos').append(`
                    <div class="row mb-2 producto-row">
                        <div class="col-md-5">
                            <select name="productos[${productoIndex}][id_producto]" class="form-control producto-select" required>
                                <?php 
                                foreach ($productos as $producto): ?>
                                    <option value="<?php echo $producto['identificador']; ?>"><?php echo $producto['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="productos[${productoIndex}][precio_venta]" class="form-control" placeholder="Precio Unitario" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-producto">&times;</button>
                        </div>
                    </div>
                `);
                productoIndex++;
            });

            $(document).on('click', '.remove-producto', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
</body>
