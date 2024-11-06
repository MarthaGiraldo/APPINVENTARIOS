<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/almacen/listado_de_productos.php';
require '../APP/controllers/categorias/listado_de_categoria.php';
include '../almacen/inventario.php';




?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar nuevo producto</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Introduzca los siguientes datos  </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="../app/controllers/almacen/create.php" method="post"
                                     enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Código:</label>
                                                            <input type="text" name="codigo" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Nombre del producto:</label>
                                                            <input type="text" name="nombre" class="form-control" required>
                                                        </div>
                                                    </div>
                                           </div>
                                               
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Descripción del producto:</label>
                                                            <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                       </div>
                                                    <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label for="imagen">Imagen del producto</label>
                                                            <input type="file" name="imagen" class="form-control" id="imagen"><br>    
                                                        </div>
                                                    </div>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Cantidad:</label>
                                                            <input type="number" name="stock" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio compra:</label>
                                                            <input type="number" name="precio_compra" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio venta:</label>
                                                            <input type="number" name="precio_venta" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Fecha de ingreso:</label>
                                                            <input type="date" name="fecha_ingreso" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                               </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="categoria">Categoría:</label>
                                                        <select id="categoria" name="categoria" required>
                                                            <?php 
                                                            $sql = "SELECT identificador_cat, categoria FROM tb_categorias";
                                                            $result = $conexion->query($sql);
                                                            $categorias = [];
                                                            if ($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    $categorias[] = $row;
                                                                }
                                                            }
                                                            foreach ($categorias as $categoria): ?>
                                                            <option value="<?php echo $categoria['identificador_cat']; ?>">
                                                                <?php echo $categoria['categoria']; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select><br>
                                                    </div>
                                                </div>                                                  
                                </div>
                           </div>
                       </div>
                    </div>
                    </div>             <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Guardar producto</button>
                                        </div>
                                    </form>
           </div>
       </div>
   </div>
</div>         
<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>
