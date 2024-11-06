<?php
include $_SERVER['DOCUMENT_ROOT'] . '/www.sistemadeinventarios.com/APP/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID de cliente no proporcionado.");
}

// Consulta de detalles del usuario
$query_clientes = $conexion->query("SELECT tb_clientes.identificador, tb_clientes.nombre_cliente, tb_clientes.nif_cliente, tb_clientes.telefono_cliente,
 tb_clientes.email_cliente, tb_clientes.fyh_creacion FROM tb_clientes WHERE tb_clientes.identificador = '$id'");
if (!$query_clientes) {
    die("Error en la consulta: " . $conexion->error);
}
$datos_clientes = $query_clientes->fetch_assoc();

// Obtener datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
   $nombre_cliente = $_POST['nombre_cliente'];
   $nif_cliente = $_POST['nif_cliente'];
   $telefono_cliente = $_POST['telefono_cliente'];
   $email_cliente = $_POST['email_cliente'];
   $datetime = $_POST['fyh_creacion'];

    // Actualizar el cliente en la tabla clientes
    $sql_update = "UPDATE tb_clientes SET nombre_cliente = '$nombre_cliente', nif_cliente = '$nif_cliente',  telefono_cliente = '$telefono_cliente',
      email_cliente  = '$email_cliente', fyh_creacion = '$datetime' WHERE identificador = '$id'";
    if ($conexion->query($sql_update)) {
      
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Cliente actualizado correctamente";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/clientes/');
            exit();
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['mensaje'] = "Error no se pudo actualizar el cliente en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/clientes/update.php?id='.$id);
            exit();
        }
    }


