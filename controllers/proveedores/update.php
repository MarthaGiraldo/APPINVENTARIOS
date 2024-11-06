<?php
include $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID de proveedor no proporcionado.");
}

// Consulta de detalles del proveedor
$query_proveedores = $conexion->query("SELECT tb_proveedores.identificador, tb_proveedores.empresa_proveedor, tb_proveedores.nif_proveedor, tb_proveedores.contacto_proveedor, tb_proveedores.telefono_proveedor, tb_proveedores.email_proveedor, tb_proveedores.direccion_proveedor, tb_proveedores.fyh_creacion FROM tb_proveedores WHERE tb_proveedores.identificador = '$id'");
if (!$query_proveedores) {
    die("Error en la consulta: " . $conexion->error);
}
$datos_proveedores = $query_proveedores->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empresa_proveedor = $_POST['empresa_proveedor'];
    $nif_proveedor = $_POST['nif_proveedor'];
    $contacto_proveedor = $_POST['contacto_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $email_proveedor = $_POST['email_proveedor'];
    $direccion_proveedor = $_POST['direccion_proveedor'];
    $datetime = $_POST['fyh_creacion'];

    // Actualizar el proveedor en la tabla proveedores
    $sql_update = "UPDATE tb_proveedores SET empresa_proveedor = '$empresa_proveedor', nif_proveedor = '$nif_proveedor', contacto_proveedor = '$contacto_proveedor', telefono_proveedor = '$telefono_proveedor', email_proveedor = '$email_proveedor', direccion_proveedor = '$direccion_proveedor', fyh_creacion = '$datetime' WHERE identificador = '$id'";

    if ($conexion->query($sql_update)) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = "Proveedor actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/proveedores/');
        exit();
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = "Error no se pudo actualizar el proveedor en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/proveedores/update.php?id='.$id);
        exit();
    }
}
?>

