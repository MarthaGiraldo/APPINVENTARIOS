<?php

$query_ventas = $conexion->query("SELECT tb_ventas.id_venta, tb_ventas.id_cliente, tb_ventas.fecha_venta, tb_ventas.total
  FROM tb_ventas 
  ");

if ($query_ventas) {
    // Manejar el error, por ejemplo, mostrando un mensaje de error
    echo "se ha creado la venta " . $conexion->error;
} else {
    // Procesar los resultados
    $datos_ventas = $query_ventas->fetch_all(MYSQLI_ASSOC);
}

