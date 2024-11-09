<?php 
include '../../config.php';

// Insertar una nueva venta
$id_cliente = $_POST['id_cliente'];
$fecha_venta = date('Y-m-d H:i:s');
$total = $_POST['total'];

$sql_venta = "INSERT INTO tb_ventas (id_cliente, fecha_venta, total) VALUES ('$id_cliente', '$fecha_venta', '$total')";
if ($conexion->query($sql_venta)) {
    $id_venta = $conexion->insert_id; // Obtener el ID de la nueva venta
    // Insertar los detalles de la venta
    foreach ($_POST['productos'] as $producto) {
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];
        $precio_venta = $producto['precio_venta'];
        $subtotal = $precio_venta * $cantidad;

        $sql_detalle_venta = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio_venta, subtotal)
                             VALUES ('$id_venta', '$id_producto', '$cantidad', '$precio_venta', '$subtotal')";
        $conexion->query($sql_detalle_venta);
    }
    echo "Venta registrada correctamente!";
} else {
    echo "Error: " . $sql_venta . "<br>" . $conexion->error;
}



