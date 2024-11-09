<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/usuarios/listado_de_usuarios.php';


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
                            <h3 class="card-title">Usuarios registrado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Codigo</th>    
                                    <th>Nombres y apellidos</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Nombre del Rol</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                                               
                                $contador_de_usuarios = 0;
                                $datos_usuarios = [];
                                foreach ($query_usuarios as $datos_usuarios){
                                    $contador_de_usuarios = $contador_de_usuarios + 1;                              
                                    
                                  echo '<tr>
                                    <td>'  .$datos_usuarios['identificador']. '</td>                                                            
                                    <td>'  .$datos_usuarios['nombres']. '</td>  
                                    <td>'  .$datos_usuarios['email']. '</td>  
                                   <td>'  .$datos_usuarios['identificador_rol']. '</td>  
                                   <td>'  .$datos_usuarios['nombreRol']. '</td>  
                                    <td> <a href="update.php?id=' . $datos_usuarios['identificador'] . '" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Actualizar</a</td>
                                      <td> <a href="javascript:confirmDelete(' . $datos_usuarios['identificador'] . ');" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a></td>                        
                                </tr>';                  
                            }
                            ?>
                            
                            <script type="text/javascript">
                            function confirmDelete(id) {
                                if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
                                    window.location.href = '../APP/controllers/usuarios/delete_usuario.php?id=' + id;
                                }
                            }
                            </script>
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

