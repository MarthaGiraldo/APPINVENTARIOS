<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';

// Verificar si se ha pasado un ID
if (!isset($_GET['id'])) {
    die("ID de categoria no proporcionado.");
}

$id = $_GET['id'];

// Obtener los datos de la categoria a actualizar
$query_categorias = $conexion->query("SELECT tb_categorias.identificador_cat, tb_categorias.categoria FROM tb_categorias WHERE tb_categorias.identificador_cat = '$id'");
if (!$query_categorias) {
    die("Error en la consulta: " . $conexion->error);
}
$datos_categorias = $query_categorias->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Categoría</title>
    <style>
        form {
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        button[type="submit"], .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
        }

        .col-md-12 {
            width: 100%; /* Ajusta este valor según sea necesario */
        }
    </style>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Editar la categoria</h1>
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
                                <div class="col-md-30">
                                    <form action="../APP/controllers/categorias/update_categorias.php" method="post">
                                    <div class="col-md-12">    
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $datos_categorias['identificador_cat']; ?>">
                                            <input type="text" name="categoria" value="<?php echo isset($datos_categorias['categoria']) ? $datos_categorias['categoria'] : ''; ?>" placeholder="Actualice la categoria" required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>                                                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require '../layout/mensajes.php'; ?>
<?php require '../layout/parte2.php'; ?>
