<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/proveedores/listado_de_proveedores.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Proveedores
                        </h1>
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
                            <h3 class="card-title">Proveedores registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Empresa</th>
                                    <th>Cif</th>
                                    <th>Persona de contacto</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                               <?php
                                                                                            
                                $contador_proveedores = 0;
                                $datos_proveedores = [];
                                foreach ($query_proveedores as $datos_proveedores){
                                    $contador_proveedores ++;                              
                                    
                                  echo '<tr>
                                    <td>' .$datos_proveedores['identificador']. '</td>                                                            
                                    <td>' .$datos_proveedores['empresa_proveedor']. '</td>  
                                     <td>'.$datos_proveedores['nif_proveedor']. '</td> 
                                    <td>' .$datos_proveedores['contacto_proveedor']. '</td>  
                                    <td>' .$datos_proveedores['telefono_proveedor']. '</td>  
                                    <td>' .$datos_proveedores['email_proveedor']. '</td>
                                     <td>'.$datos_proveedores['direccion_proveedor']. '</td>
                                    <td> <a href="update.php?id='.$datos_proveedores['identificador']. '" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Actualizar</a</td>
                                      <td> <a href="javascript:confirmDelete(' . $datos_proveedores['identificador'] . ');" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a></td>                        
                                </tr>';                  
                            }
                            ?>
                            </table>
                            <script type="text/javascript">
                            function confirmDelete(id) {
                                if (confirm("¿Estás seguro de que quieres eliminar este proveedor?")) {
                                    window.location.href = '../APP/controllers/proveedores/delete.php?id=' + id;
                                }
                            }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>











