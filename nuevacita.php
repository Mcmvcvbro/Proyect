<?php
require "conexion.php";




$sql = "SELECT  id FROM paciente";
$resultado = $mysqli->query($sql);



$sql = "SELECT id_consultorio, nom_consultorio FROM consultorio";
$consultorio = $mysqli->query($sql);
$reference = $mysqli->query($sql);



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
				<h3 style="text-align:center">NUEVA CITA DE PACIENTE</h3>
			</div>
			<br/>
			<form class="form-horizontal" method="POST" action="guardarcita.php" autocomplete="off">


			    <div class="form-group">
					<label for="cod_pac" class="col-sm-2 control-label">Identificacion</label>
					<div class="col-sm-10">
          <select class="form-control" name="cod_pac" id="cod_pac" style="width:300px">
        <option value="0">Seleccione</option>
        <?php
		//Agrego a la lista paciente los pacientes existentes para poder seleccionar		
		while ($row=$resultado->fetch_array())
		{
			?>
             <option value="<?php echo $row['id'];?> ">
			 	<?php echo $row['id'];?>
             </option>
		<?php	
		}//cerrando el ciclo while		
		?>
      </select>
					</div>
				</div>

				<div class="form-group">
					<label for="cod_consul" class="col-sm-2 control-label">ID Consultorio</label>
					<div class="col-sm-10">
						<select class="form-control" id="cod_consul" name="cod_consul">
            <option value="0">Seleccione</option>
        <?php
		//Agrego a la lista codigo de los consultorios existentes para poder seleccionar		
		while ($row=$consultorio->fetch_array())
		{
			?>
             <option value="<?php echo $row['id_consultorio'];?> ">
			 	<?php echo $row['id_consultorio'];?>
             </option>
		<?php	
		}//cerrando el ciclo while		
		?>
      </select>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<label for="consulto_cita" class="col-sm-2 control-label">Consultorio</label>
					<div class="col-sm-10">
						<select class="form-control" id="consulto_cita" name="consulto_cita">
            <option value="0">Seleccione</option>
        <?php
		//Agrego a la lista Consultorio los Consultorios existentes para poder seleccionar
		while ($row=$reference->fetch_array())
		{
		?>
             <option value="<?php echo $row['nom_consultorio'];?> ">
			 	<?php echo $row['nom_consultorio']?>
             </option>
		<?php	
		}	//cerrando ciclo while	
		?>        
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