
<?php
$query_productos = $conexion->query(
    "SELECT 
        tb_almacen.identificador,
        tb_almacen.codigo, 
        tb_almacen.nombre, 
        tb_almacen.descripcion, 
        tb_almacen.stock, 
        tb_almacen.precio_compra, 
        tb_almacen.precio_venta, 
        tb_almacen.fecha_ingreso, 
        tb_almacen.imagen, 
        tb_almacen.id_usuario, 
        tb_categorias.categoria
   
    FROM 
        tb_almacen 
    JOIN 
        tb_almacen_categoria ON tb_almacen.identificador = tb_almacen_categoria.id_Almacen
    JOIN 
        tb_categorias ON tb_almacen_categoria.id_Categoria = tb_categorias.identificador_cat  GROUP BY tb_almacen.identificador
");

if ($query_productos === false) {
    // Manejar el error, por ejemplo, mostrando un mensaje de error
    echo "Error en la consulta: " . $conexion->error;
} else {
    // Procesar los resultados
    $producto = $query_productos->fetch_all(MYSQLI_ASSOC);
}

