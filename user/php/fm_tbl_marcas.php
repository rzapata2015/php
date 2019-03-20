<?php
include('op_sesiones.php');
include('../../class/tbl_marcas.php');


$tbl = new tbl_marcas();
$res = $tbl->listar();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_marcas.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Marca creada correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Marca modificada correctamente</div>
        <?php } ?>
        <h2>Marcas</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_marcas" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_marcasCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_marcas" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_marca']; ?>" class="e_tbl_marcasCargar">
                        <td data-i="id_"><?php echo $registro['id_marca']; ?></td>
                        <td data-i="nom"><?php echo $registro['nombre_marca']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_marcasActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar Marca</h4>
                </div>
                <div class="modal-body" id="info_tbl_marcasActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_marcas"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_marcasEliminar" id="btn_tbl_marcasEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_marcasCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Marca</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_marcasCrear" role="form">
                        <div class="form-group">
                            <label for="nombre_marca" class="control-label">Nombre</label>
                            <input type="text" id="nombre_marca" class="form-control" maxlength="30"  required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_marcasCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_marcasCrear" value="Crear" form="f_tbl_marcasCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_marcasEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar Marca</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar la Marca?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_marcasEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
