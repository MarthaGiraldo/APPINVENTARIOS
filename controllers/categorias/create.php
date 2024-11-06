<?php
include '../../config.php';
// Verificar la conexión a la base de datos
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario
$categoria = $_POST['categoria'];

// Insertar la categoría en la base de datos
$sql = "INSERT INTO tb_categorias (identificador_cat, categoria) VALUES (NULL, '$categoria')";

if ($conexion->query($sql)) {
    session_start();
    $_SESSION['mensaje'] = "Se registró la categoría";
    $_SESSION['icono'] = "success";
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la categoría en la base de datos";
    $_SESSION['icono'] = "error";
}

header('Location: '.$URL.'/categorias/');
?>

    


