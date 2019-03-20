<?php
include('../../class/tbl_clientes.php');
include('../../class/tbl_perfil.php');

$perfil = new tbl_perfil();
$resPerfil = $perfil->listar();


$tbl = new tbl_clientes($_POST['codigo']);
$tbl->consultar();
?>
<form id="f_tbl_clientesActualizar" role="form">
    <input type="hidden" value="<?php echo $_POST['codigo']; ?>" id="id_clienteAct">
    <div class="form-group">
        <label for="nombre_completo" class="control-label">Nombre Completo</label>
        <input type="text" id="nombre_completoAct" value="<?php echo $tbl->getNombre_completo(); ?>" class="form-control" maxlength="50"  required>
    </div>
    <div class="form-group">
        <label for="celular" class="control-label">Celular</label>
        <input type="text" id="celularAct" value="<?php echo $tbl->getCelular(); ?>" class="form-control" maxlength="30"  required>
    </div>
    <div class="form-group">
        <label for="correo" class="control-label">Correo</label>
        <input type="text" id="correoAct" value="<?php echo $tbl->getCorreo(); ?>" class="form-control" maxlength="120"  required>
    </div>
    <div class="form-group">
        <label for="nombre_usuario" class="control-label">Nombre Usuario</label>
        <input type="text" id="nombre_usuarioAct" value="<?php echo $tbl->getNombre_usuario(); ?>" class="form-control" maxlength="20"  required>
    </div>
    <div class="form-group">
        <label for="clave" class="control-label">Clave</label>
        <input type="text" id="claveAct" value="<?php echo $tbl->getClave(); ?>" class="form-control" maxlength="150"  required>
    </div>
    <div class="form-group">
        <label for="tbl_perfil_id_perfil" class="control-label">Perfil</label>
        <select id="tbl_perfil_id_perfilAct" class="form-control">
            <?php
            foreach ($resPerfil as $result) {
                ?>
                <option value="<?php echo $result['id_perfil'] ?>" <?php echo $tbl->getTbl_perfil_id_perfil()==$result['id_perfil'] ? "Selected" : "" ?>><?php echo $result['nombre_perfil'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <input type="submit" value="Actualizar" class="btn btn-warning" id="btn_tbl_perfil_id_perfilActualizar">
</form>
