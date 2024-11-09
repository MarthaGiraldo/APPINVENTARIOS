<?php
require '../APP/config.php';
require '../layout/sesion.php';
require '../layout/parte1.php';
require '../APP/controllers/usuarios/update_usuario.php';
require '../APP/controllers/roles/listado_de_roles.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar un usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <head>
    <title>Actualizar Usuario</title>
    
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
                <form action="../APP/controllers/usuarios/update_usuario.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" value="<?php echo isset($datos_usuarios['nombres']) ? $datos_usuarios['nombres'] : ''; ?>" placeholder="Actualice el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="<?php echo isset($datos_usuarios['email']) ? $datos_usuarios['email'] : ''; ?>" placeholder="Actualice el usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="text" name="password_user" value="<?php echo isset($datos_usuarios['password_user']) ? $datos_usuarios['password_user'] : ''; ?>" placeholder="Actualice la contraseña" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="role">Seleccione un Rol:</label>
                                                     <select id="role" name="role" required>
                                                     <?php 
                                                     $sql = "SELECT identificador_rol, nombreRol FROM tb_roles";
                                                     $result = $conexion->query($sql);
                                                     
                                                     $rol = [];
                                                     if ($result->num_rows > 0) {
                                                         while($row = $result->fetch_assoc()) {
                                                             $rol[] = $row;
                                                         }
                                                     }
                                                     
                                                     foreach ($query_roles as $rol): ?>
                                                    <option value="<?php echo $rol['identificador_rol']; ?>">
                                                     <?php echo $rol['nombreRol']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                    </select><br>
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
                                
                                
                            
