<?php
	session_start();
	include_once('../config/con-bd.php');

	if(isset($_POST['add'])){
		$nom_ape = $_POST['nom_ape'];
		$cedula = $_POST['cedula'];
		$term_ced = substr($cedula,-2);
		$sql = "INSERT INTO registros (nom_ape, cedula, term_ced) VALUES ('$nom_ape', '$cedula', '$term_ced')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Registro almacenado exitosamente.';
		}
		
		else{
			$_SESSION['error'] = 'Ocurrió un error al agregar el registro.';
		}
	}
	else{
		$_SESSION['error'] = '¡Error! Por favor, complete el formulario de registro.';
	}

	header('location: ../index.php');
?>