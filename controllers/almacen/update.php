<?php
include $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID de producto no proporcionado.");
}

// Consulta de detalles del producto

$query_productos = $conexion->query("SELECT 
    tb_almacen.identificador, 
    tb_almacen.codigo, 
    tb_almacen.nombre, 
    tb_almacen.descripcion, 
    tb_almacen.stock, 
    tb_almacen.precio_compra, 
    tb_almacen.precio_venta, 
    tb_almacen.fecha_ingreso, 
    tb_almacen.imagen, 
    tb_almacen.id_usuario, 
    tb_categorias.categoria
    FROM tb_almacen 
    JOIN tb_categorias ON tb_almacen.identificador = tb_categorias.identificador_cat");
  
if ($query_productos === false) {    
    // Manejar el error, por ejemplo, mostrando un mensaje de error
    echo "Error en la consulta: " . $conexion->error;
} else {    
    // Procesar los resultados
    $productos_almacen = $query_productos->fetch_all(MYSQLI_ASSOC);
}

// Obtener datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio_compra = number_format((float)$_POST['precio_compra'], 2, '.', ''); // Formatear a dos decimales
    $precio_venta = number_format((float)$_POST['precio_venta'], 2, '.', ''); // Formatear a dos decimales
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $imagen =  $_FILES['imagen']['name'];      
    $target_dir = "../../../almacen/img_productos/";
    $target_file = $target_dir . basename($imagen);
    $id_usuario = $_POST['id_usuario'];
    $categoria = $_POST['categoria'];


    // Actualizar el producto en la tabla almacen
    $sql_update = "UPDATE tb_almacen SET codigo = '$codigo', nombre = '$nombre', descripcion = '$descripcion', stock = '$stock', precio_compra = '$precio_compra',
                   precio_venta = '$precio_venta', fecha_ingreso = '$fecha_ingreso', imagen = '$imagen', id_usuario = '$id_usuario' WHERE identificador = '$id'";
    if ($conexion->query($sql_update)) {
       
        // Reasignar la categoria al producto
        $sql_producto_update = "UPDATE tb_categorias SET categoria = '$categoria'  WHERE identificador_cat = '$id'";
        if ($conexion->query($sql_producto_update)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Producto actualizado correctamente";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/almacen/');
            exit();
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Error no se pudo actualizar el producto en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/almacen/update.php?id='.$id);
            exit();
        }
    }
}

