<?php
include '../../config.php';
   
// Obtener los datos del formulario
   $identificador = $_POST['identificador'];
   $nombre_cliente = $_POST['nombre_cliente'];
   $nif_cliente = $_POST['nif_cliente'];
   $telefono_cliente = $_POST['telefono_cliente'];
   $email_cliente = $_POST['email_cliente'];
   $datetime = $_POST['fyh_creacion'];
   
   // Insertar el usuario en la tabla users
   $sql = "INSERT INTO tb_clientes (identificador, nombre_cliente, nif_cliente, telefono_cliente, email_cliente, fyh_creacion)
    VALUES (NULL, '$nombre_cliente', '$nif_cliente', '$telefono_cliente','$email_cliente', '$datetime')";
   
   if ($conexion->query($sql)) {
        session_start();
        $_SESSION['mensaje'] = "Se registro el cliente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/clientes/');  
        
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/clientes/create.php');
    }

