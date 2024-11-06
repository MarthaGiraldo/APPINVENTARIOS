<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/clientes/listado_de_clientes.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de clientes</h1>
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
                            <h3 class="card-title">Clientes registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Cliente Nro</th>
                                    <th>Nombre del cliente</th>
                                    <th>NIF cliente</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                <?php
                                                        
                               
                                $datos_clientes = [];
                               $contador = 0;
                                foreach ($query_clientes as $clientes_datos) {
                                    $contador++;
                                    echo '<tr>
                                        <td>' . $clientes_datos['identificador']. '</td>
                                        <td>' . $clientes_datos['nombre_cliente']. '</td>
                                        <td>' . $clientes_datos['nif_cliente']. '</td>
                                        <td>' . $clientes_datos['telefono_cliente']. '</td>
                                        <td>' . $clientes_datos['email_cliente']. '</td>
                                        <td> <a href="update.php?id=' . $clientes_datos['identificador'] . '" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Actualizar</a></td>
                                        <td> <a href="javascript:confirmDelete(' . $clientes_datos['identificador'] . ');" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a></td>                            </tr>';
                                }
                                ?>
                                </tbody>
                        </table>
                        <script type="text/javascript">
                            function confirmDelete(id) {
                                if (confirm("¿Estás seguro de que quieres eliminar este cliente?")) {
                                    window.location.href = '../APP/controllers/clientes/delete_clientes.php?id=' + id;
                                }
                            }
                        </script>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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
