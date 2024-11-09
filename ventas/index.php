<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/ventas/listado_de_ventas.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                                                         
                                    <th>Identificador de venta</th>    
                                    <th>Identificador del cliente</th>
                                    <th>Fecha venta</th>
                                    <th>Total </th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                                               
                                $contador= 0;
                                $datos_ventas = [];
                                foreach ($query_ventas as $datos_ventas){
                                    $contador++;                              
                                                                     
                                  echo '<tr>
                                    <td>'  .$datos_ventas['id_venta']. '</td>  
                                    <td>'  .$datos_ventas['id_cliente']. '</td>                                                            
                                    <td>'  .$datos_ventas['fecha_venta']. '</td>  
                                    <td>'  .$datos_ventas['total']. '</td>  
                                    
                                </tr>';                  
                            }
                            ?>
                            
                               </table>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
 </div>



<?php include '../layout/mensajes.php'; ?>
<?php include '../layout/parte2.php'; ?>

