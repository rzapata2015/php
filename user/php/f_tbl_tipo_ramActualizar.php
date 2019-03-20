<?php
include('../../class/tbl_tipo_ram.php');

$tbl = new tbl_tipo_ram($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_ramActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_ramAct">
    <div class="form-group">
        <label for="nombre_tipo_ram" class="control-label">Nombre tipo de ram</label>
        <input type="text" id="nombre_tipo_ramAct" value="<?php echo $tbl->getNombre_tipo_ram(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_ramActualizar">
</form>
