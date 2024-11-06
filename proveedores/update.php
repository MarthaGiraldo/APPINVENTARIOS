<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/proveedores/update.php';
require '../APP/controllers/proveedores/listado_de_proveedores.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar un proveedor</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
    
<head>
    <meta charset="UTF-8">
    <title>Actualizar Proveedor</title>
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


</head>
<body>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="col-md-12">
                <form action="../APP/controllers/proveedores/update.php?id=<?php echo $id; ?>" method="post">
                    <div class="row">
                        <div class="col-md-30">
                            <div class="form-group">
                                <label for="">Nombre de la Empresa</label>
                                <input type="text" name="empresa_proveedor" value="<?php echo isset($datos_proveedores['empresa_proveedor']) ? $datos_proveedores['empresa_proveedor'] : ''; ?>" placeholder="Actualice la empresa" required>
                            </div>
                            <div class="form-group">
                                <label for="">NIF</label>
                                <input type="text" name="nif_proveedor" value="<?php echo isset($datos_proveedores['nif_proveedor']) ? $datos_proveedores['nif_proveedor'] : ''; ?>" placeholder="Actualice el NIF" required>
                            </div>
                            <div class="form-group">
                                <label for="">Persona de Contacto</label>
                                <input type="text" name="contacto_proveedor" value="<?php echo isset($datos_proveedores['contacto_proveedor']) ? $datos_proveedores['contacto_proveedor'] : ''; ?>" placeholder="Introduzca el nombre de Contacto" required>
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="telefono_proveedor" value="<?php echo isset($datos_proveedores['telefono_proveedor']) ? $datos_proveedores['telefono_proveedor'] : ''; ?>" placeholder="Actualice el teléfono" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email_proveedor" value="<?php echo isset($datos_proveedores['email_proveedor']) ? $datos_proveedores['email_proveedor'] : ''; ?>" placeholder="Actualice el email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion_proveedor" value="<?php echo isset($datos_proveedores['direccion_proveedor']) ? $datos_proveedores['direccion_proveedor'] : ''; ?>" placeholder="Actualice la dirección" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha Actualización</label>
                                <input type="date" name="fyh_creacion" value="<?php echo isset($datos_proveedores['fyh_creacion']) ? $datos_proveedores['fyh_creacion'] : ''; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
                    
                                
                            
