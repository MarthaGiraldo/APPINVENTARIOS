<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_proveedores = "DELETE FROM tb_proveedores WHERE identificador = '$id'";
    if ($conexion->query($sql_delete_proveedores)) {
        session_start();
        $_SESSION['mensaje'] = "Proveedor eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/proveedores/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el proveedor";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de proveedor inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/proveedores/delete.php?id='.$proveedores_datos);
}

