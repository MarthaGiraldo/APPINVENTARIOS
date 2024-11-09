<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_categoria = "DELETE FROM tb_categorias WHERE identificador_cat = '$id'";
    if ($conexion->query($sql_delete_categoria)) {
        session_start();
        $_SESSION['mensaje'] = "Categoria eliminada correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/categorias/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar la categoria";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de categoria inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/categorias/delete.php?id='. $datos_categorias);
}
