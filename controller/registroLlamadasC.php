<?php 
session_start();

include '../conexion/conexion.php';

//funciones para enviar correos desde php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMail/src/Exception.php';
require '../phpMail/src/PHPMailer.php';
require '../phpMail/src/SMTP.php';



date_default_timezone_set('America/Guatemala');
$fecha_actual=date("d/m/Y");
$hora_actual=date('H:i:s',time());


$fechaCompleto=$fecha_actual.' '.$hora_actual;







@$evento=$_POST['accionEjecutar'];

switch ($evento) {
	case 1:
	# llevar registro de llamadas

	$tipoLlamada=0;

	if($_POST['txtDesvio']=='on'){
		$trasladoLlamada=1;
		$tipoLlamada=1; //desvio de llamada
	}else{
		$trasladoLlamada=2;
	}
	if($_POST['txtConsulta']=='on'){
		$consultarDatos=1;
		$tipoLlamada=2; //llamada de consulta de informacion

	}else{
		$consultarDatos=2;

	}

	
		

	
	$q1 = ("INSERT INTO registroLlamadas (idEmpresa, personaLlama, telefono, correoElectronico, descripcionLlamada, trasladoLlamada,consultarDatos,idUsuario,fechaRegistro,horaRegistro,tipoLlamada) VALUES(:idEmpresa, :personaLlama, :telefono, :correoElectronico, :descripcionLlamada, :trasladoLlamada,:consultarDatos,:idUsuario,:fechaRegistro,:horaRegistro,:tipoLlamada)");
			$insertarRegistro = $dbConn->prepare($q1);
			$insertarRegistro->bindParam(':idEmpresa', $_POST['idEmpresa'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':personaLlama', $_POST['txtPersona'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':telefono', $_POST['txtTelefono'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':correoElectronico', $_POST['txtMail'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':descripcionLlamada', $_POST['txtDescripcion'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':trasladoLlamada', $trasladoLlamada, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':consultarDatos', $consultarDatos, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_INT);
			$insertarRegistro->bindParam(':fechaRegistro', $fecha_actual, PDO::PARAM_STR);
			$insertarRegistro->bindParam(':horaRegistro', $hora_actual, PDO::PARAM_STR);
			$insertarRegistro->bindParam(':tipoLlamada', $tipoLlamada, PDO::PARAM_STR);
			$insertarRegistro->execute();	



		break;

	case 2:

		$q2 = ('SELECT * FROM pedido');
		$buscamosUltimoRegistro = $dbConn->prepare($q2);
		$buscamosUltimoRegistro->execute();

		while ($row2=$buscamosUltimoRegistro->fetch(PDO::FETCH_ASSOC)){
			$ultimoRegistro=$row2['idRegistro'];
		}

		$registroInsertar=$ultimoRegistro+1;

		# registrar evento pedido
	$estadoIniciado=1;
	$estadoProceso=0;
	$estadoCompleto=0;
	$sinFecha='sin completar';
	$q1 = ("INSERT INTO pedido (idEmpresa, idUsuario, direccionEntrega,contactoEntrega, nombreFactura, nit, pedido,detalle,fechaRegistro,estadoIniciado,estadoEnProceso,fechaProceso,estadoCompleto,fechaCompleto) VALUES(:idEmpresa, :idUsuario, :direccionEntrega,:contactoEntrega, :nombreFactura, :nit, :pedido,:detalle,:fechaRegistro,:estadoIniciado,:estadoEnProceso,:fechaProceso,:estadoCompleto,:fechaCompleto)");
			$insertarRegistro = $dbConn->prepare($q1);
			$insertarRegistro->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':idUsuario', $_POST['txtIdUsuario'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':direccionEntrega', $_POST['txtDireccionEntrega'], PDO::PARAM_STR);
            $insertarRegistro->bindParam(':contactoEntrega', $_POST['txtContactoEntrega'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':nombreFactura', $_POST['txtNombreFactura'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':nit', $_POST['txtNit'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':pedido', $_POST['txtNit'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':detalle', $_POST['txtDetalle'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':fechaRegistro', $fechaCompleto, PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':estadoIniciado', $estadoIniciado, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':estadoEnProceso', $estadoProceso, PDO::PARAM_INT);
			$insertarRegistro->bindParam(':fechaProceso', $sinFecha, PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':estadoCompleto',$estadoCompleto, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':fechaCompleto', $sinFecha, PDO::PARAM_STR); 
			$insertarRegistro->execute();	



		$q66 = ('SELECT * FROM usuario where idEmpresa=:idEmpresa');
		$buscarUsuario1 = $dbConn->prepare($q66);
		$buscarUsuario1->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
		$buscarUsuario1->execute();


while ($usuarios=$buscarUsuario1->fetch(PDO::FETCH_ASSOC)){

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'notificaciones@officient.biz';                     // SMTP username
    $mail->Password   = 'Noti2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('notificaciones@officient.biz', 'Asistente Virtual Officient');
    $mail->addAddress($usuarios['correo'], ' Cliente');     // Add a recipient
    														            // Name is optional

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Pedido #'.$registroInsertar.' creado desde Officient.biz ';
    $mail->Body    = '<div style="margin-left: 10%; width: 500px; height: 500px; border-radius: 15px; background-color:#eceff1;">
    <div style="">
        
        <div style="height: 100px;width: 100px; ">
        
        <img src="https://atomolector.com/img/logoOfficient2.png" >
        </div>

    </div>
    <div style="background-color: #000051; margin-top:-20px; height: 400px;">
        <h2 style="color: white; text-align:center; padding-top:40px;">Se ha generado su pedido!</h2>
        <h1 style="color:white; text-align: center;">Orden: #'.$registroInsertar.'</h1>
        <h2 style="color: white; padding: 5px; text-align: center;">Para darle seguimiento a tu pedido ingresa a: <a href="https://officient.biz/asistenteVirtual" style="color:orange; text-decoration: none;">https://officient.biz/asistenteVirtual</a></h2>
     <div style="color: white; margin-top: 140px; text-align: center; font: 100% sans-serif;">
         <p><img src="https://image.flaticon.com/icons/png/512/523/523081.png" style="width:15px; height: 15px;"> 2381-0888 <img src="https://image.flaticon.com/icons/svg/2972/2972097.svg" style="width:15px; height: 15px;"> <span>www.officient.biz</span></p>
     </div>   
    </div>
        
</div>';
    $mail->AltBody = 'Officient a su servicio. Por favor no responda el correo';

    $mail->send();
    echo 'Correo enviado correctamente :)';
} catch (Exception $e) {
    echo "No se pudo enviar el correo Error: {$mail->ErrorInfo}";
}


}

		break;
	
  case 3:


  		$q2 = ('SELECT * FROM calendar');
		$buscamosUltimoRegistro = $dbConn->prepare($q2);
		$buscamosUltimoRegistro->execute();

		while ($row2=$buscamosUltimoRegistro->fetch(PDO::FETCH_ASSOC)){
			$ultimoRegistro=$row2['idRegistro'];
		}

		$registroInsertar=$ultimoRegistro+1;
  		# registrar evento cita 
  		$confirmar=0;
  		$fechaConfirmar="sin fecha";
  		$q1 = ("INSERT INTO calendar (idEmpresa, idUsuario, tituloEvento,descripcionEvento, fechaInicio, fechaFin,confirmar,fechaConfirmar) VALUES(:idEmpresa, :idUsuario, :tituloEvento,:descripcionEvento, :fechaInicio, :fechaFin,:confirmar,:fechaConfirmar)");
			$insertarRegistro = $dbConn->prepare($q1);
			$insertarRegistro->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':idUsuario', $_POST['txtIdUsuario'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':tituloEvento', $_POST['txtTituloEvento'], PDO::PARAM_STR);
            $insertarRegistro->bindParam(':descripcionEvento', $_POST['txtDescripcionEvento'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':fechaInicio', $_POST['txtIncioEvento'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':fechaFin', $_POST['txtFinalEvento'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':confirmar', $confirmar, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':fechaConfirmar', $fechaConfirmar, PDO::PARAM_STR); 
			$insertarRegistro->execute();	




		$q66 = ('SELECT * FROM usuario where idEmpresa=:idEmpresa');
		$buscarUsuario1 = $dbConn->prepare($q66);
		$buscarUsuario1->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
		$buscarUsuario1->execute();


while ($usuarios=$buscarUsuario1->fetch(PDO::FETCH_ASSOC)){

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'notificaciones@officient.biz';                     // SMTP username
    $mail->Password   = 'Noti2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('notificaciones@officient.biz', 'Asistente Virtual Officient');
    $mail->addAddress($usuarios['correo'], ' Cliente');     // Add a recipient
    														            // Name is optional

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Cita Agendada #'.$registroInsertar.' creado desde Officient.biz ';
    $mail->Body    = '<div style=" margin-left: 10%; width: 500px; height: 500px; border-radius: 15px; background-color:#eceff1;">
    <div style="">
        
        <div style="height: 100px;width: 100px; ">
        
        <img src="https://atomolector.com/img/logoOfficient2.png" >
        </div>

    </div>
    <div style="background-color: #000051; margin-top:-20px; height: 400px;">
        <h2 style="color: white; text-align:center; padding-top:40px;">Se ha guardado su cita!</h2>
        <h1 style="color:white; text-align: center;">Cita:#'.$registroInsertar.'</h1>
        <h2 style="color: white; padding: 5px; text-align: center;">Para darle seguimiento a tu cita ingresa a: <a href="https://officient.biz/asistenteVirtual" style="color:orange; text-decoration: none;">https://officient.biz/asistenteVirtual</a></h2>
     <div style="color: white; margin-top: 140px; text-align: center; font: 100% sans-serif;">
         <p><img src="https://image.flaticon.com/icons/png/512/523/523081.png" style="width:15px; height: 15px;"> 2381-0888 <img src="https://image.flaticon.com/icons/svg/2972/2972097.svg" style="width:15px; height: 15px;"> <span>www.officient.biz</span></p>
     </div>   
    </div>
        
</div>';
    $mail->AltBody = 'Officient a su servicio. Por favor no responda el correo';

    $mail->send();
    echo 'Correo enviado correctamente :)';
} catch (Exception $e) {
    echo "No se pudo enviar el correo Error: {$mail->ErrorInfo}";
}


}



  break;

  case 4:

  
  	$q2 = ('SELECT * FROM logistica');
		$buscamosUltimoRegistro = $dbConn->prepare($q2);
		$buscamosUltimoRegistro->execute();

		while ($row2=$buscamosUltimoRegistro->fetch(PDO::FETCH_ASSOC)){
			$ultimoRegistro=$row2['idRegistro'];
		}	

		$registroInsertar=$ultimoRegistro+1;

  	# registrar evento logistica...

  $estadoIniciado=1;
	$estadoProceso=0;
	$estadoCompleto=0;
	$sinFecha='sin completar';
	$q1 = ("INSERT INTO logistica (idUsuario, idEmpresa, direccionRecoleccion,contactoRecoleccion, horario, direccionEntrega,contactoEntrega,detalle,fechaRegistro,estadoIniciado,estadoProceso,fechaProceso,estadoCompletado,fechaCompletado) VALUES(:idUsuario, :idEmpresa,:direccionRecoleccion,:contactoRecoleccion, :horario, :direccionEntrega, :contactoEntrega,:detalle,:fechaRegistro,:estadoIniciado,:estadoProceso,:fechaProceso,:estadoCompletado,:fechaCompletado)");
			$insertarRegistro = $dbConn->prepare($q1);
			$insertarRegistro->bindParam(':idUsuario', $_POST['txtIdUsuario'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':direccionRecoleccion', $_POST['txtDireccionRecoleccion'], PDO::PARAM_STR);
            $insertarRegistro->bindParam(':contactoRecoleccion', $_POST['txtContactoRecoleccion'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':horario', $_POST['txtHorario'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':direccionEntrega', $_POST['txtDireccionEntrega'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':contactoEntrega', $_POST['txtContactoEntrega'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':detalle', $_POST['txtDetalle'], PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':fechaRegistro', $fechaCompleto, PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':estadoIniciado', $estadoIniciado, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':estadoProceso', $estadoProceso, PDO::PARAM_INT);
			$insertarRegistro->bindParam(':fechaProceso', $sinFecha, PDO::PARAM_STR); 
			$insertarRegistro->bindParam(':estadoCompletado',$estadoCompleto, PDO::PARAM_INT); 
			$insertarRegistro->bindParam(':fechaCompletado', $sinFecha, PDO::PARAM_STR); 
			$insertarRegistro->execute();	



	$q66 = ('SELECT * FROM usuario where idEmpresa=:idEmpresa');
		$buscarUsuario1 = $dbConn->prepare($q66);
		$buscarUsuario1->bindParam(':idEmpresa', $_POST['textIdEmpresa'], PDO::PARAM_INT); 
		$buscarUsuario1->execute();


while ($usuarios=$buscarUsuario1->fetch(PDO::FETCH_ASSOC)){

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'notificaciones@officient.biz';                     // SMTP username
    $mail->Password   = 'Noti2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('notificaciones@officient.biz', 'Asistente Virtual Officient');
    $mail->addAddress($usuarios['correo'], 'Cliente');     // Add a recipient
    														            // Name is optional

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Logistica creada #'.$registroInsertar.' creado desde Officient.biz ';
    $mail->Body    = '<div style=" margin-left: 10%; width: 500px; height: 500px; border-radius: 15px; background-color:#eceff1;">
    <div style="">
        
        <div style="height: 100px;width: 100px; ">
        
        <img src="https://atomolector.com/img/logoOfficient2.png" >
        </div>

    </div>
    <div style="background-color: #000051; margin-top:-20px; height: 400px;">
        <h2 style="color: white; text-align:center; padding-top:40px;">Se ha generado el envio o recolecci&oacute;n!</h2>
        <h1 style="color:white; text-align: center;">Gesti&oacute;n:#'.$registroInsertar.'</h1>
        <h2 style="color: white; padding: 5px; text-align: center;">Para darle seguimiento a tu gesti&oacute;n ingresa a: <a href="https://officient.biz/asistenteVirtual" style="color:orange; text-decoration: none;">https://officient.biz/asistenteVirtual</a></h2>
     <div style="color: white; margin-top: 140px; text-align: center; font: 100% sans-serif;">
         <p><img src="https://image.flaticon.com/icons/png/512/523/523081.png" style="width:15px; height: 15px;"> 2381-0888 <img src="https://image.flaticon.com/icons/svg/2972/2972097.svg" style="width:15px; height: 15px;"> <span>www.officient.biz</span></p>
     </div>   
    </div>
        
</div>';
    $mail->AltBody = 'Officient a su servicio. Por favor no responda el correo';

    $mail->send();
    echo 'Correo enviado correctamente :)';
} catch (Exception $e) {
    echo "No se pudo enviar el correo Error: {$mail->ErrorInfo}";
}


}



  	break;

	default:
		# code...
		break;
}







?>