<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/clientes/update_clientes.php';
require '../APP/controllers/clientes/listado_de_clientes.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar un cliente</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
    <!DOCTYPE html>
<html lang="es">
<head>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
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

        .col-md-30 {
            width: 100%; /* Ajusta este valor según sea necesario */
        }
    </style>
</head>
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
                <form action="../APP/controllers/clientes/update_clientes.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="">Nombre Completo</label>
                        <input type="text" name="nombre_cliente" value="<?php echo isset($datos_clientes['nombre_cliente']) ? $datos_clientes['nombre_cliente'] : ''; ?>" placeholder="Actualice el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIF</label>
                        <input type="text" name="nif_cliente" value="<?php echo isset($datos_clientes['nif_cliente']) ? $datos_clientes['nif_cliente'] : ''; ?>" placeholder="Actualice el NIF" required>
                    </div>
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono_cliente" value="<?php echo isset($datos_clientes['telefono_cliente']) ? $datos_clientes['telefono_cliente'] : ''; ?>" placeholder="Actualice el telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email_cliente" value="<?php echo isset($datos_clientes['email_cliente']) ? $datos_clientes['email_cliente'] : ''; ?>" placeholder="Actualice el email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Actualización</label>
                        <input type="date" name="fyh_creacion" value="<?php echo isset($datos_clientes['fyh_creacion']) ? $datos_clientes['fyh_creacion'] : ''; ?>"  required>
                    </div>
                    
                    <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>
                                
                                
                            
