<?php
function diaSemana($dia){
	$nombreDia = "";
	switch($dia){
		case '1': $nombreDia = "Lunes"; break;
		case '2': $nombreDia = "Martes"; break;
		case '3': $nombreDia = "Miercoles"; break;
		case '4': $nombreDia = "Jueves"; break;
		case '5': $nombreDia = "Viernes"; break;
		case '6': $nombreDia = "Sábado"; break;
		case '7': $nombreDia = "Domingo"; break;
		default: $nombreDia = "--"; break;
	}
	return $nombreDia;
}

function nombreMes($m){
	$nombreMes = "";
	switch($m){
		case '1': $nombreMes = "Enero"; break;
		case '2': $nombreMes = "Febrero"; break;
		case '3': $nombreMes = "Marzo"; break;
		case '4': $nombreMes = "Abril"; break;
		case '5': $nombreMes = "Mayo"; break;
		case '6': $nombreMes = "Junio"; break;
		case '7': $nombreMes = "Julio"; break;
		case '8': $nombreMes = "Agosto"; break;
		case '9': $nombreMes = "Septiembre"; break;
		case '10': $nombreMes = "Octubre"; break;
		case '11': $nombreMes = "Noviembre"; break;
		case '12': $nombreMes = "Diciembre"; break;
		default: $nombreMes = "--"; break;
	}
	return $nombreMes;
}

function normaliza($cadena){
    $originales = 'áéíóúÁÉÍÓÚñN';
    $modificadas = 'aeiouAEIOUnN';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

//devuelve una fecha, restando los dias o meses entregados
function fechaDias($fecha, $dias=0, $meses=0){
	$ano = substr($fecha, 0, 4);
	$mes = substr($fecha, 5, 2);
	$dia = substr($fecha, 8, 2);
	
	return date('Y-m-d', mktime(0, 0, 0, $mes-$meses, $dia-$dias, $ano));
}

//devuelve la fecha en un formato organizado
function fechaTexto($fecha){
	$ano = substr($fecha, 0, 4);
	$mes = substr($fecha, 5, 2);
	$dia = substr($fecha, 8, 2);
	
	return $dia." ".nombreMes($mes)." ".$ano;
}

function transformar_ampm_militar($hora){
	$nuevahora = strtotime($hora);
	$nuevahora = date("H:i:s", $nuevahora);
	return $nuevahora;
}

function transformar_militar_ampm($hora){
	$nuevahora = strtotime($hora);
	$nuevahora = date("g:i A", $nuevahora);
	return $nuevahora;
}
?>