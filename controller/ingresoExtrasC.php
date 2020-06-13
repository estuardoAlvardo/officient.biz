<?php 

session_start();

include '../conexion/conexion.php';

if(@$_POST['eventoEjecutar']==2){




  $q3 = ("INSERT INTO extras(idCliente, codigoMes,fechaRegistro,cantidad,idServicio,descripcion,totalExtra) VALUES(:idCliente, :codigoMes,:fechaRegistro,:cantidad,:idServicio,:descripcion,:totalExtra)");
      $insertarPago = $dbConn->prepare($q3);
      $insertarPago->bindParam(':idCliente', $_POST['idCliente'], PDO::PARAM_INT);
      $insertarPago->bindParam(':codigoMes', $_POST['mesEnviar'], PDO::PARAM_INT);
      $insertarPago->bindParam(':fechaRegistro', $_POST['fechaRegistro'], PDO::PARAM_STR);
      $insertarPago->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_INT); 
      $insertarPago->bindParam(':idServicio', $_POST['idServicio'], PDO::PARAM_INT); 
      $insertarPago->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
      $insertarPago->bindParam(':totalExtra', $_POST['total'], PDO::PARAM_INT); 



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


          $q4 = ("SELECT * FROM servicio");
            $buscarServicio = $dbConn->prepare($q4);
            $buscarServicio->execute();      

            		echo '<div class="row" style="margin-left:30px;">
                <div class="col s11 m11 l11">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">payment</i>
                      <h6 class="collection-header m-0">'.$row1['razonSocial'].'</h6>
                      <p>'.$row1['nombreCliente'].'</p>
                    </li>
                    <form id="registrarExtra" class="col s12">';

    
echo '<div class="row">
 <p style="text-align: center;">Servicios disponibles</p>';
while ($rowServicio=$buscarServicio->fetch(PDO::FETCH_ASSOC)){

            echo          '
                          <div class="col s2 m2 l2">
                          <p>
                          <label>
                            <input type="checkbox" class="check'.$row1['idempresa'].'servicio" value="'.$rowServicio['idservicio'].'"  onclick="seleccionarS('.$rowServicio['idservicio'].','.$row1['idempresa'].',this.checked);"/>
                            <span title="'.$rowServicio['nombre'].'" >'.substr($rowServicio['nombre'],0,10).'</span>
                          </label>
                        </p>
                        <p>
                        </div>';




}
echo '</div>';
                        echo '<div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtIdEmpresa" type="text" value="'.$row1['idempresa'].'" autofocus style="display:none;">
                              <input id="'.$row1['idempresa'].'eventoEjecutar" type="text" value="2" style="display:none;"> 

                            </div>
                          </div>

                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtFecha" type="date">
                              <label for="password">Fecha Extra </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtCantidad" type="number">
                              <label for="password">Cantidad </label>
                            </div>
                          </div>

                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtDescripcion" type="text">
                              <label for="password">Descripción</label>
                            </div>
                          </div>
                           <div class="row">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'txtTotal" type="text">
                              <label for="password">Total Extra</label>
                            </div>
                          </div>

                          <div class="row" style="display:none;">
                            <div class="input-field col s12">
                              <input id="'.$row1['idempresa'].'idServicio" type="text"  value="0" >
                              <label for="password">Id Servicio</label>
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

                       <input type="text"  id="'.$row1['idempresa'].'txtMes" disabled  >
                         
                            <div class="row">
                              <div class="input-field col s12">
                                <a class="btn waves-effect waves-light right" id="'.$row1['idempresa'].'" onclick="ingresarExtras(this.id);">Registrar Extra
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