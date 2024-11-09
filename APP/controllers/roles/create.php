<?php

include '../../config.php';

    $sentencia = "INSERT INTO tb_roles
     (identificador_rol, nombreRol, fyh_creacion) 
    VALUES 
    (NULL,
    '".$_POST['nombreRol']."',
    '')";

mysqli_query($conexion,$sentencia);
if ($sentencia){
    session_start();
        $_SESSION['mensaje'] = "Se registro el rol de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/roles/create.php');
    }




