<?php

$query_usuarios = $conexion->query("SELECT tb_usuarios.identificador, tb_usuarios.nombres, tb_usuarios.email, tb_roles.identificador_rol, tb_roles.nombreRol
 FROM tb_usuarios 
 JOIN tb_usuarios_roles  ON tb_usuarios.identificador = tb_usuarios_roles.user_id
 JOIN tb_roles ON tb_usuarios_roles.rol_id = tb_roles.identificador_rol
 ");

if ($query_usuarios === true) {
    // Manejar el error, por ejemplo, mostrando un mensaje de error
    echo "se ha creado el usuario " . $conexion->error;
} else {
    // Procesar los resultados
    $datos_usuarios = $query_usuarios->fetch_all(MYSQLI_ASSOC);
}




