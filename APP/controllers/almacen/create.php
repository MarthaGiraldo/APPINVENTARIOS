<?php
include '../../config.php';

// Obtener datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio_compra = number_format((float)$_POST['precio_compra'], 2, '.', ''); // Formatear a dos decimales
$precio_venta = number_format((float)$_POST['precio_venta'], 2, '.', ''); // Formatear a dos decimales
$fecha_ingreso = $_POST['fecha_ingreso'];
$imagen = $_FILES['imagen']['name'];
$target_dir = "../../../almacen/img_productos/";
$target_file = $target_dir . basename($imagen);
$id_usuario = $_POST['id_usuario'];
$categoria = $_POST['categoria'];

// Subir imagen
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
    // Insertar producto en la base de datos
    $sql_insert_producto = "INSERT INTO tb_almacen (identificador, codigo, nombre, descripcion, stock, precio_compra, precio_venta, fecha_ingreso, imagen, id_usuario)
     VALUES (NULL, '$codigo', '$nombre', '$descripcion', '$stock', '$precio_compra', '$precio_venta', '$fecha_ingreso', '$imagen', '$id_usuario')";
    
    if ($conexion->query($sql_insert_producto)) {
        $producto_id = $conexion->insert_id; // Obtener el ID del nuevo producto

        // Asignar la categoría al producto en la tabla de relación
        $sql_asignar_categoria = "INSERT INTO tb_almacen_categoria (id_Almacen, id_Categoria) VALUES ('$producto_id', '$categoria')";
        if ($conexion->query($sql_asignar_categoria)) {
            session_start();
            $_SESSION['mensaje'] = "Se registro el producto";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/almacen/');  
            
        }else{
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/almacen/create.php');
        }
    }
}