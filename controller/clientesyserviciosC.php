<?php

session_start();

include '../conexion/conexion.php';

//echo $_POS['txtBuscar'];

if (isset($_POST['txtBuscar']) and !empty($_POST['txtBuscar'])) {

	$nombreBuscar="%".$_POST['txtBuscar']."%";

$q1 = ("SELECT * FROM empresa where nombreCliente LIKE :buscar or razonSocial LIKE :buscar");
            $buscarClientes = $dbConn->prepare($q1);
            $buscarClientes->bindParam(':buscar', $nombreBuscar, PDO::PARAM_STR); 
            $buscarClientes->execute();




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

            		echo ' <div class="col s12 m4 l4" style="margin-top: 30px;">
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../img/fondo.png" alt="user bg">
                    </div>
                    <div class="card-content">
                      <img src="../img/avatar/avatar-10.png" alt="" class="circle responsive-img activator card-profile-image indigo darken-4 padding-2">
                      <a class="btn-floating activator btn-move-up waves-effect indigo darken-4 z-depth-4 right">
                        <i class="material-icons">remove_red_eye</i>
                      </a>
                      <span class="card-title activator grey-text text-darken-4" style="margin-top: 30px;">'.$nombreCliente.'</span>
                      <p>
                         '.$estadoEmpresa.'</p>
                      <p>
                        <i class="material-icons">perm_phone_msg</i>'.$pbx.'</p>
                      <p>
                        <i class="material-icons">access_alarm</i>'.$fechaCorte.'</p>
                        <p>Periodo Renovación: '.$periodo.'</p>
                       <a class="waves-effect indigo darken-4 btn-large modal-trigger" href="#modal2" id="'.$row1['idempresa'].'" onclick="seguimientoLlamada(this.id,\''.$row1['nombreCliente'].'\');"><i class="material-icons left">local_phone</i>Crear Registro</a>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">'.$razonSocial.'
                        <i class="material-icons right">close</i>
                      </span>
                       <div class="chip">Datos Cliente</div>
                      <p>
                        Nombre cliente: '.$nombreCliente.' </p>
                      <p>
                       Pbx: '.$pbx.'</p>
                      <p>
                        Nit: '.$nit.'</p>
                      <p>
                          Fecha Corte: '.$fechaCorte.'
                      </p>
                      <p>
                      </p>
                      <div class="row">
                      <a class="waves-effect indigo darken-2 btn-small">Servicios</a>
                      <a class="waves-effect indigo darken-2 btn-small">Estado de cuenta</a>
                      <a class="waves-effect pink darken-3 btn-small" style="margin-top: 20px;">Usuarios Asignados</a>
                      <a class="waves-effect pink darken-3 btn-small" style="margin-top: 20px;">Archivo</a>
                     
                      </div>

                      <p>
                      </p>
                    </div>
                  </div>
                </div>';
            }




}else{
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No hay busqueda!
    <i class="close material-icons">close</i>
  	</div>
  </div>';
}


?>