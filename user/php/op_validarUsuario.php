<?php

session_start(); //inicia sesión
 
include('../../class/tbl_clientes.php'); //Se llama a la clase Usuario

$cli = new tbl_clientes(); //crea un nuevo objeto llamado usu

//asigna nombre de usuario y clave al objeto usu
$cli->setNombre_usuario($_POST['nombreUsuario']);  
$cli->setClave($_POST['clave']);

//echo $cli->getNombre_usuario()." - ";
//echo $cli->getClave();
//exit;
//echo  count($usu->validarSesion());

if (count($cli->validarSesion())>=10) {
	$_SESSION['usuario'] = $_POST['nombreUsuario'];
	//echo $_SESSION['nomUsu'];
	//exit;
	header("Location: fm_index.php");
} else {
	header("Location: ../");
}
/*
//si es correcto nombre de usuario y clave
if ($usu->validarSesion()){
	 //entonces se crean dos variables de sesión llamadas usuario y usuario_id
	$_SESSION['nomUsu'] = $_POST['nombreUsuario']; //se carga del usuario que digitaron
	$_SESSION['nomComUsu'] = $usu->getUsu_nombre_completo(); //se carga del usuario que digitaron

	header("Location: fm_index.php"); //es correcto y nos envía al archivo cine.php
}else{
	header("Location: ../"); //no está en la tabla y nos regresa al index
}*/
