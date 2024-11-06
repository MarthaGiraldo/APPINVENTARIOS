<?php
include '../../config.php';
   
// Obtener los datos del formulario
   
   $nombres = $_POST['nombres'];
   $email = $_POST['email'];
   $pass = password_hash($_POST['password_user'], PASSWORD_BCRYPT);
   $role = $_POST['role'];
   
   // Insertar el usuario en la tabla users
   $sql = "INSERT INTO tb_usuarios (identificador, nombres, email, password_user) VALUES (NULL, '$nombres', '$email', '$pass')";
   if ($conexion->query($sql)) {
       $user_id = $conexion->insert_id;
       
       // Asignar el rol al usuario
       $sql_role = "INSERT INTO tb_usuarios_roles (user_id, rol_id) VALUES ('$user_id', '$role')";
       if ($conexion->query($sql_role)) {
        session_start();
        $_SESSION['mensaje'] = "Se registro el usuario de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios/');  
        
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/create.php');
    }
}



