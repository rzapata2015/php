<?php
	
	include('op_sesiones.php');
	include('../../class/tbl_perfil.php');

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php include("s_cabecera.php"); ?>
</head>

<body>
	<?php include("s_menu.php"); ?>
	<div id="d_contenedor" class="container">
		<br /><br /><br />

	    <div class="jumbotron text-center">
		  <h1>Hoja Vida Pc</h1>
		  <p>Sitio para el registro de las características en Hardware y Software de Equipos de Cómputo.</p>
		  <hr>
		  <?php
		  	echo "Usuario: ".$cli->getNombre_completo();
		  ?>
		  <br>
		  <strong>
			  <?php
			  	$perfil = new tbl_perfil($cli->getTbl_perfil_id_perfil());
			  	$perfil->consultar();
			  	echo $perfil->getNombre_perfil();
			  ?>
		  </strong>
		</div>
		<button type="button" class="btn btn-primary btn-block" onclick="location.href='fm_tbl_hoja_vida.php';">Hojas de Vida</button>
		<button type="button" class="btn btn-primary btn-block" onclick="location.href='op_SesionCerrar.php';">Cerrar Sesión</button>
	</div>
	<?php
	  include("s_footer.php");
	?>
</body>

</html>