<?php
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


$tbl = new tbl_hoja_vida($_POST['codigo']);
$tbl->consultar();

$dependencia = new tbl_dependencias();
$resDependencia = $dependencia->listar();

$marca = new tbl_marcas();
$resMarca = $marca->listar();

$tipopc = new tbl_tipo_pc();
$resPc = $tipopc->listar();

$distripc = new tbl_tipo_pc_distribucion();
$resDistri = $distripc->listar();

$tipobord = new tbl_tipo_board();
$resBoard = $tipobord->listar();

$tipofuente = new tbl_tipo_fuente();
$resFuente = $tipofuente->listar();

$tipomoni = new tbl_tipo_monitor();
$resMoni = $tipomoni->listar();

$tipodd = new tbl_tipo_dd();
$resDd = $tipodd->listar();

$tiporam = new tbl_tipo_ram();
$resRam = $tiporam->listar();

?>
<style type="text/css">
    .txt {
        text-align: right;
    }
</style>
<form id="f_tbl_hoja_vidaActualizar" role="form">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_hoja_vidaAct">
            <div class="form-group">
                <label for="tbl_dependencias_id_dependencia" class="control-label">Dependencias</label>
                <select id="tbl_dependencias_id_dependenciaAct" class="form-control">
                    <?php
                    foreach ($resDependencia as $result) {
                        ?>
                        <option value="<?php echo $result['id_dependencia']; ?>" <?php echo $tbl->getTbl_dependencias_id_dependencia()==$result['id_dependencia'] ? "Selected" : "" ?>><?php echo $result['nombre_dependencia']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="equipo_numero" class="control-label">Número Equipo</label>
                <input type="text" id="equipo_numeroAct" value="<?php echo $tbl->getEquipo_numero(); ?>" class="form-control vali_num" data-dec="0">
            </div>
            <div class="form-group">
                <label for="tbl_marcas_id_marca" class="control-label">Marca Pc</label>
                <select id="tbl_marcas_id_marcaAct" class="form-control">
                    <?php
                    foreach ($resMarca as $result) {
                        ?>
                        <option value="<?php echo $result['id_marca']; ?>" <?php echo $tbl->getTbl_marcas_id_marca()==$result['id_marca'] ? "Selected" : "" ?>><?php echo $result['nombre_marca']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tbl_tipo_pc_id_tipo_pc" class="control-label">Tipo Pc</label>
                <select id="tbl_tipo_pc_id_tipo_pcAct" class="form-control">
                    <?php
                    foreach ($resPc as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_pc']; ?>" <?php echo $tbl->getTbl_tipo_pc_id_tipo_pc()==$result['id_tipo_pc'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_pc']; ?></option>
                        <?php
                    }
                    ?>
                </select> 
            </div>
            <div class="form-group">
                <label for="fecha_compra" class="control-label">Fecha Compra</label>
                <input type="text" id="fecha_compraAct" value="<?php echo $tbl->getFecha_compra(); ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="valor" class="control-label">Valor</label>
                <input type="text" id="valorAct" value="<?php echo "$ ".number_format($tbl->getValor(),0,'','.'); ?>" class="form-control txt" data-dec="0">
            </div>
            <div class="form-group">
                <label for="fecha_expiracion_garantia" class="control-label">Fecha Expiración Garantia</label>
                <input type="text" id="fecha_expiracion_garantiaAct" value="<?php echo $tbl->getFecha_expiracion_garantia(); ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="fecha_registrado" class="control-label">Fecha Registrado</label>
                <input type="text" id="fecha_registradoAct" value="<?php echo $tbl->getFecha_registrado(); ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="tbl_tipo_pc_distribucion_id_tipo_pc_distribucion" class="control-label">Tipo Pc Distribución</label>
                <select id="tbl_tipo_pc_distribucion_id_tipo_pc_distribucionAct" class="form-control">
                    <?php
                    foreach ($resDistri as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_pc_distribucion']; ?>" <?php echo $tbl->getTbl_tipo_pc_distribucion_id_tipo_pc_distribucion()==$result['id_tipo_pc_distribucion'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_distribucion']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="manija" class="control-label">Manija</label>
                <select id="manijaAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getManija() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getManija() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="panel_frontal" class="control-label">Panel Frontal</label>
                  <select id="panel_frontalAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getPanel_frontal() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getPanel_frontal() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="iluminacion" class="control-label">Iluminación</label>
                <select id="iluminacionAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getIluminacion() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getIluminacion() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unidades_opticas" class="control-label">Unidades Ópticas</label>
                <input type="text" id="unidades_opticasAct" value="<?php echo $tbl->getUnidades_opticas(); ?>" class="form-control" maxlength="50" >
            </div>
            <div class="form-group">
                <label for="lector_multitarjetas" class="control-label">Lector Multitarjetas</label>
                <select id="lector_multitarjetasAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getLector_multitarjetas() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getLector_multitarjetas() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad_puertos_usb" class="control-label">Cantidad Puertos USB</label>
                <input type="text" id="cantidad_puertos_usbAct" value="<?php echo $tbl->getCantidad_puertos_usb(); ?>" class="form-control vali_num" data-dec="0">
            </div>
            <div class="form-group">
                <label for="puertos_video" class="control-label">Puertos Video</label>
                <input type="text" id="puertos_videoAct" value="<?php echo $tbl->getPuertos_video(); ?>" class="form-control" maxlength="30" >
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label for="ethernet" class="control-label">Ethernet</label>
                <select id="ethernetAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getEthernet() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getEthernet() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="plug_audio" class="control-label">Plug Audio</label>
                <select id="plug_audioAct"  class="form-control">
                    <option value="0" <?php echo $tbl->getPlug_audio() == 0 ? "Selected" : "" ?>>No</option>
                    <option value="1" <?php echo $tbl->getPlug_audio() == 1 ? "Selected" : "" ?>>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad_ps2" class="control-label">Cantidad Ps2</label>
                <input type="text" id="cantidad_ps2Act" value="<?php echo $tbl->getCantidad_ps2(); ?>" class="form-control vali_num" data-dec="0">
            </div>
            <div class="form-group">
                <label for="otros_puertos" class="control-label">Otros Puertos</label>
                <input type="text" id="otros_puertosAct" value="<?php echo $tbl->getOtros_puertos(); ?>" class="form-control" maxlength="50" >
            </div>
            <div class="form-group">
                <label for="tbl_tipo_board_id_tipo_board" class="control-label">Tipo Board</label>
                <select id="tbl_tipo_board_id_tipo_boardAct" class="form-control">
                    <?php
                    foreach ($resBoard as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_board']; ?>" <?php echo $tbl->getTbl_tipo_board_id_tipo_board()==$result['id_tipo_board'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_board']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tbl_tipo_fuente_id_tipo_fuente" class="control-label">Tipo Fuente</label>
                <select id="tbl_tipo_fuente_id_tipo_fuenteAct" class="form-control">
                    <?php
                    foreach ($resFuente as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_fuente']; ?>" <?php echo $tbl->getTbl_tipo_fuente_id_tipo_fuente()==$result['id_tipo_fuente'] ? "Selected" : "" ?>><?php echo $result['nombre_fuente_poder']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="marca_fuente" class="control-label">Marca Fuente</label>
                <input type="text" id="marca_fuenteAct" value="<?php echo $tbl->getMarca_fuente(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="modelo_fuente" class="control-label">Modelo Fuente</label>
                <input type="text" id="modelo_fuenteAct" value="<?php echo $tbl->getModelo_fuente(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="voltaje_fuente" class="control-label">Voltaje Fuente</label>
                <input type="text" id="voltaje_fuenteAct" value="<?php echo $tbl->getVoltaje_fuente(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="watt_fuente" class="control-label">Watt Fuente</label>
                <input type="text" id="watt_fuenteAct" value="<?php echo $tbl->getWatt_fuente(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="tamano_monitor" class="control-label">Tamaño Monitor</label>
                <input type="text" id="tamano_monitorAct" value="<?php echo $tbl->getTamano_monitor(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="marca_monitor" class="control-label">Marca Monitor</label>
                <input type="text" id="marca_monitorAct" value="<?php echo $tbl->getMarca_monitor(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="tbl_tipo_monitor_id_tipo_monitor" class="control-label">Tipo Monitor</label>
                <select id="tbl_tipo_monitor_id_tipo_monitorAct" class="form-control">
                    <?php
                    foreach ($resMoni as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_monitor']; ?>" <?php echo $tbl->getTbl_tipo_monitor_id_tipo_monitor()==$result['id_tipo_monitor'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_monitor']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="marca_dd" class="control-label">Marca Disco Duro</label>
                <input type="text" id="marca_ddAct" value="<?php echo $tbl->getMarca_dd(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="capacidad_dd" class="control-label">Capacidad Disco Duro</label>
                <input type="text" id="capacidad_ddAct" value="<?php echo $tbl->getCapacidad_dd(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="serial_dd" class="control-label">Serial Disco Duro</label>
                <input type="text" id="serial_ddAct" value="<?php echo $tbl->getSerial_dd(); ?>" class="form-control" maxlength="20" >
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label for="tbl_tipo_dd_id_tipo_dd" class="control-label">Tipo Disco Duro</label>
                <select id="tbl_tipo_dd_id_tipo_ddAct" class="form-control">
                    <?php
                    foreach ($resDd as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_dd']; ?>" <?php echo $tbl->getTbl_tipo_dd_id_tipo_dd()==$result['id_tipo_dd'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_dd']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="marca_board" class="control-label">Marca Board</label>
                <input type="text" id="marca_boardAct" value="<?php echo $tbl->getMarca_board(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="serie_board" class="control-label">Serie Board</label>
                <input type="text" id="serie_boardAct" value="<?php echo $tbl->getSerie_board(); ?>" class="form-control" maxlength="20" >
            </div>
            <div class="form-group">
                <label for="capacidad_ram" class="control-label">Capacidad Ram</label>
                <input type="text" id="capacidad_ramAct" value="<?php echo $tbl->getCapacidad_ram(); ?>" class="form-control vali_num" data-dec="0">
            </div>
            <div class="form-group">
                <label for="tbl_tipo_ram_id_tipo_ram" class="control-label">Tipo Ram</label>
                 <select id="tbl_tipo_ram_id_tipo_ramAct" class="form-control">
                    <?php
                    foreach ($resRam as $result) {
                        ?>
                        <option value="<?php echo $result['id_tipo_ram']; ?>" <?php echo $tbl->getTbl_tipo_ram_id_tipo_ram()==$result['id_tipo_ram'] ? "Selected" : "" ?>><?php echo $result['nombre_tipo_ram']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="velocidad_ram" class="control-label">Velocidad Ram</label>
                <input type="text" id="velocidad_ramAct" value="<?php echo $tbl->getVelocidad_ram(); ?>" class="form-control" maxlength="30" >
            </div>
            <div class="form-group">
                <label for="ramas_expansion" class="control-label">Ramas Expansión</label>
                <input type="text" id="ramas_expansionAct" value="<?php echo $tbl->getRamas_expansion(); ?>" class="form-control" maxlength="100" >
            </div>
            <div class="form-group">
                <label for="tarjetas_expansion" class="control-label">Tarjetas Expasión</label>
                <input type="text" id="tarjetas_expansionAct" value="<?php echo $tbl->getTarjetas_expansion(); ?>" class="form-control" maxlength="200" >
            </div>
            <div class="form-group">
                <label for="foto" class="control-label">Foto</label>
                <input type="text" id="fotoAct" value="<?php echo $tbl->getFoto(); ?>" class="form-control" maxlength="120" >
            </div>
            <div class="form-group">
                <label for="software" class="control-label">Software</label>
                <textarea id="softwareAct" placeholder="Software" cols="50" rows="5" class="form-control"><?php echo $tbl->getSoftware(); ?></textarea>
            </div>
            <div class="form-group">
                <label for="observaciones" class="control-label">Observaciones</label>
                <textarea id="observacionesAct" placeholder="Observaciones" cols="50" rows="5" class="form-control"><?php echo $tbl->getObservaciones(); ?></textarea>
            </div>
            <label class="control-label">Fotos </label>
            <div id="listar_fotos"></div>
            <div class="form-group" id="d_archivo1tmp">
                <label for="archivo1tmp" class="control-label">Subir Foto</label>
                <input type="file" id="archivo1tmp" name="archivo1tmp" />
            </div>
            <div class="form-group">
                <input type="hidden" id="tbl_clientes_id_clienteAct" value="<?php echo $tbl->getTbl_clientes_id_cliente(); ?>" class="form-control vali_num" data-dec="0" required>
            </div>
            <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_tbl_clientes_id_clienteActualizar">
        </div>
    </div>
</form>
