<?php
function actualizarInventario($producto_id, $cantidad, $tipo) {
    $servidor= "localhost";
    $usuario= "root";
    $passwd = "";
    $basedatos= "sistemadeinventarios";
    $conexion = new mysqli ($servidor, $usuario, $passwd, $basedatos);
    if (mysqli_connect_errno() ){

        echo "No se pudo conectar con la base de datos";
        mysqli_connect_error();

exit();
        }

$URL = "http://localhost/www.sistemadeinventarios.com";


    if ($tipo == 'venta') {
        $consulta = $conexion->prepare("UPDATE tb_almacen SET cantidad = cantidad - ? WHERE id = ?");
    } else {
        $consulta = $conexion->prepare("UPDATE tb_almacen SET cantidad = cantidad + ? WHERE id = ?");
    }

    if ($consulta) {
        $consulta->bind_param("ii", $cantidad, $producto_id);
        $consulta->execute();
        $consulta->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    $conexion->close();
}

