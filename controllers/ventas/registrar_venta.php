<?php 
include '../../config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $fecha_venta = date('Y-m-d H:i:s');
    $total = $_POST['total'];
    
    // Verifica que se están recibiendo los datos del formulario
    if (empty($id_cliente) || empty($total) || empty($_POST['productos'])) {
        die("Todos los campos son requeridos.");
    }

    // Inserta en tb_ventas
    $sql_venta = "INSERT INTO tb_ventas (id_cliente, fecha_venta, total) VALUES ('$id_cliente', '$fecha_venta', '$total')";
    if ($conexion->query($sql_venta)) {
        $id_venta = $conexion->insert_id;

        // Inserta detalles de la venta en detalle_ventas
        foreach ($_POST['productos'] as $producto) {
            $id_producto = $producto['id_producto'];
            $cantidad = $producto['cantidad'];
            $precio_venta = $producto['precio_venta'];
            $subtotal = $precio_venta * $cantidad;

            $sql_detalle_venta = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio_venta, subtotal)
                                  VALUES ('$id_venta', '$id_producto', '$cantidad', '$precio_venta', '$subtotal')";
            if (!$conexion->query($sql_detalle_venta)) {
                die("Error al insertar en detalle_ventas: " . $conexion->error);
            }
        }
        echo "Venta registrada correctamente!";
    } else {
        die("Error al insertar en tb_ventas: " . $conexion->error);
    }
} else {
    die("Método de solicitud no permitido.");
}

