<?php

session_start();

include '../conexion/conexion.php';

  $q1 = ("UPDATE usuario SET nombre=:nombre, apellido=:apellido, direccion=:direccion,correo=:correo where idCliente=:idCliente");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':nombre', $_POST['txtNombre'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':apellido', $_POST['txtApellido'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':direccion', $_POST['txtDireccion'] , PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':correo', $_POST['txtCorreo'] , PDO::PARAM_STR);
			$actualizarRegsitro->bindParam(':idCliente', $_POST['txtIdCliente'] , PDO::PARAM_INT);
			$actualizarRegsitro->execute();






 ?>