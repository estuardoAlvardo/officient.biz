<?php

session_start();

include '../conexion/conexion.php';

date_default_timezone_set('America/Guatemala');
$fecha_actual=date("d/m/Y");
$hora_actual=date('H:i:s',time());
$fechaCompleta= $fecha_actual.' '.$hora_actual;

switch ($_POST['accionEjecutar']) {
	case 1:

      $estadoUsuario=1;
      $cliente=5;
		# Insertar Usuarios
	$q3 = ("INSERT INTO usuario(nombre, apellido,direccion,telefono,correo,cargo,estadoUsuario,fechaRegistro,idPrivilegios,idempresa,usuario,contrasena) VALUES(:nombre, :apellido,:direccion,:telefono,:correo,:cargo,:estadoUsuario,:fechaRegistro,:idPrivilegios,:idempresa,:usuario,:contrasena)");
      $insertarUsuario = $dbConn->prepare($q3);
      $insertarUsuario->bindParam(':nombre', $_POST['txtNombre'], PDO::PARAM_STR);
      $insertarUsuario->bindParam(':apellido', $_POST['txtApellido'], PDO::PARAM_STR);
      $insertarUsuario->bindParam(':direccion', $_POST['txtDireccion'], PDO::PARAM_STR);
      $insertarUsuario->bindParam(':telefono', $_POST['txtTelefono'], PDO::PARAM_STR); 
      $insertarUsuario->bindParam(':correo', $_POST['txtCorreo'], PDO::PARAM_STR);
      $insertarUsuario->bindParam(':cargo', $_POST['txtCargo'], PDO::PARAM_STR);
      $insertarUsuario->bindParam(':estadoUsuario', $estadoUsuario , PDO::PARAM_INT); 
      $insertarUsuario->bindParam(':fechaRegistro', $fechaCompleta, PDO::PARAM_STR); 
      $insertarUsuario->bindParam(':idPrivilegios',$cliente , PDO::PARAM_INT); 
      $insertarUsuario->bindParam(':idempresa', $_POST['txtIdEmpresa'], PDO::PARAM_INT); 
      $insertarUsuario->bindParam(':usuario', $_POST['txtUsuario'], PDO::PARAM_STR); 
      $insertarUsuario->bindParam(':contrasena', $_POST['txtContrasena'], PDO::PARAM_INT); 
      $insertarUsuario->execute();



		break;
      case 2:

      if($_POST['estado']=='true'){
         $actualizar=1;   
      }else{
         $actualizar=0;
      }

      $q3 = ("UPDATE usuario SET estadoUsuario=:estadoUsuario where idCliente=:idCliente");
       $insertarUsuario = $dbConn->prepare($q3);
       $insertarUsuario->bindParam(':estadoUsuario', $actualizar, PDO::PARAM_INT);
       $insertarUsuario->bindParam(':idCliente', $_POST['idUsuario'], PDO::PARAM_INT);
        $insertarUsuario->execute();

      break;
	
	default:
		# code...
		break;
}

 



?>