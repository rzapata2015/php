<?php
  include("op_sesiones.php");

$resultado = array();
$cli->setClave($_POST['clave_actual']);

if($cli->validarSesion()){
	$cli->cambiarClave($_POST['clave_nueva']);
 	$resultado['mensaje'] = "OK";
}else{
	$resultado['mensaje'] = "La clave Actual no es correcta";
}
echo json_encode($resultado);
?>