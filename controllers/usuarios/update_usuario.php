<?php
include $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID de usuario no proporcionado.");
}

// Consulta de detalles del usuario
$query_usuarios = $conexion->query("SELECT tb_usuarios.identificador, tb_usuarios.nombres, tb_usuarios.email, tb_roles.identificador_rol, tb_roles.nombreRol FROM tb_usuarios JOIN tb_usuarios_roles ON tb_usuarios.identificador = tb_usuarios_roles.user_id JOIN tb_roles ON tb_usuarios_roles.rol_id = tb_roles.identificador_rol WHERE tb_usuarios.identificador = '$id'");
if (!$query_usuarios) {
    die("Error en la consulta: " . $conexion->error);
}
$datos_usuarios = $query_usuarios->fetch_assoc();

// Obtener datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $email = $_POST['email'];
    $password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Actualizar el usuario en la tabla usuarios
    $sql_update = "UPDATE tb_usuarios SET nombres = '$nombres', email = '$email', password_user = '$password_user' WHERE identificador = '$id'";
    if ($conexion->query($sql_update)) {
        // Asignar el rol al usuario
        $sql_role_update = "UPDATE tb_usuarios_roles SET rol_id= '$role' WHERE user_id = '$id'";
        if ($conexion->query($sql_role_update)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Usuario actualizado correctamente";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/usuarios/');
            exit();
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Error no se pudo actualizar el rol en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/usuarios/update.php?id='.$id);
            exit();
        }
    }
}


