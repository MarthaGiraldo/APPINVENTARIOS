<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/almacen/listado_de_productos.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar producto</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar producto</title>
    
     <style>
        form {
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        button[type="submit"], .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
        }

        .col-md-30 {
            width: 100%; /* Ajusta este valor según sea necesario */
        }
    </style>

 <!-- Main content -->
 <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Introduzca los siguientes datos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                                <?php


                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        } else {
                            die("ID de producto no proporcionado.");
                        }

                        // Consultar detalles del producto
                        $query_producto = $conexion->query("SELECT * FROM tb_almacen WHERE identificador = '$id'");
                        $producto = $query_producto->fetch_assoc();

                        // Consultar categorías
                        $query_categorias = $conexion->query("SELECT identificador_cat, categoria FROM tb_categorias");
                        ?>

                        <!DOCTYPE html>
                        <html lang="es">
                        <head>
                            <meta charset="UTF-8">
                            <title>Actualizar Producto</title>
                        </head>
                        <body>
                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="../APP/controllers/almacen/update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="codigo">Código:</label>
                                                        <input type="text" name="codigo" value="<?php echo $producto['codigo']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del Producto:</label>
                                                        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="descripcion">Descripción del producto:</label>
                                                        <textarea name="descripcion" cols="30" rows="2" class="form-control" required><?php echo $producto['descripcion']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="stock">Cantidad:</label>
                                                        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="precio_compra">Precio Compra:</label>
                                                         <input type="number" name="precio_compra" step="0.01" value="<?php echo isset($_POST['precio_compra']) ? $_POST['precio_compra'] : ''; ?>" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="precio_venta">Precio Venta:</label>
                                                        <input type="number" name="precio_venta" step="0.01" value="<?php echo isset($_POST['precio_venta']) ? $_POST['precio_venta'] : ''; ?>" required>
                                                       
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="fecha_ingreso">Fecha Ingreso:</label>
                                                        <input type="date" name="fecha_ingreso" value="<?php echo $producto['fecha_ingreso']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="imagen">Imagen del producto</label>
                                                        <input type="file" name="imagen"><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario['id_usuario']; ?>">
                                                <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                                <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="categoria">Categoría:</label>
                                                        <select id="categoria" name="categoria" required>
                                                            <?php while ($categoria = $query_categorias->fetch_assoc()): ?>
                                                                <option value="<?php echo $categoria['categoria']; ?>" <?php echo $categoria['categoria'] == $categoria['identificador_cat'] ? 'selected' : ''; ?>>
                                                                    <?php echo $categoria['categoria']; ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </body>
                        </html>
                  </div>
              </div>
         </div>          
    </div>
</div>
                            
<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>




