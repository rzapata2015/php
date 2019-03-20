<?php
include('../../class/tbl_tipo_pc.php');

$resultado = array();

$tbl = new tbl_tipo_pc();
$tbl->setNombre_tipo_pc($_POST['nombre_tipo_pc']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
