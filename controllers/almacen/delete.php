



<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_producto = "DELETE FROM tb_almacen WHERE identificador = '$id'";
    if ($conexion->query($sql_delete_producto)) {
        session_start();
        $_SESSION['mensaje'] = "Producto eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/almacen/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el producto";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de producto inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/delete.php?id='.$id_producto);
}









