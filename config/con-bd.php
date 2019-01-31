<?php

    // Conexión con la Base de Datos
	$conn = new mysqli('localhost', 'root', '', 'archivo_bd');
	if($conn->connect_error){
	   die("Falló  la Conexión: " . $conn->connect_error);
	}

?>