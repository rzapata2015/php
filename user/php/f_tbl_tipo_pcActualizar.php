<?php
include('../../class/tbl_tipo_pc.php');

$tbl = new tbl_tipo_pc($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_pcActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_pcAct">
    <div class="form-group">
        <label for="nombre_tipo_pc" class="control-label">Nombre</label>
        <input type="text" id="nombre_tipo_pcAct" value="<?php echo $tbl->getNombre_tipo_pc(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_pcActualizar">
</form>
