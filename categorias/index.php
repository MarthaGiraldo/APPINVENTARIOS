<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/categorias/listado_de_categoria.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorías</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorías registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nro Categoria</th>
                                <th>Nombre de la Categoria</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador_de_categorias = 0;
                            $query_categorias = $conexion->query("SELECT identificador_cat, categoria FROM tb_categorias"); // Asegúrate de tener esta consulta
                            while ($datos_categorias = $query_categorias->fetch_assoc()) {
                                $contador_de_categorias++;
                                echo '<tr>
                                    <td>' . $datos_categorias['identificador_cat'] . '</td>
                                    <td>' . $datos_categorias['categoria'] . '</td>
                                    <td> <a href="update.php?id=' . $datos_categorias['identificador_cat'] . '" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Actualizar</a</td>
                                    <td><a href="javascript:confirmDelete(' . $datos_categorias['identificador_cat'] . ');" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a></td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                    <script type="text/javascript">
                    function confirmDelete(id) {
                        if (confirm("¿Estás seguro de que quieres eliminar esta categoria?")) {
                            window.location.href = '../APP/controllers/categorias/delete.php?id=' + id;
                        }
                    }
                    </script>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
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


