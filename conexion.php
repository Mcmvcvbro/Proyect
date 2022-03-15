<?php

	$mysqli = new mysqli("localhost","root","","dbproyect");
	if ($mysqli->connect_error)
	{
		echo "Erro de conexion a la Base de Datos ".$mysqli->connect_error;
		exit();
	}
	else
	{
		return $mysqli;
	}

?>
