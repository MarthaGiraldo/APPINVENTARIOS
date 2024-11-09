<?php
require '../APP/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../APP/controllers/roles/listado_de_roles.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar un nuevo usuario</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Introduzca los siguientes datos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../APP/controllers/usuarios/create.php" method="post">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" placeholder="Escriba aquí el nombre el nombre completo..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Escriba aquí el usuario..." required>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="text" name="password_user" class="form-control"placeholder="Ingrese una contraseña..." required>
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
                                                        
<?php include '../layout/parte2.php'; ?>
