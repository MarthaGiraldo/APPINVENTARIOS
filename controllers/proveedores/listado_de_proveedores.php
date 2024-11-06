<?php
                 
$query_proveedores = $conexion->query ("SELECT * FROM tb_proveedores");
$datos_proveedores = $query_proveedores->fetch_all();