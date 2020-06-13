<?php 
session_start();

include '../conexion/conexion.php';



date_default_timezone_set('America/Guatemala');
$fecha_actual=date("d/m/Y");
$hora_actual=date('H:i:s',time());
$fechaCompleta= $fecha_actual.' '.$hora_actual;


$evento=@$_POST['txtEvento'];
switch ($evento) {
	case 1:
		# insertar observacion

if(!empty($_POST['txtObservacion'])){

$q1 = ("INSERT INTO observaciones (idUsuario, idEvento, observacion, fechaHora,tipoEvento) VALUES(:idUsuario, :idEvento, :observacion, :fechaHora,:tipoEvento)");
			$insertarComentario = $dbConn->prepare($q1);
			$insertarComentario->bindParam(':idUsuario', $_POST['txtIdUsuario'], PDO::PARAM_STR); 
			$insertarComentario->bindParam(':idEvento', $_POST['txtIdEvento'], PDO::PARAM_STR);
		    $insertarComentario->bindParam(':observacion', $_POST['txtObservacion'], PDO::PARAM_STR); 
		    $insertarComentario->bindParam(':fechaHora',$fechaCompleta, PDO::PARAM_STR); 
        $insertarComentario->bindParam(':tipoEvento',$_POST['txtTipoEvento'], PDO::PARAM_INT); 

			$insertarComentario->execute();
}


		break;

  case 2:
  	# Script para confirmar una cita

  $_POST['idModificar'];
  $_POST['estadoCita'];


  if(  $_POST['estadoCita']=='true'){
  	$estado=1;
  	  $fechaConfirmar=$fechaCompleta;
  }else{
  	 $estado=0;

  	 $fechaConfirmar='sin confirmar';


  }
  $q1 = ("UPDATE calendar SET confirmar=:confirmar, fechaConfirmar=:fechaConfirmar where idRegistro=:idRegistro");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':confirmar', $estado, PDO::PARAM_INT); 
			$actualizarRegsitro->bindParam(':fechaConfirmar', $fechaConfirmar, PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':idRegistro', $_POST['idModificarCita'] , PDO::PARAM_INT); 
			$actualizarRegsitro->execute();


  	break;

   case 3:
  	# Script para poner en proceso un pedido

  $_POST['idModificarEvento'];
  $_POST['estadoEvento'];


  if(  $_POST['estadoEvento']=='true'){
  	$estado=1;
  	  $fechaConfirmar=$fechaCompleta;
  }else{
  	 $estado=0;

  	 $fechaConfirmar='sin completar';


  }
  $q1 = ("UPDATE pedido SET estadoEnproceso=:enProceso, fechaProceso=:fechaProceso where idRegistro=:idRegistro");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':enProceso', $estado, PDO::PARAM_INT); 
			$actualizarRegsitro->bindParam(':fechaProceso', $fechaConfirmar, PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':idRegistro', $_POST['idModificarEvento'] , PDO::PARAM_INT); 
			$actualizarRegsitro->execute();


  	break;


   case 4:
  	# Script para completar pedido

  $_POST['idModificarEvento'];
  $_POST['estadoEvento'];


  if(  $_POST['estadoEvento']=='true'){
  	$estado=1;
  	  $fechaConfirmar=$fechaCompleta;
  }else{
  	 $estado=0;

  	 $fechaConfirmar='sin completar';


  }
  $q1 = ("UPDATE pedido SET estadoCompleto=:estadoCompleto, fechaCompleto=:fechaCompleto where idRegistro=:idRegistro");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':estadoCompleto', $estado, PDO::PARAM_INT); 
			$actualizarRegsitro->bindParam(':fechaCompleto', $fechaConfirmar, PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':idRegistro', $_POST['idModificarEvento'] , PDO::PARAM_INT); 
			$actualizarRegsitro->execute();


  	break;


   case 5:
    # Script para completar logistica

  $_POST['idModificarEvento'];
  $_POST['estadoEvento'];


  if(  $_POST['estadoEvento']=='true'){
    $estado=1;
      $fechaConfirmar=$fechaCompleta;
  }else{
     $estado=0;

     $fechaConfirmar='sin completar';


  }
  $q1 = ("UPDATE logistica SET estadoProceso=:estadoProceso, fechaProceso=:fechaProceso where idRegistro=:idRegistro");
      $actualizarRegsitro = $dbConn->prepare($q1);
      $actualizarRegsitro->bindParam(':estadoProceso', $estado, PDO::PARAM_INT); 
      $actualizarRegsitro->bindParam(':fechaProceso', $fechaConfirmar, PDO::PARAM_STR); 
      $actualizarRegsitro->bindParam(':idRegistro', $_POST['idModificarEvento'] , PDO::PARAM_INT); 
      $actualizarRegsitro->execute();


    break;

   case 6:
    # Script para completar Logistica

  $_POST['idModificarEvento'];
  $_POST['estadoEvento'];


  if($_POST['estadoEvento']=='true'){
    $estado=1;
    $fechaConfirmar=$fechaCompleta;
  }else{
     $estado=0;

     $fechaConfirmar='sin completar';


  }
  $q1 = ("UPDATE logistica SET estadoCompletado=:estadoCompletado, fechaCompletado=:fechaCompletado where idRegistro=:idRegistro");
      $actualizarRegsitro = $dbConn->prepare($q1);
      $actualizarRegsitro->bindParam(':estadoCompletado', $estado, PDO::PARAM_INT); 
      $actualizarRegsitro->bindParam(':fechaCompletado', $fechaConfirmar, PDO::PARAM_STR); 
      $actualizarRegsitro->bindParam(':idRegistro', $_POST['idModificarEvento'] , PDO::PARAM_INT); 
      $actualizarRegsitro->execute();


    break;
	
	default:
		# code...
		break;
}



?>