<?php 

session_start();

include '../conexion/conexion.php';



if(@$_POST['eventoEjecutar']==2){

  $q3 = ("INSERT INTO factura(numeroFactura, fechaFactura,idCliente,codigoMes,montoFactura) VALUES(:numeroFactura, :fechaFactura,:idCliente,:codigoMes,:montoFactura)");
      $insertarFactura = $dbConn->prepare($q3);
      $insertarFactura->bindParam(':numeroFactura', $_POST['noFactura'], PDO::PARAM_INT);
      $insertarFactura->bindParam(':fechaFactura', $_POST['fechaFactura'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':idCliente', $_POST['idCliente'], PDO::PARAM_STR);
      $insertarFactura->bindParam(':codigoMes', $_POST['mesTransaccion'], PDO::PARAM_INT); 
      $insertarFactura->bindParam(':montoFactura', $_POST['total'], PDO::PARAM_INT); 
      $insertarFactura->execute();


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


$mesActual = date('m');
$anoActual = date('y');
$mesAnterior = date("m",strtotime($fecha_actual."-4 month"));

for ($d=1; $d <=(int)$mesActual ; $d++) { 
  switch ($d) {
    case 1:
      $mesMostrar='Enero (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Diciembre (Anterior)";

      
      break;

    case 2:
      $mesMostrar='Febrero (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;   

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Enero (Anterior)";  

       break;

    case 3:
    $mesMostrar='Marzo (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Febrero (Anterior)";  

      break;

    case 4:
      $mesMostrar='Abril (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Marzo (Anterior)";  
      break;

     case 5:
     $mesMostrar='Mayo (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

      $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Abril (Anterior)";  

      break;

     case 6:
     $mesMostrar='Junio (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Mayo (Anterior)";  

      break;

     case 7:
     $mesMostrar='Julio Actual (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Junio (Anterior)";  

      break;

     case 8:
     $mesMostrar='Agosto (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Julio (Anterior)";  
      break;

      case 9:
      $mesMostrar='Septiembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Agosto (Anterior)";  
      break;

    case 10:
    $mesMostrar='Octubre Actual (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Septiembre (Anterior)";  
      break;

      case 11:
      $mesMostrar='Noviembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;

       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Octubre (Anterior)";  
      break;

      case 12:
      $mesMostrar='Diciembre (Actual)';
      $codMes=$d;
      //añomes
      $codigoActual=$anoActual.$mesActual;
       $codigoAnterior=$anoActual.$mesAnterior;
      $mesAnteriorM="Noviembre (Anterior)";  

      break;




    
    default:
     $mesMostrar='No hay mes';
     $codigoActual=0;
     $codMes=0;

      break;
  }

 
}

while ($row1=$buscarClientes->fetch(PDO::FETCH_ASSOC)){


  echo '<div class="row" style="margin-left:30px;">
                <div class="col s11 m11 l11">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">receipt</i>
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
                              <input id="'.$row1['idempresa'].'txtFechaFactura" type="date">
                              <label for="password">Fecha Factura</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtTotal" type="text">
                              <label for="password">Total</label>
                            </div>
                          </div>

                         <div class="row">
                          <p style="margin-left:10px;">Mes de la transacción</p>     
                              <div class="col s3 m3 l3">
                                <p>
                                <label>
                                  <input type="checkbox" class="check'.$row1['idempresa'].'mesAnterior" value="'.$codigoAnterior.'" onclick="mesAnteriorCheck('.$row1['idempresa'].','.$codigoAnterior.');" />
                                  <span title="" >'.$mesAnteriorM.'</span>
                                </label>
                              </p>
                              <p>
                              </div>
                              
                              <div class="col s3 m3 l3">
                              
                                <p>
                                <label>
                                  <input type="checkbox"  class="check'.$row1['idempresa'].'mesActual" value="'.$codigoActual.'"  onclick="mesActualCheck('.$row1['idempresa'].','.$codigoActual.');"  />
                                  <span title="" >'.$mesMostrar.'</span>
                                </label>
                              </p>
                              <p>
                              </div>
                             </div>
                             <input type="text"  id="'.$row1['idempresa'].'txtMes" disabled >
                            
                          
                 
                         
                            <div class="row">
                              <div class="input-field col s12">
                                <a class="btn waves-effect waves-light right" id="'.$row1['idempresa'].'" onclick="ingresarFactura(this.id);">Registrar Factura
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