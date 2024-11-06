<?php
session_start();
if(isset($_SESSION['sesion_email']) && $_SESSION['sesion_email']==true){
    //echo "si existe sesion de ".$_SESSION['sesion_email'];
    $email_sesion = $_SESSION['sesion_email'];
     }else{
    echo "no existe sesion";
    header('Location: '.$URL.'/login');
}