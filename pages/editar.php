<?php
	session_start();
	include_once('../config/con-bd.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nom_ape = $_POST['nom_ape'];
		$cedula = $_POST['cedula'];
		$term_ced = substr($cedula,-2);
		$sql = "UPDATE registros SET nom_ape = '$nom_ape', cedula = '$cedula', term_ced = '$term_ced' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Registro actualizado exitosamente.';
		}

		
		else{
			$_SESSION['error'] = 'Ocurrió un error al modificar el registro.';
		}
	}
	else{
		$_SESSION['error'] = '¡Error! Por favor, seleccione el registro a modificar.';
	}

	header('location: ../index.php');

?>