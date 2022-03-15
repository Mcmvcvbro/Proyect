<?php
	require 'conexion.php';
	
	$codigo = $_GET['id'];
	
	$sql = "SELECT * FROM paciente WHERE id = '$codigo'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
				<h3 style="text-align:center">MODIFICAR REGISTRO DE PACIENTE</h3>
			</div>
			<br/>
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">


			    <div class="form-group">
					<label for="id" class="col-sm-2 control-label">Identificacion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="id" name="id" placeholder="identificacion" value="<?php echo $row['id']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>" />
				
				<div class="form-group">
					<label for="sexo" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-10">
						<select class="form-control" id="sexo" name="sexo">
						    
							<option value="Masculino" <?php if($row['sexo']=='Masculino') echo 'selected'; ?>>Masculino</option>
							<option value="Femenino" <?php if($row['sexo']=='Femenino') echo 'selected'; ?>>Femenino</option>
							<option value="Otro" <?php if($row['sexo']=='Otro') echo 'selected'; ?>>Otro</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>"  required>
					</div>
				</div>

				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']; ?>"  required>
					</div>
				</div>
		
				<div class="form-group">
					<label for="fecha_nacimiento" class="col-sm-2 control-label">Fecha de nacimiento</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de  Nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="listarpacientes.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

<?php include ('vistas/pie.php');?>