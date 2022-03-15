<?php
	
	require '/conexion.php';

	$id_cita = $_POST['id_cita'];
	$cod_consul = $_POST['cod_consul'];
	$consulto_cita = $_POST['consulto_cita'];
	$fecha_cita = $_POST['fecha_cita'];
	$tipo_cita = $_POST['tipo_cita'];
	$hora_cita = $_POST['hora_cita'];
	

	
	$sql = "UPDATE citas SET cod_consul=$cod_consul, consulto_cita='$consulto_cita', fecha_cita='$fecha_cita', tipo_cita='$tipo_cita', hora_cita='$hora_cita' WHERE id_cita ='$id_cita'";
	$resultado = $mysqli->query($sql);
	echo ($sql);

	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>