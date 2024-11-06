
<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_roles = "DELETE FROM tb_roles WHERE identificador_rol = '$id'";
    if ($conexion->query($sql_delete_roles)) {
        session_start();
        $_SESSION['mensaje'] = "Rol eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el rol";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de rol inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/delete_roles.php?id='. $datos_roles['identificador_rol']);
}