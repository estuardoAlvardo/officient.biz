<?php 

session_start();

include '../conexion/conexion.php';

//buscamos evento pedido
$queryPerdido = ("SELECT * FROM pedido order by idRegistro desc");
$buscarPedidos = $dbConn->prepare($queryPerdido);
$buscarPedidos->execute();


while ($registroPedido=$buscarPedidos->fetch(PDO::FETCH_ASSOC)){

			$queryEmpresa = ("SELECT * FROM empresa where idempresa=:idempresa");
			$buscarEmpresa = $dbConn->prepare($queryEmpresa);
			$buscarEmpresa->bindParam(':idempresa', $registroPedido['idEmpresa'], PDO::PARAM_INT); 
			$buscarEmpresa->execute();

	$pedido='Evento Pedido';

	if ($registroPedido['estadoIniciado']==1) {

		$procesoPedido='Iniciado '.$registroPedido['fechaRegistro'];
	}

	if($registroPedido['estadoEnProceso']==1){

		$procesoPedido='En proceso '.$registroPedido['fechaProceso'];

	}


	if($registroPedido['estadoCompleto']==1){

		$procesoPedido='Completado'.$registroPedido['fechaCompleto'];

	}

while ($registroEmpresas=$buscarEmpresa->fetch(PDO::FETCH_ASSOC)){

	$urlEvento='eventos.php';
 
 echo              '<div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color blue lighten-1">store</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="'.$urlEvento.'" class="deep-purple-text medium-small">'.$pedido.' </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Proceso del evento: '.$procesoPedido.' cliente: '.$registroEmpresas['razonSocial'].'</p>
                    </div>';
 }

}




//buscamos evento cita
$queryCita = ("SELECT * FROM calendar order by idRegistro desc");
$buscarCita = $dbConn->prepare($queryCita);
$buscarCita->execute();

while ($registroCalendar=$buscarCita->fetch(PDO::FETCH_ASSOC)){



			$queryEmpresa2 = ("SELECT * FROM empresa where idempresa=:idempresa");
			$buscarEmpresa2 = $dbConn->prepare($queryEmpresa2);
			$buscarEmpresa2->bindParam(':idempresa', $registroCalendar['idEmpresa'], PDO::PARAM_INT); 
			$buscarEmpresa2->execute();

		$pedido2='Evento Cita';

while ($registroEmpresa2=$buscarEmpresa2->fetch(PDO::FETCH_ASSOC)){
	$urlEvento='eventos.php';


	 echo              '<div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color orange">insert_invitation</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="'.$urlEvento.'" class="deep-purple-text medium-small">'.$pedido2.' </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Agendado --  cliente: '.$registroEmpresa2['razonSocial'].'</p>
                    </div>';
 }

}



//buscamos evento Logistica
$queryLogistica = ("SELECT * FROM logistica order by idRegistro desc");
$buscarLogistica = $dbConn->prepare($queryLogistica);
$buscarLogistica->execute();


while ($registroLogistica=$buscarLogistica->fetch(PDO::FETCH_ASSOC)){

			$queryEmpresa3 = ("SELECT * FROM empresa where idempresa=:idempresa");
			$buscarEmpresa3 = $dbConn->prepare($queryEmpresa3);
			$buscarEmpresa3->bindParam(':idempresa', $registroLogistica['idEmpresa'], PDO::PARAM_INT); 
			$buscarEmpresa3->execute();

	$pedido3='Evento Logistica';

	if ($registroLogistica['estadoIniciado']==1) {

		$procesoPedido2='Iniciado '.$registroLogistica['fechaRegistro'];
	}

	if($registroLogistica['estadoProceso']==1){

		$procesoPedido2='En proceso '.$registroLogistica['fechaProceso'];

	}


	if($registroLogistica['estadoCompletado']==1){

		$procesoPedido2='Completado'.$registroLogistica['fechaCompletado'];

	}

while ($registroEmpresas3=$buscarEmpresa3->fetch(PDO::FETCH_ASSOC)){
 
 $urlEvento='eventos.php';
 echo              '<div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color pink lighten-1">markunread_mailbox</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="'.$urlEvento.'" class="deep-purple-text medium-small">'.$pedido3.' </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Proceso del evento: '.$procesoPedido2.' cliente: '.$registroEmpresas3['razonSocial'].'</p>
                    </div>';
 }

}


?>