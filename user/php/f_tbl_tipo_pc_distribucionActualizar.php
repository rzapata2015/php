<?php
include('../../class/tbl_tipo_pc_distribucion.php');

$tbl = new tbl_tipo_pc_distribucion($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_pc_distribucionActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_pc_distribucionAct">
    <div class="form-group">
        <label for="nombre_tipo_distribucion" class="control-label">Nombre</label>
        <input type="text" id="nombre_tipo_distribucionAct" value="<?php echo $tbl->getNombre_tipo_distribucion(); ?>" class="form-control" maxlength="45"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_distribucionActualizar">
</form>
