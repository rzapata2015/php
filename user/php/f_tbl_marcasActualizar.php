<?php
include('../../class/tbl_marcas.php');

$tbl = new tbl_marcas($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_marcasActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_marcaAct">
    <div class="form-group">
        <label for="nombre_marca" class="control-label">Nombre</label>
        <input type="text" id="nombre_marcaAct" value="<?php echo $tbl->getNombre_marca(); ?>" class="form-control" maxlength="30"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_marcaActualizar">
</form>
