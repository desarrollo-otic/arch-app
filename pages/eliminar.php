<?php
	session_start();
	include_once('../config/con-bd.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM registros WHERE id = '".$_GET['id']."'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Registro eliminado exitosamente.';
		}
		
		else{
			$_SESSION['error'] = 'Ocurrió un error al eliminar el registro.';
		}
	}
	else{
		$_SESSION['error'] = '¡Error! Por favor, seleccione el registro a eliminar.';
	}

	header('location: ../index.php');
?>