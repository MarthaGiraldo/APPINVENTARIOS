<?php
include '../../config.php';
   
// Obtener los datos del formulario
   $identificador = $_POST['identificador'];
   $empresa_proveedor = $_POST['empresa_proveedor'];
   $nif_proveedor = $_POST['nif_proveedor'];
   $contacto_proveedor = $_POST['contacto_proveedor'];
   $telefono_proveedor = $_POST['telefono_proveedor'];
   $email_proveedor = $_POST['email_proveedor'];
   $direccion_proveedor = $_POST['direccion_proveedor'];
   $datetime = $_POST['fyh_creacion'];
   
   // Insertar el usuario en la tabla users
   $sql = "INSERT INTO tb_proveedores (identificador, empresa_proveedor, nif_proveedor, contacto_proveedor, telefono_proveedor, email_proveedor,
   direccion_proveedor, fyh_creacion)
    VALUES (NULL, '$empresa_proveedor', '$nif_proveedor', '$contacto_proveedor', '$telefono_proveedor','$email_proveedor','$direccion_proveedor', '$datetime')";
   
   if ($conexion->query($sql)) {
        session_start();
        $_SESSION['mensaje'] = "Se registro el proveedor";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/proveedores/');  
        
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/proveedores/create.php');
    }










