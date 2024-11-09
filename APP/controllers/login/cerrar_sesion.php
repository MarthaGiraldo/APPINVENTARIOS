<?php
require '../../config.php';
$conexion = new mysqli ($servidor, $usuario, $passwd ,$basedatos);
session_start();
if(isset($_SESSION['sesion_email'])){
    session_destroy();
    header('Location: '.$URL.'/login');
}