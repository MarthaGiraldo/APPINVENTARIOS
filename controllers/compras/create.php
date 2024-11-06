<?php
// Insertar una nueva compra
$id_proveedor = $_POST['id_proveedor'];
$fecha_compra = date('Y-m-d H:i:s');
$total = $_POST['total'];

$sql_compra = "INSERT INTO tb_compras (id_proveedor, fecha_compra, total) VALUES ('$id_proveedor', '$fecha_compra', '$total')";
if ($conexion->query($sql_compra)) {
    $id_compra = $conexion->insert_id; // Obtener el ID de la nueva compra
    // Insertar los detalles de la compra
    foreach ($_POST['productos'] as $producto) {
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];
        $precio_compra = $producto['precio_compra'];
        $subtotal = $precio_compra * $cantidad;

        $sql_detalle_compra = "INSERT INTO detalle_compras (id_compra, id_producto, cantidad, precio_compra, subtotal)
                             VALUES ('$id_compra', '$id_producto', '$cantidad', '$precio_compra', '$subtotal')";
        $conexion->query($sql_detalle_compra);
    }
    echo "Compra registrada correctamente!";
} else {
    echo "Error: " . $sql_compra . "<br>" . $conexion->error;
}
