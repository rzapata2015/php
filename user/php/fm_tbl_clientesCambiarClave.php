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
		<h2>Cambiar mi clave</h2>
		<div class="row">
			<div class="col-md-6">
				<div class="modal-body">
					<form id="f_clientes_cambiarClave" role="form">
						<div class="form-group">
							<label for="clave_actual" class="control-label">Clave Actual</label>
							<input type="password" class="form-control" id="clave_actual" maxlength="100" required>
						</div>
						<div class="form-group">
							<label for="clave" class="control-label">Clave</label>
							<input type="password" class="form-control" id="clave" maxlength="100" required>
						</div>
						<div id="c_clave" class="form-group">
							<label for="clave2" class="control-label">Repetir Clave</label>
							<input type="password" class="form-control" id="clave2" maxlength="100" required>
							<span id="m_clave2"></span> </div>
						<input type="submit" value="Cambiar" class="btn btn-warning" id="btn_f_clientes_cambiarClave">
						<input type="button" value="Cancelar" class="btn btn-success" onclick="location.href='fm_index.php'">
					</form>
					<div id="d_mensajeCambioClave"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	  include("s_footer.php");
	?>
</body>
</html>