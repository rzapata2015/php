<?php
include('op_sesiones.php');
include('../../class/tbl_tipo_fuente.php');
$tbl = new tbl_tipo_fuente();
$res = $tbl->listar();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_tipo_fuente.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa: </strong>Tipo de fuente creada correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa: </strong>Tipo de fuente modificada correctamente</div>
        <?php } ?>
        <h2>Tipo Fuente</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_tipo_fuente" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_tipo_fuenteCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_tipo_fuente" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_tipo_fuente']; ?>" class="e_tbl_tipo_fuenteCargar">
                        <td data-i="id_"><?php echo $registro['id_tipo_fuente']; ?></td>
                        <td data-i="nom"><?php echo $registro['nombre_fuente_poder']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_tipo_fuenteActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar tipo de fuente</h4>
                </div>
                <div class="modal-body" id="info_tbl_tipo_fuenteActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_fuente"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_tipo_fuenteEliminar" id="btn_tbl_tipo_fuenteEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_fuenteCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear tipo de Fuente</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_tipo_fuenteCrear" role="form">
                        <div class="form-group">
                            <label for="nombre_fuente_poder" class="control-label">Nombre </label>
                            <input type="text" id="nombre_fuente_poder" class="form-control" maxlength="20"  required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_tipo_fuenteCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_tipo_fuenteCrear" value="Crear" form="f_tbl_tipo_fuenteCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_tipo_fuenteEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar tipo de fuente</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el tipo de fuente?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_tipo_fuenteEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>