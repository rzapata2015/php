<?php
include('../../class/tbl_perfil.php');

$tbl = new tbl_perfil($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_perfilActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_perfilAct">
    <div class="form-group">
        <label for="nombre_perfil" class="control-label">Nombre</label>
        <input type="text" id="nombre_perfilAct" value="<?php echo $tbl->getNombre_perfil(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_perfilActualizar">
</form>
