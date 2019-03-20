<?php
include('../../class/tbl_clientes.php');

$resultado = array();

$tbl = new tbl_clientes($_POST['id_cliente']);
$tbl->consultar();

$tbl->setNombre_completo($_POST['nombre_completo']);
$tbl->setCelular($_POST['celular']);
$tbl->setCorreo($_POST['correo']);
$tbl->setNombre_usuario($_POST['nombre_usuario']);
$tbl->setClave($_POST['clave']);
$tbl->setTbl_perfil_id_perfil($_POST['tbl_perfil_id_perfil']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
