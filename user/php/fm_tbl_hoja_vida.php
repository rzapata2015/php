<?php
include('op_sesiones.php');
include('../../class/tbl_hoja_vida.php');
include('../../class/tbl_dependencias.php');
include('../../class/tbl_marcas.php');
include('../../class/tbl_tipo_pc.php'); 
include('../../class/tbl_tipo_pc_distribucion.php');
include('../../class/tbl_tipo_board.php');
include('../../class/tbl_tipo_fuente.php');
include('../../class/tbl_tipo_monitor.php');
include('../../class/tbl_tipo_dd.php');
include('../../class/tbl_tipo_ram.php');

$tbl = new tbl_hoja_vida();
if($cli->getTbl_perfil_id_perfil()==1){
    $res = $tbl->listar();  
}else{
    $res = $tbl->listarPorUsuario($cli->getId_cliente());  
}



$dependencia1 = new tbl_dependencias();
$resDependencias = $dependencia1->listar();

$marca1 = new tbl_marcas();
$resMarcas = $marca1->listar();

$tipoPc1 = new tbl_tipo_pc();
$resTipoPc = $tipoPc1->listar();

$tipoDis = new tbl_tipo_pc_distribucion();
$resTipoDis = $tipoDis->listar();

$tipoBord = new tbl_tipo_board();
$resTipoBoard = $tipoBord->listar();

$tipoFuent = new tbl_tipo_fuente();
$resTipoFuente = $tipoFuent->listar();

$tipoMoni = new tbl_tipo_monitor();
$resTipoMoni = $tipoMoni->listar();

$tipodd1 = new tbl_tipo_dd();
$resTipodd = $tipodd1->listar();

$tipoRam1 = new tbl_tipo_ram();
$resTipoRam = $tipoRam1->listar();

