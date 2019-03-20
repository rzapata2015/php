<?php
include('../../class/tbl_tipo_monitor.php');

$tbl = new tbl_tipo_monitor($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_monitorActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_monitorAct">
    <div class="form-group">
        <label for="nombre_tipo_monitor" class="control-label">Nombre</label>
        <input type="text" id="nombre_tipo_monitorAct" value="<?php echo $tbl->getNombre_tipo_monitor(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_monitorActualizar">
</form>
