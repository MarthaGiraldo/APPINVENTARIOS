<?php
//*conectar a la base de datos de XAMPP//
$hostname = "localhost";
$database = "sistemadeinventarios";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($hostname, $username, $password,);
// Check connection
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}
echo "Conexion realizada";
mysqli_close($conn);
?>