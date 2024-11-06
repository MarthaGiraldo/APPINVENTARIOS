<?php
require $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';
session_start();

if (!isset($_POST['id'])) {
    die("ID de rol no proporcionado.");
}

$id = $_POST['id'];
$nombreRol = $_POST['nombreRol'];

// Actualizar la base de datos
$sql = "UPDATE tb_roles SET nombreRol = '$nombreRol' WHERE identificador_rol = $id";

mysqli_query($conexion,$sql);
if ($sql){
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

