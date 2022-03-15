<?php
	require 'conexion.php'; 
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM citas $where";
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
		
	<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Dental Health Citas</h1>
<p class="mb-4">Listado de Citas en curso <a target="_blank" href="https://datatables.net"></a>.</p>
<!-- DataTales Example -->

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                            <th>Codigo</th>
							<th>Identificacion</th>
							<th>ID consultorio</th>
							<th>Consultorio</th>
							<th>Fecha</th>
							<th>Tipo de cita</th>
							<th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                                <td><?php echo $row['id_cita']; ?></td>
								<td><?php echo $row['cod_pac']; ?></td>
								<td><?php echo $row['cod_consul']; ?></td>
								<td><?php echo $row['consulto_cita']; ?></td>
								<td><?php echo $row['fecha_cita']; ?></td>
								<td><?php echo $row['tipo_cita']; ?></td>
								<td><?php echo $row['hora_cita']; ?></td>
                        <td><a href="modificarcita.php?id=<?php echo $row['id_cita']; ?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>Reprogramar
                            </a></td>
                            <td><a href="#" data-href="eliminarcita.php?id=<?php echo $row['id_cita']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9" />
                                    <line x1="18" y1="12.3" x2="11.7" y2="6" />
                                </svg>Eliminar</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
            </div>

            <div class="modal-body">
                ¿Desea eliminar este registro?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>	
<?php include ('vistas/pie.php');?>