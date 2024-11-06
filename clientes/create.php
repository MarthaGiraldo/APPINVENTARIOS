<?php
require '../APP/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../APP/controllers/clientes/listado_de_clientes.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar un nuevo cliente</h1>
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
                                    <form action="../app/controllers/clientes/create.php" method="post">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombre_cliente" class="form-control" placeholder="Escriba aquí el nombre completo..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nif-Cif</label>
                                            <input type="text" name="nif_cliente" class="form-control" placeholder="Escriba aquí el DNI-NIE-CIF del cliente..." required>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <input type="text" name="telefono_cliente" class="form-control"placeholder="Ingrese el telefono..." required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email_cliente" class="form-control"placeholder="Ingrese el email..." required>
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
    </div>

            <!-- /.row -->
</div><!-- /.container-fluid -->
   
     <!-- /.content -->

<!-- /.content-wrapper -->
                                                                                        
<?php include '../layout/parte2.php'; ?>
