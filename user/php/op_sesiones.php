<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: op_SesionCerrar.php");
	exit;
}
include('../../class/tbl_clientes.php');
$cli = new tbl_clientes();
$cli->setNombre_usuario($_SESSION['usuario']); 
$cli->consultarPorNombreUsuario();
?>