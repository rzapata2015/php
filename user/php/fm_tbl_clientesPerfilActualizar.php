<?php
  include("op_sesiones.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<?php include("s_cabecera.php"); ?>
	<script src="../js/tbl_clientes.js"></script>
</head>
<body>
	<?php include("s_menu.php"); ?>
	<div id="d_contenedor" class="container">
		<?php if(isset($_GET['men']) && $_GET['men'] == '1'){ ?>
		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Cliente creado correctamente</div>
		<?php } ?>
		<?php if(isset($_GET['men']) && $_GET['men'] == '2'){ ?>
		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Operación Exitosa:</strong> Cliente actualizado correctamente</div>
		<?php } ?>
		<h2>Actualizar Mis Datos</h2>

		<div class="row">
			<div class="col-md-10">
				<div class="modal-body">
					<form id="f_clientesPerfilActualizar" role="form">
						<input type="hidden" value="<?php echo $cli->getId_cliente(); ?>" id="codigo">
						<div class="form-group">
							<label for="nombreCompletoPerAct" class="control-label">Nombre Completo</label>
							<input type="text" class="form-control" value="<?php echo $cli->getNombre_completo(); ?>" id="nombreCompletoPerAct" maxlength="40" required>
						</div>
						<div class="form-group">
							<label for="correoPerAct" class="control-label">Correo</label>
							<input type="text" class="form-control" value="<?php echo $cli->getCorreo(); ?>" id="correoPerAct" maxlength="40" required>
						</div>
						<div class="form-group">
							<label for="celularPerAct" class="control-label">Celular</label>
							<input type="text" class="form-control" value="<?php echo $cli->getCelular(); ?>" id="celularPerAct" maxlength="40" required>
						</div>
						<input type="submit" value="Actualizar" class="btn btn-warning" id="btn_f_clientesPerfilActualizar">
						<input type="button" value="Salir" class="btn btn-danger" onclick="location.href='fm_index.php'">
						<div id="actualizado"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include("s_footer.php"); ?>
</body>
</html>