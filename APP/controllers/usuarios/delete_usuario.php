
<?php
include '../../config.php';

$id = $_GET['id'];

// Verificar que el ID no esté vacío
if (!empty($id)) {
    $sql_delete_usuario = "DELETE FROM tb_usuarios WHERE identificador = '$id'";
    if ($conexion->query($sql_delete_usuario)) {
        session_start();
        $_SESSION['mensaje'] = "Usuario eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el usuario";
        $_SESSION['icono'] = "error";
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "ID de usuario inválido";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/usuarios/delete_usuario.php?id='. $datos_usuarios);
}

