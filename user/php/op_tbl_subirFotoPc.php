<?php
include('op_sesiones.php');
include('../../class/tbl_hoja_vida.php');

$resultado = array();

$archivo = $_FILES['archivo1tmp'];
$archivo1 = $_FILES['archivo1tmp'];

date_default_timezone_set("America/Bogota");
$fechaT=date("Y_m_d_H_i_s");

$nombreArchivo =  $archivo['name'];
$ruta = "fotos/" . $fechaT . $nombreArchivo;

move_uploaded_file($_FILES['archivo1tmp']['tmp_name'], $ruta);

$con = new tbl_hoja_vida($_POST['codigo']);
$con->consultar();

$con->actualizarFoto($ruta,$_POST['codigo']);

$resultado['estado'] = "OK";


echo json_encode($resultado);
?>
