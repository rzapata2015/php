<?php
include('../../class/tbl_tipo_dd.php');

$tbl = new tbl_tipo_dd($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_ddActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_ddAct">
    <div class="form-group">
        <label for="nombre_tipo_dd" class="control-label">Nombre</label>
        <input type="text" id="nombre_tipo_ddAct" value="<?php echo $tbl->getNombre_tipo_dd(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_ddActualizar">
</form>
