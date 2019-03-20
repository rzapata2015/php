<?php
include('../../class/tbl_dependencias.php');

$tbl = new tbl_dependencias($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_dependenciasActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_dependenciaAct">
    <div class="form-group">
        <label for="nombre_dependencia" class="control-label">Nombre</label>
        <input type="text" id="nombre_dependenciaAct" value="<?php echo $tbl->getNombre_dependencia(); ?>" class="form-control" maxlength="30"  required>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_nombre_dependenciaActualizar">
</form>
