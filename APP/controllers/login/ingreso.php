   
<?php

require '../../config.php';
include '../../../validator.inc.php';

$email = $_POST['email'];
$password_user = $_POST['password_user'];

$resultado = $conexion->query ("SELECT * FROM tb_usuarios WHERE email = '$email'AND password_user = '$password_user' ");
if ($resultado->num_rows >0){
$usuarios = $resultado->fetch_array();
   session_start();
   $_SESSION['sesion_email'] = $email;
       header('Location: '.$URL.'/index.php');
    }
       else{ echo "Usuario o contraseña incorrectos,vuelva a intentarlo";
     header('Location: '.$URL.'/login');
    }

