<?php

include("op_sesiones.php");

$resultado = array();
$cli->setId_cliente($_POST['id_cliente']);
$cli->setNombre_completo($_POST['nombreCompleto']);
$cli->setCorreo($_POST['correo']);
$cli->setCelular($_POST['celular']);

$resultado['resultado'] = $cli->actualizarPerfil();

if($resultado['resultado']){
  $resultado['mensaje'] = "OK";
}else{
  $resultado['mensaje'] = $cli->imprimirError();
}
echo json_encode($resultado);
?>