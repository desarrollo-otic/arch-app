<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Secretaría de Salud del Estado Zulia | Sistema de Ingreso de Datos para Archivo</title>
	
    <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">

	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="plugins/datatable/dataTable.bootstrap.min.css">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<div class="wrapper">
<div class="navbar navbar-fixed" style="background-color: #0066ff;">
  <h1 class="text-center" style="color: white;">Sistema de Ingreso de Datos</h1> 
  <br>
</div>
<br>
<div class="container">
	<div class="row panel panel-default col-sm-12">
		<div class="col-sm-12">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<br>
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<br>
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<br><br>
			<div class="container-fluid">
				<div class="">
				   <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>
				   <a href="pages/impr-pdf.php" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Generar PDF</a>
				</div>
			</div>
			<br>
			<div class="height10">
			</div>

			<div class="container-fluid table-responsive">
				<table id="myTable" class="table table-bordered table-striped text-center">
					<thead style="background-color: #ebebe0;">
						<th>Nombre y Apellido</th>
						<th>Cédula</th>
						<th>Terminal de Cédula</th>
						<th>Acciones</th>
					</thead>
					<tbody>

						<?php
							include_once('config/con-bd.php');
							$sql = "SELECT * FROM registros";

							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
								    <td>".$row['nom_ape']."</td>
                                    <td>".$row['cedula']."</td>
								    <td>".$row['term_ced']."</td>
									<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar</a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>
									</td>
								</tr>";
								include('pages/editar-modal.php');
							}
						?>

					</tbody>
				</table>
				<br><br>
			</div>
		</div>
	</div>
</div>
</div>

<div class="push"></div>

<div class="footer">

  <hr class="col-sm-offset-1 col-xs-offset-1 " style="border-color:black; width:85%;">
  <b><p class="text-center"> 2019 - Secretaría de Salud del Estado Zulia </p> 
  <p class="text-center">R.I.F.: G-200048492</p></b>

</div>

<?php include('pages/agr-modal.php') ?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatable/jquery.dataTables.min.js"></script>
<script src="plugins/datatable/dataTable.bootstrap.min.js"></script>

<!-- Generar DataTable en nuestra tabla -->
<script>

$(document).ready(function(){

	// Inicializar DataTable
    $('#myTable').DataTable({
        "order": [[ 2, "asc" ]]
    });

    // Ocultar Alerta
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
	})

 });
</script>

<script>

  var input = document.getElementById('cedula');

  input.oninvalid = function(event) {
      event.target.setCustomValidity('La cédula no debe contener más de 8 carácteres.');
 }

</script>
    
</body>
</html>