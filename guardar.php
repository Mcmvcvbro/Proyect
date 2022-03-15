<?php
	
	require 'conexion.php';
	

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$sexo = $_POST['sexo'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	
	
	
	
	$sql = "INSERT INTO paciente (id, nombre, sexo, telefono, direccion, fecha_nacimiento) VALUES ('$id','$nombre', '$sexo', '$telefono', '$direccion', '$fecha_nacimiento')";
	$resultado = $mysqli->query($sql);
	
?>
<?php include ('vistas/encabezado.php');?>

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
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
<?php include ('vistas/pie.php');?>