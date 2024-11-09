<?php
                 
$query_clientes = $conexion->query ("SELECT * FROM tb_clientes");
$clientes_datos = $query_clientes->fetch_all((MYSQLI_ASSOC));
