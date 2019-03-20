<?php
include('../../class/tbl_perfil.php');

$resultado = array();

$tbl = new tbl_perfil($_POST['id_perfil']);
$tbl->consultar();

$tbl->setNombre_perfil($_POST['nombre_perfil']);

$resultado['resultado'] = $tbl->actualizar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
