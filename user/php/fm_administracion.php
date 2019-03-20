<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php include("s_cabecera.php"); ?>
	<style type="text/css">
		body {
		   background-image: url("../../image/fondo1.png");
		}
	</style>
</head>

<body>
	
	<div class="container text-center">
		<br /><br /><br />
	  <div class="row">
	    <div class="col-md-6">
	    	<div class="jumbotron">
	    		<br />
		    	<h1>Registro Hojas de Vida</h1>
			    <p class="jumbotron-lg-only">Equipos de Cómputo</p>
			    
			</div>
	  	</div>
	  	<div class="col-md-6">
		    <div class="jumbotron">
		      <div class="jumbotron-content">
		        <p class="jumbotron-lg-only">Validación de Usuario</p>
		        <form name="user-info" method="POST" action="op_validarUsuario.php">
		          <div class="form-group">
		            <label for="nombreUsuario">Nombre de usuario:</label>
		            <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre de Usuario" required>
		          </div>
		          <div class="form-group">
		            <label for="password">Clave:</label>
		            <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave" required>
		          </div>
		          <div class="form-group">
		            <input type="submit" class="form-control btn btn-primary" id="clave" name="validar" value="Validar">
		          </div>
		        </form>
		      </div>
		    </div>
	  	</div>
	  </div>
	</div>
	
</body>

</html>