<?php
include('../../class/tbl_tipo_fuente.php');

$tbl = new tbl_tipo_fuente($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_fuenteActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_fuenteAct">
    <div class="form-group">
        <label for="nombre_fuente_poder" class="control-label">Nombre fuente de poder</label>
        <input type="text" id="nombre_fuente_poderAct" value="<?php echo $tbl->getNombre_fuente_poder(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_fuente_poderActualizar">
</form>
