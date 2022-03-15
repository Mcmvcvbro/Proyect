<?php
	require 'conexion.php';
	
	$id_cita = $_GET['id'];
	
	$sql = "SELECT * FROM citas WHERE id_cita = $id_cita";
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
				<h3 style="text-align:center">MODIFICAR CITA DE PACIENTE</h3>
			</div>
			<br/>
			<form class="form-horizontal" method="POST" action="actualizar.php" autocomplete="off">

				
			<input type="hidden" id="id_cita" name="id_cita" value="<?php echo $row['id_cita']; ?>" />

				<div class="col-md-2 col-sm-2 col-xs-2">
			<label for="cod_pac" >Identificacion</label>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="text" class="form-control" id="cod_pac" name="cod_pac" placeholder="Identificacion" value="<?php echo $row['cod_pac']; ?>" disabled>
			
				</div>
				
				<div class="form-group">
			<label for="cod_consul" class="col-sm-2 control-label">ID Consultorio</label>
			<div class="col-sm-10">
				<select class="form-control" id="cod_consul" name="cod_consul">
				    <option value="0">Seleccione</option>

					<option value="1" <?php if ($row['cod_consul'] == '1'); ?>>1</option>
					
					<option value="2" <?php if ($row['cod_consul'] == '2') echo 'selected'; ?>>2</option>
				</select>
			</div>
		</div>
				
				
				
				<div class="form-group">
			<label for="consulto_cita" class="col-sm-2 control-label">Consultorio</label>
			<div class="col-sm-10">
				<select class="form-control" id="consulto_cita" name="consulto_cita">
					<option value="0">Seleccione</option>
					<option value="Miranda" <?php if ($row['consulto_cita'] == 'Miranda') echo 'selected'; ?>>Miranda</option>
					<option value="Popayan" <?php if ($row['consulto_cita'] == 'Popayan') echo 'selected'; ?>>Popayan</option>
				</select>
			</div>
		</div>

				<div class="form-group">
					<label for="fecha_cita" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha_cita" name="fecha_cita" placeholder="Fecha" required>
					</div>
				</div>

				<div class="form-group">
					<label for="tipo_cita" class="col-sm-2 control-label">Tipo de Cita</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tipo_cita" name="tipo_cita" placeholder="Tipo de Cita"  required>
					</div>
				</div>
		
				<div class="form-group">
					<label for="hora_cita" class="col-sm-2 control-label">Hora</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="hora_cita" name="hora_cita" placeholder="Hora" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="listarcitas.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

<?php include ('vistas/pie.php');?>