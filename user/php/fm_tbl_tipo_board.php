<?php
include('op_sesiones.php');
include('../../class/tbl_tipo_board.php');
$tbl = new tbl_tipo_board();
$res = $tbl->listar();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_tipo_board.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Tipo Board creada correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Tipo Board modificada correctamente</div>
        <?php } ?>
        <h2>Tipo Board</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_tipo_board" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_tipo_boardCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_tipo_board" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_tipo_board']; ?>" class="e_tbl_tipo_boardCargar">
                        <td data-i="id_"><?php echo $registro['id_tipo_board']; ?></td>
                        <td data-i="nom"><?php echo $registro['nombre_tipo_board']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_tipo_boardActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar Tipo Board</h4>
                </div>
                <div class="modal-body" id="info_tbl_tipo_boardActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_board"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_tipo_boardEliminar" id="btn_tbl_tipo_boardEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_boardCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Tipo Board</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_tipo_boardCrear" role="form">
                        <div class="form-group">
                            <label for="nombre_tipo_board" class="control-label">Nombre</label>
                            <input type="text" id="nombre_tipo_board" class="form-control" maxlength="28"  required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_boardCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_tipo_boardCrear" value="Crear" form="f_tbl_tipo_boardCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_boardEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar el Tipo Board</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el Tipo Board?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_tipo_boardEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>