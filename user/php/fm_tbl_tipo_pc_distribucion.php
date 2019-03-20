<?php
include('op_sesiones.php');
include('../../class/tbl_tipo_pc_distribucion.php');
$tbl = new tbl_tipo_pc_distribucion();
$res = $tbl->listar();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_tipo_pc_distribucion.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa: </strong>Distribucion creada correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong>Distribucion modificada correctamente</div>
        <?php } ?>
        <h2>Tipo  Distribución</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_tipo_pc_distribucion" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_tipo_pc_distribucionCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_tipo_pc_distribucion" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_tipo_pc_distribucion']; ?>" class="e_tbl_tipo_pc_distribucionCargar">
                        <td data-i="id_"><?php echo $registro['id_tipo_pc_distribucion']; ?></td>
                        <td data-i="nom"><?php echo $registro['nombre_tipo_distribucion']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_tipo_pc_distribucionActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar Tipo Distribución</h4>
                </div>
                <div class="modal-body" id="info_tbl_tipo_pc_distribucionActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_pc_distribucion"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_tipo_pc_distribucionEliminar" id="btn_tbl_tipo_pc_distribucionEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_pc_distribucionCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Distribución</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_tipo_pc_distribucionCrear" role="form">
                        <div class="form-group">
                            <label for="nombre_tipo_distribucion" class="control-label">Nombre</label>
                            <input type="text" id="nombre_tipo_distribucion" class="form-control" maxlength="45"  required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_pc_distribucionCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_tipo_pc_distribucionCrear" value="Crear" form="f_tbl_tipo_pc_distribucionCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_pc_distribucionEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar Distribución</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el tipo de Distribución?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_tipo_pc_distribucionEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>