$tipoCliente = new tbl_clientes();
$resClientes = $tipoCliente->listar();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("s_cabecera.php"); ?>
<script src="../js/tbl_hoja_vida.js"></script>
</head>
<body>
    <?php include("s_menu.php"); ?>
    <div id="d_contenedor" class="container">
        <?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Hoja de Vida creada correctamente</div>
        <?php } ?>
        <?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Hoja de Vida modificada correctamente</div>
        <?php } ?>
        <h2>Hojas de Vida Pc</h2>
        <div class="row">
            <div class="col-md-10">
                <div class="input-group"> <span class="input-group-addon">Buscar:</span>
                    <input id="filtrartbl_hoja_vida" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <button id="e_tbl_hoja_vidaCrear" class="btn btn-warning">Crear</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="tbl_tbl_hoja_vida" class="table table-hover table-bordered">
                <thead>
                    <tr class="ordenamiento">
                        <th>Id</th>
                        <th>Dependencia</th>
                        <th>Número Equipo</th>
                        <th>Marca</th>
                        <th>Tipo Pc</th>
                        <th>Foto</th>
                        <?php
                            if($cli->getTbl_perfil_id_perfil()==1){
                         ?>
                        <th>Cliente</th>  
                        <?php } ?>                      
                    </tr>
                </thead>
                <tbody class="buscar">
                    <?php foreach($res as $registro){ ?>
                    <tr data-cod="<?php echo $registro['id_hoja_vida']; ?>" class="e_tbl_hoja_vidaCargar">
                        <td data-i="id_"><?php echo $registro['id_hoja_vida']; ?></td>
                        <td data-i="tbl"><?php
                        $dependencia = new tbl_dependencias($registro['tbl_dependencias_id_dependencia']);
                        $dependencia->consultar();
                        echo $dependencia->getNombre_dependencia(); 
                        ?></td>
                        <td data-i="equ"><?php echo $registro['equipo_numero']; ?></td>
                        <td data-i="tbl"><?php 
                        $marca = new tbl_marcas($registro['tbl_marcas_id_marca']);
                        $marca->consultar();
                        echo $marca->getNombre_marca();
                         ?></td>
                        <td data-i="tbl"><?php
                        $tipoPc = new tbl_tipo_pc($registro['tbl_tipo_pc_id_tipo_pc']);
                        $tipoPc->consultar();
                        echo $tipoPc->getNombre_tipo_pc(); 
                        ?></td>
                        <td data-i="fot"><a href="<?php echo $registro['foto']; ?>" target="_blank">Foto</a></td>
                        <?php
                            if($cli->getTbl_perfil_id_perfil()==1){
                        ?>
                         <td data-i="tbl"><?php
                         $cli1 = new tbl_clientes($registro['tbl_clientes_id_cliente']);
                         $cli1->consultar();
                         echo $cli1->getNombre_completo();
                         ?></td>
                        <?php } ?>    
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="vtn_tbl_hoja_vidaActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Actualizar Hoja de Vida</h4>
                </div>
                <div class="modal-body" id="info_tbl_hoja_vidaActualizar"></div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_hoja_vida"></div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vtn_tbl_hoja_vidaEliminar" id="btn_tbl_hoja_vidaEliminar">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_hoja_vidaCrear" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear Hoja de Vida</h4>
                </div>
                <div class="modal-body">
                    <form id="f_tbl_hoja_vidaCrear" role="form">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="tbl_dependencias_id_dependencia" class="control-label">Dependencias</label>
                                    <select id="tbl_dependencias_id_dependencia" class="form-control">
                                        <?php
                                        foreach ($resDependencias as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_dependencia']; ?>"><?php echo $result['nombre_dependencia']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="equipo_numero" class="control-label">Número Equipo</label>
                                    <input type="text" id="equipo_numero" class="form-control vali_num" data-dec="0">
                                </div>
                                <div class="form-group">
                                    <label for="tbl_marcas_id_marca" class="control-label">Marca Equipo</label>
                                    <select id="tbl_marcas_id_marca" class="form-control">
                                        <?php
                                        foreach ($resMarcas as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_marcas']; ?>"><?php echo $result['nombre_marca']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_pc_id_tipo_pc" class="control-label">Tipo Pc</label>
                                    <select id="tbl_tipo_pc_id_tipo_pc" class="form-control">
                                        <?php
                                        foreach ($resTipoPc as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_pc']; ?>"><?php echo $result['nombre_tipo_pc']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_compra" class="control-label">Fecha Compra</label>
                                    <input type="text" id="fecha_compra" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="valor" class="control-label">Valor</label>
                                    <input type="text" id="valor" class="form-control vali_num" data-dec="0">
                                </div>
                                <div class="form-group">
                                    <label for="fecha_expiracion_garantia" class="control-label">Fecha Expiración Garantia</label>
                                    <input type="text" id="fecha_expiracion_garantia" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_registrado" class="control-label">Fecha de Registro</label>
                                    <input type="text" id="fecha_registrado" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_pc_distribucion_id_tipo_pc_distribucion" class="control-label">Tipo Distribución Pc</label>
                                    <select id="tbl_tipo_pc_distribucion_id_tipo_pc_distribucion" class="form-control">
                                        <?php
                                        foreach ($resTipoDis as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_pc_distribucion']; ?>"><?php echo $result['nombre_tipo_distribucion']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="manija" class="control-label">Manija</label>
                                    <select id="manija" class="form-control">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="panel_frontal" class="control-label">Panel Frontal</label>
                                      <select id="panel_frontal" class="form-control">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="iluminacion" class="control-label">Iluminación - Moding</label>
                                    <select id="iluminacion" class="form-control">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="unidades_opticas" class="control-label">Unidades Ópticas</label>
                                    <input type="text" id="unidades_opticas" class="form-control" maxlength="50" >
                                </div>
                                <div class="form-group">
                                    <label for="lector_multitarjetas" class="control-label">Lector Multitarjetas</label>
                                    <select id="lector_multitarjetas" class="form-control">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad_puertos_usb" class="control-label">Cantidad Puertos USB</label>
                                    <input type="text" id="cantidad_puertos_usb" class="form-control vali_num" data-dec="0">
                                </div>
                                <div class="form-group">
                                    <label for="puertos_video" class="control-label">Puertos Video</label>
                                    <input type="text" id="puertos_video" class="form-control" maxlength="30" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="ethernet" class="control-label">Ethernet</label>
                                       <select id="ethernet" class="form-control">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="plug_audio" class="control-label">Plug Audio</label>
                                     <select id="plug_audio" class="form-control"> 
                                         <option value="1">Si</option>
                                         <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad_ps2" class="control-label">Cantidad Ps2</label>
                                    <input type="text" id="cantidad_ps2" class="form-control vali_num" data-dec="0">
                                </div>
                                <div class="form-group">
                                    <label for="otros_puertos" class="control-label">Otros Puertos</label>
                                    <input type="text" id="otros_puertos" class="form-control" maxlength="50" >
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_board_id_tipo_board" class="control-label">Tipo Board</label>
                                    <select id="tbl_tipo_board_id_tipo_board" class="form-control">
                                        <?php
                                        foreach ($resTipoBoard as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_board']; ?>"><?php echo $result['nombre_tipo_board']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_fuente_id_tipo_fuente" class="control-label">Tipo Fuente</label>
                                    <select id="tbl_tipo_fuente_id_tipo_fuente" class="form-control">
                                        <?php
                                        foreach ($resTipoFuente as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_fuente']; ?>"><?php echo $result['nombre_fuente_poder']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marca_fuente" class="control-label">Marca Fuente</label>
                                    <input type="text" id="marca_fuente" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="modelo_fuente" class="control-label">Modelo Fuente</label>
                                    <input type="text" id="modelo_fuente" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="voltaje_fuente" class="control-label">Voltaje Fuente</label>
                                    <input type="text" id="voltaje_fuente" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="watt_fuente" class="control-label">Watt Fuente</label>
                                    <input type="text" id="watt_fuente" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="tamano_monitor" class="control-label">Tamaño Monitor</label>
                                    <input type="text" id="tamano_monitor" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="marca_monitor" class="control-label">Marca Monitor</label>
                                    <input type="text" id="marca_monitor" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_monitor_id_tipo_monitor" class="control-label">Tipo Monitor</label>
                                    <select id="tbl_tipo_monitor_id_tipo_monitor" class="form-control">
                                        <?php
                                        foreach ($resTipoMoni as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_monitor']; ?>"><?php echo $result['nombre_tipo_monitor']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marca_dd" class="control-label">Marca Disco Duro</label>
                                    <input type="text" id="marca_dd" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="capacidad_dd" class="control-label">Capacidad Disco Duro</label>
                                    <input type="text" id="capacidad_dd" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="serial_dd" class="control-label">Serial Disco Duro</label>
                                    <input type="text" id="serial_dd" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="tbl_tipo_dd_id_tipo_dd" class="control-label">Tipo Disco Duro</label>                         
                                     <select id="tbl_tipo_dd_id_tipo_dd" class="form-control">
                                        <?php
                                        foreach ($resTipodd as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_dd']; ?>"><?php echo $result['nombre_tipo_dd']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marca_board" class="control-label">Marca Board</label>
                                    <input type="text" id="marca_board" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="serie_board" class="control-label">Serie Board</label>
                                    <input type="text" id="serie_board" class="form-control" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="capacidad_ram" class="control-label">Capacidad Ram</label>
                                    <input type="text" id="capacidad_ram" class="form-control vali_num" data-dec="0">
                                </div>
                                <div class="form-group">
                                    <label for="tbl_tipo_ram_id_tipo_ram" class="control-label">Tipo Ram</label>
                                    <select id="tbl_tipo_ram_id_tipo_ram" class="form-control">
                                        <?php
                                        foreach ($resTipoRam as $result) {
                                            ?>
                                            <option value="<?php echo $result['id_tipo_ram']; ?>"><?php echo $result['nombre_tipo_ram']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="velocidad_ram" class="control-label">Velocidad Ram</label>
                                    <input type="text" id="velocidad_ram" class="form-control" maxlength="30" >
                                </div>
                                <div class="form-group">
                                    <label for="ramas_expansion" class="control-label">Ranuras de Expansión</label>
                                    <input type="text" id="ramas_expansion" class="form-control" maxlength="100" >
                                </div>
                                <div class="form-group">
                                    <label for="tarjetas_expansion" class="control-label">Tarjetas de Expansión</label>
                                    <input type="text" id="tarjetas_expansion" class="form-control" maxlength="200" >
                                </div>
                                <!--<div class="form-group">
                                    <label for="foto" class="control-label">Foto</label>
                                    <input type="text" id="foto" class="form-control" maxlength="120" >
                                </div>-->
                                <div class="form-group">
                                    <label for="software" class="control-label">Software</label>
                                    <textarea id="software" placeholder="Software" cols="50" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="observaciones" class="control-label">Observaciones</label>
                                    <textarea id="observaciones" placeholder="Observaciones" cols="50" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="tbl_clientes_id_cliente" class="form-control vali_num" data-dec="0" value="<?php echo $cli->getId_cliente(); ?>" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="d_mensajeModaltbl_hoja_vidaCrear"></div>
                    <input type="submit" class="btn btn-warning" id="btn_tbl_hoja_vidaCrear" value="Crear" form="f_tbl_hoja_vidaCrear">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="vtn_tbl_hoja_vidaEliminar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar Hoja Vida Pc</h4>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar la Hoja Vida Pc?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_tbl_hoja_vidaEliminar">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
</body>
