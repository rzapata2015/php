<?php
include('op_sesiones.php');
include('../../class/tbl_perfil.php');

$perfilL = new tbl_perfil();
$resPerfil = $perfilL->listar();

$tbl = new tbl_clientes();
$res = $tbl->listar();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_clientes.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:  </strong>Usuario creado correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong>Usuario modificado correctamente</div>
        <?php } ?>
        <h2>Usuarios</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_clientes" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_clientesCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_clientes" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Nombre Completo</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Perfil</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_cliente']; ?>" class="e_tbl_clientesCargar">
                        <td data-i="id_"><?php echo $registro['id_cliente']; ?></td>
                        <td data-i="nom"><?php echo $registro['nombre_completo']; ?></td>
                        <td data-i="cel"><?php echo $registro['celular']; ?></td>
                        <td data-i="cor"><?php echo $registro['correo']; ?></td>
                        <td data-i="tbl"><?php 
                        $perfil = new tbl_perfil($registro['tbl_perfil_id_perfil']);
                        $perfil->consultar();
                        echo $perfil->getNombre_perfil();
                        ?></td> 
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_clientesActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar Usuario</h4>
                </div>
                <div class="modal-body" id="info_tbl_clientesActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_clientes"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_clientesEliminar" id="btn_tbl_clientesEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_clientesCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Usuario</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_clientesCrear" role="form">
                        <div class="form-group">
                            <label for="nombre_completo" class="control-label">Nombre</label>
                            <input type="text" id="nombre_completo" class="form-control" maxlength="50"  required>
                        </div>
                        <div class="form-group">
                            <label for="celular" class="control-label">Celular</label>
                            <input type="text" id="celular" class="form-control" maxlength="30"  required>
                        </div>
                        <div class="form-group">
                            <label for="correo" class="control-label">Correo</label>
                            <input type="text" id="correo" class="form-control" maxlength="120"  required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_usuario" class="control-label">Nombre de usuario</label>
                            <input type="text" id="nombre_usuario" class="form-control" maxlength="20"  required>
                        </div>
                        <div class="form-group">
                            <label for="clave" class="control-label">Clave</label>
                            <input type="text" id="clave" class="form-control" maxlength="150"  required>
                        </div>
                        <div class="form-group">
                            <label for="tbl_perfil_id_perfil" class="control-label">Perfil</label>
                            
                            <select id="tbl_perfil_id_perfil" class="form-control">
                                <?php
                                foreach ($resPerfil as $result) {
                                    ?>
                                    <option value="<?php echo $result['id_perfil']; ?>"><?php echo $result['nombre_perfil']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_clientesCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_clientesCrear" value="Crear" form="f_tbl_clientesCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_clientesEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el Usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_clientesEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</body>
</html>
             