<?php
include('../../class/tbl_tipo_board.php');

$tbl = new tbl_tipo_board($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_tipo_boardActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_tipo_boardAct">
    <div class="form-group">
        <label for="nombre_tipo_board" class="control-label">Nombre</label>
        <input type="text" id="nombre_tipo_boardAct" value="<?php echo $tbl->getNombre_tipo_board(); ?>" class="form-control" maxlength="28"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_tipo_boardActualizar">
</form>
