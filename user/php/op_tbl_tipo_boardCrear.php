<?php
include('../../class/tbl_tipo_board.php');

$resultado = array();

$tbl = new tbl_tipo_board();
$tbl->setNombre_tipo_board($_POST['nombre_tipo_board']);

$resultado['resultado'] = $tbl->insertar();
if($resultado['resultado']){
    $resultado['mensaje'] = "OK";
}else{
    $resultado['mensaje'] = $tbl->imprimirError();
}
echo json_encode($resultado);
?>
