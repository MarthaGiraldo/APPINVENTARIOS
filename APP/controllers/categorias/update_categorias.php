<?php
require $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';
session_start();

if (!isset($_POST['id'])) {
    die("ID de categoria no proporcionado.");
}

$id = $_POST['id'];
$categoria = $_POST['categoria'];

// Actualizar la base de datos
$sql = "UPDATE tb_categorias SET categoria = '$categoria' WHERE identificador_cat = $id";

mysqli_query($conexion,$sql);
if ($sql){
    session_start();
        $_SESSION['mensaje'] = "Se registro la categoria de manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/categorias/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/categorias/create.php');
    }
