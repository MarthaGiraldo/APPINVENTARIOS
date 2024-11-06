
<?php
                 
$query_roles = $conexion->query ("SELECT * FROM tb_roles");
$datos_roles = $query_roles->fetch_all();

