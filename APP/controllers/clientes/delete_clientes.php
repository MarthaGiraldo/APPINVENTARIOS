<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_cliente = "DELETE FROM tb_clientes WHERE identificador = '$id'";
    if ($conexion->query($sql_delete_cliente)) {
        session_start();
        $_SESSION['mensaje'] = "Cliente eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/clientes/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el cliente";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de cliente inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/clientes/delete_clientes.php?id='. $datos_clientes);
}