<?php
            
               
            $query_categorias = $conexion->query ("SELECT identificador_cat, categoria FROM tb_categorias");
            $datos_categorias = $query_categorias->fetch_all(MYSQLI_ASSOC);

            