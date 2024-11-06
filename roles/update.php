<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';

// Verificar si se ha pasado un ID
if (!isset($_GET['id'])) {
    die("ID de rol no proporcionado.");
}

$id = $_GET['id'];

// Obtener los datos del rol a actualizar
$query_roles = $conexion->query("SELECT tb_roles.identificador_rol, tb_roles.nombreRol FROM tb_roles WHERE tb_roles.identificador_rol = '$id'");
if (!$query_roles) {
    die("Error en la consulta: " . $conexion->error);
}
$datos_roles = $query_roles->fetch_assoc();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Editar Rol</h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Introduzca los siguientes datos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../APP/controllers/roles/update_roles.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $datos_roles['identificador_rol']; ?>">
                                            <input type="text" name="nombreRol" value="<?php echo isset($datos_roles['nombreRol']) ? $datos_roles['nombreRol'] : ''; ?>" placeholder="Actualice el rol" required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
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
</div>

<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>
