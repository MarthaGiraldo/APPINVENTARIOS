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
                    <h1 class="m-0">Listado de productos</h1>
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
                            <h3 class="card-title">Productos registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                           <div class="table table-responsive">
                               <table id="example1" class="table table-bordered table-striped table-sm">
                                   <thead>
                                   <tr>
                                       <th>Código</th>
                                       <th>Nombre del producto</th>
                                       <th>Descripcion</th>
                                       <th>Stock</th>
                                       <th>Precio de compra</th>
                                       <th>Precio venta</th>
                                       <th>Fecha ingreso</th>
                                       <th>Imagen</th>
                                       <th>Usuario</th>
                                       <th>Nombre de la Categoria</th>
                                       <th>Acciones</th>
                                       <th>Acciones</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php                                                                 
                          $contador = 0;
                          if (!empty($query_productos)) {
                              foreach ($query_productos as $producto) {
                                  $contador++;
                                  echo '<tr>
                                      <td>' . $producto['codigo'] . '</td>
                                      <td>' . $producto['nombre'] . '</td>
                                      <td>' . $producto['descripcion'] . '</td>
                                      <td>' . $producto['stock'] . '</td>
                                      <td>€' . number_format($producto['precio_compra'], 2, ',', '.') . '</td>
                                      <td>€' . number_format($producto['precio_venta'], 2, ',', '.') . '</td>
                                      <td>' . $producto['fecha_ingreso'] . '</td>
                                      <td>' . $producto['imagen'] . '</td>
                                      <td>' . $producto['id_usuario'] . '</td>
                                      <td>' . $producto['categoria'] . '</td>
                                      <td><a href="update.php?id=' . $producto['identificador'] . '" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Actualizar</a></td>
                                      <td><a href="javascript:confirmDelete(' . $producto['identificador'] . ');" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a></td>
                                  </tr>';
                              }
                          }
                          
                          ?>
                          </tbody>
                      </table> 
                            
                            <script type="text/javascript">
                            function confirmDelete(id) {
                                if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
                                    window.location.href = '../APP/controllers/almacen/delete.php?id=' + id;
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
</div>

<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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

