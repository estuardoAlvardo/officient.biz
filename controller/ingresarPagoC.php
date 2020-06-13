<?php

session_start();

include '../conexion/conexion.php';

//echo $_POS['txtBuscar'];


if(@$_POST['eventoEjecutar']==2){

  $q3 = ("INSERT INTO pagos(idCliente, noFactura,fechaPago,monto,noDocumentoPago) VALUES(:idCliente, :noFactura,:fechaPago,:monto,:noDocumentoPago)");
      $insertarPago = $dbConn->prepare($q3);
      $insertarPago->bindParam(':idCliente', $_POST['idCliente'], PDO::PARAM_INT);
      $insertarPago->bindParam(':noFactura', $_POST['noFactura'], PDO::PARAM_INT);
      $insertarPago->bindParam(':fechaPago', $_POST['fechaPago'], PDO::PARAM_STR);
      $insertarPago->bindParam(':monto', $_POST['monto'], PDO::PARAM_INT); 
      $insertarPago->bindParam(':noDocumentoPago', $_POST['noDocumento'], PDO::PARAM_INT); 
      $insertarPago->execute();



}else{




if (isset($_POST['txtBuscar']) and !empty($_POST['txtBuscar'])) {

	$nombreBuscar="%".$_POST['txtBuscar']."%";

$q1 = ("SELECT * FROM empresa where nombreCliente LIKE :buscar or razonSocial LIKE :buscar");
            $buscarClientes = $dbConn->prepare($q1);
            $buscarClientes->bindParam(':buscar', $nombreBuscar, PDO::PARAM_STR); 
            $buscarClientes->execute();


date_default_timezone_set('America/Guatemala');
$fecha_actual=date("d/m/Y");
$hora_actual=date('H:i:s',time());
$fechaCompleto=$fecha_actual.' '.$hora_actual;

//crear el codigo del mes de manera dinamica sin que intervencion humana

/*
$mesActual = date('m');
$anoActual = date('y');

for ($d=1; $d <=(int)$mesActual ; $d++) { 
  switch ($d) {
    case 1:
      $mesMostrar='Enero';
      $codMes=$d;
      $codigoAmarre=$codMes
      
      break;

    case 2:
      # code...
      break;

    case 3:
      # code...
      break;

    case 4:
      # code...
      break;

     case 5:
      # code...
      break;

     case 6:
      # code...
      break;

     case 7:
      # code...
      break;

     case 8:
      # code...
      break;

      case 9:
      # code...
      break;

    case 10:
      # code...
      break;

      case 11:
      # code...
      break;

      case 12:
      # code...
      break;




    
    default:
      # code...
      break;
  }

 
}

*/

while ($row1=$buscarClientes->fetch(PDO::FETCH_ASSOC)){

switch ($row1["periodo"]) {
  case 1:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Mensual</div>'; 
    break;
  case 2:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Bimensual</div>'; 
    break;
  case 3:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Trimestral</div>';  
    break;
  case 4:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Cuatrimestre</div>';  
    break;
  case 5:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Quintrimestre</div>'; 
    break;
  case 6:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Semestre</div>';  
    break;
  case 12:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Anual</div>'; 
    break;

  default:
    $periodo='<div class="chip z-depth-2">Periodo renovación: Sin especificar</div>';
    break;
}
  

  switch ($row1['estado']) {

      case 2:
        $estadoEmpresa='<div class="chip z-depth-2 light-blue lighten-1" style="color:black;">Ocacional</div>';  
            
      break;
    case 3:
      $estadoEmpresa='<div class="chip z-depth-2 yellow lighten-1" style="color:black;">Suspendido</div>';
      break;
    case 4:
      $estadoEmpresa='<div class="chip z-depth-2 orange" style="color:black;">Fraude</div>';
      break;
    
    case 5:
      $estadoEmpresa='<div class="chip z-depth-2 deep-orange accent-4" style="color:white;">Inactivo</div>';      
      break; 
    
    default:
      $estadoEmpresa='<div class="chip z-depth-2 green accent-3" style="color:black;">Activo</div>';        
    break;
  }

  if(empty($row1['nombreCliente'])){  $nombreCliente= "Sin nombre cliente" ;}else {  $nombreCliente= $row1['nombreCliente']; }

  if (empty($row1['pbx'])) {
                           $pbx=" Sin PBX"; }else{  $pbx=" ".$row1['pbx']; }

if (empty($row1['fechaCorte'])) {
                          $fechaCorte=" Sin fecha corte";
                        }else{
                           $fechaCorte=" ".$row1['fechaCorte'];

                        }
    if (empty($row1['razonSocial'])) {
                        $razonSocial="Sin razón social"; }else{  $razonSocial= $row1['razonSocial'] ;}


if (empty($row1['nit'])) {
                          $nit= " Sin Nit"; }else{ $nit= " ".$row1['nit']; }

            		echo '<div class="row" style="margin-left:30px;">
                <div class="col s11 m11 l11">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">payment</i>
                      <h6 class="collection-header m-0">'.$row1['razonSocial'].'</h6>
                      <p>'.$row1['nombreCliente'].'</p>
                    </li>
                    <form id="pagoRegistrar" class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtIdCliente" type="text" value="'.$row1['idempresa'].'" autofocus style="display:none;">
                              <input id="'.$row1['idempresa'].'eventoEjecutar" type="text" value="2" style="display:none;">
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtNoFactura" type="text" >
                              <label for="email">Numero de factura</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtFechaPago" type="date">
                              <label for="password">Fecha Pago</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtDocumentoPago" type="text">
                              <label for="password">Documento Pago</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtMonto" type="text">
                              <label for="password">Monto</label>
                            </div>
                          </div>
                         
                            <div class="row">
                              <div class="input-field col s12">
                                <a class="btn waves-effect waves-light right" id="'.$row1['idempresa'].'" onclick="ingresarPagos(this.id);">Registrar pago
                                  <i class="material-icons right">send</i>
                                </a>
                              </div>
                            </div>
                        </form>
                    
                    
                  </ul>
                </div>
                </div>';
            }




}else{
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No ha realizado ninguna búsqueda!! :) 
    <i class="close material-icons">close</i>
  	</div>
  </div>';
}

}
?>