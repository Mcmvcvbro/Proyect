<?php
	require 'conexion.php';
  
	
    {
    $where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM paciente $where";
	$resultado = $mysqli->query($sql);
}
	
?>
<?php include ('vistas/encabezado.php');?>
<?php include "includes/scripts.php"; ?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		
	<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Dental Health Pacientes</h1>
<p class="mb-4">Listado de Pacientes Registrados <a target="_blank" href="https://datatables.net"></a>.</p>
<!-- DataTales Example -->
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                            <th>Codigo</th>
							<th>Identificacion</th>
							<th>Nombre</th>
							<th>Sexo</th>
							<th>Telefono</th>
							<th>Direccion</th>
							<th>Fecha de nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                                <td><?php echo $row['codigo']; ?></td>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['sexo']; ?></td>
								<td><?php echo $row['telefono']; ?></td>
								<td><?php echo $row['direccion']; ?></td>
								<td><?php echo $row['fecha_nacimiento']; ?></td>
                        <td><a class="btn btn-primary link_edit" href="modificar.php?id=<?php echo $row['id'];?>"><i class="fas fa-user-edit"></i></a>
					
						|
						<a class="btn btn-danger link_delete" href="eliminar.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
		
		
		
	</body>
</html>	
<?php include ('vistas/pie.php');?>