<?php
require '../APP/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../APP/controllers/proveedores/listado_de_proveedores.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar un nuevo proveedor</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Introduzca los siguientes datos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../APP/controllers/proveedores/create.php" method="post">
                                        <div class="form-group">
                                            <label for="">Nombre de la empresa</label>
                                            <input type="text" name="empresa_proveedor" class="form-control" placeholder="Escriba aquí el nombre de la empresa..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nif-Cif</label>
                                            <input type="text" name="nif_proveedor" class="form-control" placeholder="Escriba aquí el CIF del proveedor..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre de la persona de contacto</label>
                                            <input type="text" name="contacto_proveedor" class="form-control" placeholder="Escriba aquí la persona de contacto..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <input type="text" name="telefono_proveedor" class="form-control"placeholder="Ingrese el telefono..." required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email_proveedor" class="form-control"placeholder="Ingrese el email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="data" name="direccion_proveedor" class="form-control"placeholder="Ingrese la dirección..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fecha creación</label>
                                            <input type="date" name="fyh_creacion" class="form-control" required>
                                        </div>       
                                    
                                     
                                                    </div>
                                                    <div class="form-group">
                                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
             

                                                                                        
<?php include '../layout/parte2.php'; ?>
