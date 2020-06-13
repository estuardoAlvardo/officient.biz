<?php 
session_start();
include '../conexion/conexion.php';


//validacion para mostrar opciones en el panel si la validacion ==1 entonces se vera de lo contrario se ocultara
if ($_SESSION['dashboard']==1) {
	$dasboard='display:block;';
}elseif($_SESSION['dashboard']==2){
	$dasboard='display:none;';
}

if ($_SESSION['reporteCliente']==1) {
	$reporteCliente='display:block;';
}else{
	$reporteCliente='display:none;';
}


if ($_SESSION['ingresoFacturas']==1) {
	$ingresoFacturas='display:block;';
}else{
	$ingresoFacturas='display:none;';
}


if ($_SESSION['ingresoExtras']==1) {
	$ingresoExtras='display:block;';
}else{
	$ingresoExtras='display:none;';
}


if ($_SESSION['ingresoPago']==1) {
	$ingresoPagos='display:block;';
}else{
	$ingresoPagos='display:none;';
}


if ($_SESSION['pendientesPago']==1) {
	$pendientesPago='display:block;';
}else{
	$pendientesPago='display:none;';
}


if ($_SESSION['clienteyUsuarios']==1) {
	$clienteyUsuarios='display:block;';
}else{
	$clienteyUsuarios='display:none;';
}

if ($_SESSION['empresas']==1) {
	$empresas='display:block;';
}else{
	$empresas='display:none;';
}


if ($_SESSION['serviciosyPaquetes']==1) {
	$serviciosyPaquetes='display:block;';
}else{
	$serviciosyPaquetes='display:none;';
}

if ($_SESSION['privilegios']==1) {
	$privilegios='display:block;';
}else{
	$privilegios='display:none;';
}


if ($_SESSION['archivos']==1) {
	$archivos='display:block;';
}else{
	$archivos='display:none;';
}



//echo $dashboard;



?>

<!DOCTYPE html>
<html>
<head>
	<title>Eventos - <?php echo $_SESSION['nombre']; ?></title>
	<link  rel="icon"   href="../img/logo.ico" type="image/ico" />
	    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Compiled and minified JQUERY -->
    <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>

</head>
<body>
	

	

</body>


</html>




<!DOCTYPE html>
<html lang="es">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Master Office</title>
    <!-- Favicons-->
    <link  rel="icon"   href="../img/logo.ico" type="image/ico" />
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="../css//materialize.css" type="text/css" rel="stylesheet">
    <link href="../css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="../css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="../vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">

  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color" style="background-color: #22088D;">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="panelControl.php" class="brand-logo darken-1" >
                    <img src="../img/logo2.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">Officient</span>
                  </a>
                </h1>
              </li>
            </ul>
           
            <ul class="right hide-on-med-and-down">
              
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">5</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="../img/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>
            </ul>
            <!-- translation-button -->
            
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Lock</a>
              </li>
              <li>
                <a href="../controller/logout.php" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details darken-2" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="../img/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown-nav" class="dropdown-content">
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">settings</i> Settings</a>
                    </li>
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">live_help</i> Help</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">lock_outline</i> Lock</a>
                    </li>
                    <li>
                      <a href="../controller/logout.php" class="grey-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i> Logout</a>
                    </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal"><?php echo $_SESSION['rolInicial']; ?></p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold" style="<?php echo $dasboard; ?>">
                  <a href="panelControl.php" class="waves-effect waves-cyan">
                      <i class="material-icons">pie_chart_outlined</i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $reporteCliente; ?>">
                  <a href="reporteCliente.php" class="waves-effect waves-cyan">
                      <i class="material-icons">trending_up</i>
                      <span class="nav-text">Reporte Cliente</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $ingresoFacturas; ?>">
                  <a href="ingresoFacturas.php" class="waves-effect waves-cyan">
                      <i class="material-icons">add_shopping_cart</i>
                      <span class="nav-text">Ingreso Facturas</span>
                    </a>
                </li>
                 <li class="bold" style="<?php echo $ingresoExtras; ?>">
                  <a href="ingresoExtras.php" class="waves-effect waves-cyan">
                      <i class="material-icons">add_shopping_cart</i>
                      <span class="nav-text">Ingreso Extras</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $ingresoPagos; ?>">
                  <a href="ingresoPagos.php" class="waves-effect waves-cyan">
                      <i class="material-icons">attach_money</i>
                      <span class="nav-text">Ingreso Pagos</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $pendientesPagos; ?>">
                  <a href="pendientesPagos.php" class="waves-effect waves-cyan">
                      <i class="material-icons">event_busy</i>
                      <span class="nav-text">Pendientes Pago</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $clienteyUsuarios; ?>">
                  <a href="clientesyUsuarios.php" class="waves-effect waves-cyan">
                      <i class="material-icons">person_pin</i>
                      <span class="nav-text">Clientes & Usuarios</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $empresas; ?>">
                  <a href="empresas.php" class="waves-effect waves-cyan">
                      <i class="material-icons">work</i>
                      <span class="nav-text">Empresas</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $serviciosyPaquetes; ?>">
                  <a href="serviciosyPaquetes.php" class="waves-effect waves-cyan">
                      <i class="material-icons">redeem</i>
                      <span class="nav-text">Servicios & paquetes</span>
                    </a>
                </li>
                <li class="bold" style="<?php echo $privilegios; ?>">
                  <a href="privilegios.php" class="waves-effect waves-cyan">
                    <i class="material-icons">phonelink_lock</i>
                    <span class="nav-text">Privilegios</span>
                  </a>
                </li>

                <li class="bold" style="<?php echo $archivos; ?>">
                  <a href="archivo.php" class="waves-effect waves-cyan">
                    <i class="material-icons">save</i>
                    <span class="nav-text">Archivo</span>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
            <h5 class="center">Gestor de eventos</h5>

<div class="col s12 card" style="border: 2px solid #22088D; border-radius: 5px;">
  <h5 style="">Buscar Evento</h5>
      <div class="row">
        <div class="col s1 m1 l1"></div>
        <div class="col s5 m5 l5">
        <div class="row">
        <div class="col s6 m6 l3">
        <p>
          <label>
            <input type="checkbox" id="checkedPedido" />
            <span>Pedido</span>
            </label>
        </p>

        </div>
        <div class="col s6 m6 l3">
        <p>
          <label>
            <input type="checkbox" id="checkedCita" />
            <span>Cita</span>
            </label>
        </p>
      </div>
      <div class="col s6 m6 l3">
        <p>
          <label>
            <input type="checkbox" id="checkedLogistica" />
            <span>Logistica</span>
            </label>
        </p>
      </div>
      </div>
</div>

        <div class="input-field col s5 m5 l5">
          <i class="material-icons prefix">search</i>
          <input type="number" id="txtBuscar" class="autocomplete" >
          <label for="autocomplete">Codigo de evento</label>

        </div>

      </div>
         <div class="salida"></div>
    </div>

<!--Evento Cita-->


                <?php
                
          $queryCita = ("SELECT * FROM calendar");
          $buscarCita = $dbConn->prepare($queryCita);
          $buscarCita->execute();


while ($registroCalendar=$buscarCita->fetch(PDO::FETCH_ASSOC)){

  $queryEmpresa2 = ("SELECT * FROM empresa where idempresa=:idempresa");
      $buscarEmpresa2 = $dbConn->prepare($queryEmpresa2);
      $buscarEmpresa2->bindParam(':idempresa', $registroCalendar['idEmpresa'], PDO::PARAM_INT); 
      $buscarEmpresa2->execute();

    $queryUsuario = ("SELECT * FROM usuario where idCliente=:idUsuario");
      $buscarUsuario2 = $dbConn->prepare($queryUsuario);
      $buscarUsuario2->bindParam(':idUsuario', $registroCalendar['idUsuario'], PDO::PARAM_INT); 
      $buscarUsuario2->execute();

     
      while ($registroEmpresa2=$buscarEmpresa2->fetch(PDO::FETCH_ASSOC)){

        while ($registroUsuario=$buscarUsuario2->fetch(PDO::FETCH_ASSOC)){

      $queryObservacion1 = ("SELECT * FROM observaciones where idEvento=:idEvento");
      $buscarObservacion1 = $dbConn->prepare($queryObservacion1);
      $buscarObservacion1->bindParam(':idEvento', $registroCalendar['idRegistro'], PDO::PARAM_INT); 
      $buscarObservacion1->execute();
      $hayComentarios1=$buscarObservacion1->rowCount();

        if($registroCalendar['confirmar']==1){
          $checkedConfirmado='checked';
        }else{
          $checkedConfirmado=' ';
        }

                 ?>             
            <div class="col s5 m12 l12">
            <div class="card-panel ">
              <div class="row">
                <div class="col s2 m2 l2">
                      <img class="responsive-img" src="../img/evento.png" style="background-size: cover;
                   height: 100%;
                   width: 100% ;
                   text-align: center;">
                </div>



                <div class="col s10 m10 l10">
                
                  <h5 class="col s3 m3 l3" style="">Evento Cita</h5>
                  
                  <p class="col s3 m3 l3" style=" text-align: center;"></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text"><?php echo $registroUsuario['nombre']; ?></samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt"><?php echo $registroCalendar['idRegistro']; ?></span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Nombre Empresa:<strong> <?php echo $registroEmpresa2['razonSocial']; ?></strong></p>
                  <p>Evento: <strong><?php echo $registroCalendar['tituloEvento'];  ?></strong></p>
                  <p>Descripción evento: <strong> <?php echo $registroCalendar['descripcionEvento'];  ?></strong> </p>
                  <p>Fecha Inicio: <strong> <?php echo $registroCalendar['fechaInicio'];  ?></strong> </p>
                  <p>Fecha fin: <strong> <?php echo $registroCalendar['fechaFin'];  ?></strong> </p>
                </div>


                <div class="col s5 m5 l5">
                 
                    <p>Estatus Evento</p>
                    <p>
                      <label>
                        <input type="checkbox" checked="checked" disabled />
                        <span>Agendado</span>
                      </label>
                    </p>

                    <form id="confirmarCita">
                      
                      <p>
                      <label>
                        <input type="checkbox" <?php echo $checkedConfirmado; ?>  onclick="confirmarDesconfirmar(<?php echo $registroCalendar['idRegistro'].',this.checked';  ?>)" />
                        <span>Confirmado :  <?php echo $registroCalendar['fechaConfirmar']; ?></span>
                      </label>
                    </p>
                      
                    </form>


                    <script type="text/javascript">
                        function confirmarDesconfirmar(idModificar,estado){
                          evento=2;
                          //alert('id Modificar: '+idModificar+' Estado del check: '+estado+' noEvento '+evento+' Uri'+uri1);
                          $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "idModificarCita": idModificar,
                                "estadoCita": estado,
                                "txtEvento": evento
                                
                              },
                              success:function(r2){
                                if(estado==true){
                                M.toast({html: 'Se ha Confirmado cita de manera correcta :)', classes: 'rounded'});
                                }else{
                                   M.toast({html: 'Se ha Desconfirmado cita de manera correcta :)', classes: 'rounded'});
                                }

                                
                              }

                            });

                        }

                    </script>


                </div>
                 <div class="col s9 m9 l9 chip"><?php echo 'El evento pertenece a:  <strong>'.$registroEmpresa2['razonSocial'].'</strong>'; ?></div>
            
                </div>

                  <form id="formularioComentario" class="col s12 m12 l12">
                    <input type="text" name="txtTipoEvento" value="1" style="display: none;">

                    <input type="text" name="txtEvento" value="1" style="display: none;">
                    <input type="text" name="txtIdUsuario" value="<?php echo $_SESSION['idCliente']; ?>" style="display: none;">
                    <input type="text" name="txtIdEvento" value="<?php echo $registroCalendar['idRegistro']; ?>" style="display:none;">
                    <div class="row">
                      <div class="input-field col s10 m10 l10">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="txtObservacion" id="<?php echo 'observacion1'.$registroCalendar['idRegistro']; ?>"  required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"  onclick="chatObservacion(<?php echo  '1,1,'.$_SESSION['idCliente'].','.$registroCalendar['idRegistro']; ?>);"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>
            <?php if($hayComentarios1==0){ ?>
                <h6 style="text-align: center;">No hay comentarios!!</h6>

            <?php  } while ($registroObservacion=$buscarObservacion1->fetch(PDO::FETCH_ASSOC)){

                  $usuarioComentario = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC = $dbConn->prepare($usuarioComentario);
                  $buscarUsuarioC->bindParam(':idUsuario', $registroObservacion['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC->execute();

                  while ($usuarioComentario=$buscarUsuarioC->fetch(PDO::FETCH_ASSOC)){


             ?>      
                <div class=" col s12 m12 l12" id="comentarioVer111">
                   <div class="chip green lighten-2">
                    <?php if($usuarioComentario['idPrivilegios']==1){ ?>
                    <img src="../img/avatar/avatar-13.png" alt="Contact Person">
                  <?php }else if($usuarioComentario['idPrivilegios']==2){ ?>
                    <img src="../img/personCallin.png" alt="Contact Person">
                  <?php }else if($usuarioComentario['idPrivilegios']>=3){ ?>
                    <img src="../img/cliente.png" alt="Contact Person">
                    <?php } echo $usuarioComentario['nombre'].' '.$usuarioComentario['apellido']; ?>
                  </div>
                  <p class="gray-text"> <?php echo $registroObservacion['observacion']; ?> </p>
                  <p style="text-align: right;"><span><?php echo $registroObservacion['fechaHora'];  ?></span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>
                 
        <?php } }?>

                
              </div>       
            </div>
        </div>
<?php } } } ?>

<!--Evento Pedido-->



<?php 

$queryPerdido = ("SELECT * FROM pedido");
$buscarPedidos = $dbConn->prepare($queryPerdido);
$buscarPedidos->execute();


while ($registroPedido=$buscarPedidos->fetch(PDO::FETCH_ASSOC)){

  $queryEmpresa = ("SELECT * FROM empresa where idempresa=:idempresa");
      $buscarEmpresa = $dbConn->prepare($queryEmpresa);
      $buscarEmpresa->bindParam(':idempresa', $registroPedido['idEmpresa'], PDO::PARAM_INT); 
      $buscarEmpresa->execute();


        $queryUsuario3 = ("SELECT * FROM usuario where idCliente=:idUsuario");
      $buscarUsuario3 = $dbConn->prepare($queryUsuario3);
      $buscarUsuario3->bindParam(':idUsuario', $registroPedido['idUsuario'], PDO::PARAM_INT); 
      $buscarUsuario3->execute();



        if ($registroPedido['estadoIniciado']==1) {

    $procesoPedido='Iniciado '.$registroPedido['fechaRegistro'];
  }

  if($registroPedido['estadoEnProceso']==1){

    $procesoPedido='checked';

  }else{
    $procesoPedido=' ';

  }


  if($registroPedido['estadoCompleto']==1){

    $completoPedido='checked';

  }else{

     $completoPedido=' ';

  }


while ($registroEmpresas=$buscarEmpresa->fetch(PDO::FETCH_ASSOC)){
      while ($registroUsuario3=$buscarUsuario3->fetch(PDO::FETCH_ASSOC)){


      $queryObservacion2 = ("SELECT * FROM observaciones where idEvento=:idEvento");
      $buscarObservacion2 = $dbConn->prepare($queryObservacion2);
      $buscarObservacion2->bindParam(':idEvento', $registroPedido['idRegistro'], PDO::PARAM_INT); 
      $buscarObservacion2->execute();
      $hayComentarios2=$buscarObservacion2->rowCount();



?>

        <div class="col s12 m12 l12">
            <div class="card-panel ">
              <div class="row">
                <div class="col s2 m2 l2">
                      <img class="responsive-img" src="../img/business.png" style="background-size: cover;
   height: 100%;
   width: 100% ;
   text-align: center;">
                </div>

                <div class="col s10 m10 l10">
                
                  <h5 class="col s3 m3 l3" style="">Evento Pedido</h5>
                  
                  <p class="col s3 m3 l3" style=" text-align: center;"><?php echo $registroPedido['fechaRegistro']; ?></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text"><?php echo $registroUsuario3['nombre']; ?></samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt"><?php echo $registroPedido['idRegistro']; ?></span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Dirección Empresa:<strong><?php echo $registroPedido['direccionEntrega']; ?></strong></p>
                  <p>Contacto Entrega: <strong><?php echo $registroPedido['contactoEntrega']; ?></strong> </p>
                  <p>Nombre a facturar:<strong> <?php echo $registroPedido['nombreFactura']; ?></strong> </p>
                  <p>Nit:  <strong> <?php echo $registroPedido['nit']; ?></strong> </p>
                  <p>Pedido:  <strong><?php echo $registroPedido['pedido']; ?></strong> </p>
                  <p>Detalle:  <strong> <?php echo $registroPedido['detalle']; ?></strong> </p>
                </div>

                <div class="col s5 m5 l5">
                
                    <p>Estatus Evento</p>
                    <p>
                      <label>
                        <input type="checkbox" checked="checked" disabled />
                        <span>Iniciado</span>
                      </label>
                    </p>

                    <p>
                      <label>
                        <input type="checkbox" <?php echo @$procesoPedido; ?> onclick="procesoDesproceso(<?php echo $registroPedido['idRegistro'].',this.checked'; ?>);" />
                        <span>En proceso <?php echo $registroPedido['fechaProceso']; ?></span>
                      </label>
                    </p>
                 
                    <p>
                      <label>
                        <input type="checkbox"  <?php echo $completoPedido; ?> onclick="completoIncompleto(<?php echo $registroPedido['idRegistro'].',this.checked'; ?>);" />
                        <span>Finalizado <?php echo $registroPedido['fechaCompleto'] ?></span>
                      </label>
                    </p>


                </div>
                <div class="col s9 m9 l9 chip"><?php echo 'El evento pertenece a:  <strong>'.$registroEmpresas['razonSocial'].'</strong>'; ?></div>


                 <script type="text/javascript">
                        function procesoDesproceso(idModificar,estado){
                          evento=3;
                          //alert('id Modificar: '+idModificar+' Estado del check: '+estado+' noEvento '+evento+' Uri'+uri1);
                          $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "idModificarEvento": idModificar,
                                "estadoEvento": estado,
                                "txtEvento": evento
                                
                              },
                              success:function(r2){
                                if(estado==true){
                                M.toast({html: 'Evento en proceso :)', classes: 'rounded'});
                                }else{
                                   M.toast({html: 'Se actualizo sin proceso :)', classes: 'rounded'});
                                }

                                
                              }

                            });

                        }

                         function completoIncompleto(idModificar,estado){
                          evento=4;
                          //alert('id Modificar: '+idModificar+' Estado del check: '+estado+' noEvento '+evento+' Uri'+uri1);
                          $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "idModificarEvento": idModificar,
                                "estadoEvento": estado,
                                "txtEvento": evento
                                
                              },
                              success:function(r2){
                                if(estado==true){
                                M.toast({html: 'Se completo el evento de manera correcta :)', classes: 'rounded'});
                                }else{
                                   M.toast({html: 'Se actualizo no se ha completado :)', classes: 'rounded'});
                                }

                                
                              }

                            });

                        }

                    </script>

            
                </div>

                  <form id="formularioComentario2" class="col s12 m12 l12">
                        
                    <div class="row">
                      <div class="input-field col s10 m10 l10">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="txtObservacion" id="<?php echo 'observacion2'.$registroPedido['idRegistro']; ?>"   required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"  onclick="chatObservacion(<?php echo  '2,1,'.$_SESSION['idCliente'].','.$registroPedido['idRegistro']; ?>);"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>

          <?php if($hayComentarios2==0){ ?>
                <h6 style="text-align: center;">No hay comentarios!!</h6>

            <?php  } while ($registroObservacion2=$buscarObservacion2->fetch(PDO::FETCH_ASSOC)){

                  $usuarioComentario1 = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC1 = $dbConn->prepare($usuarioComentario1);
                  $buscarUsuarioC1->bindParam(':idUsuario', $registroObservacion2['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC1->execute();

                  while ($usuarioComentario1R=$buscarUsuarioC1->fetch(PDO::FETCH_ASSOC)){


             ?>      
             
             <div class=" col s12 m12 l12" id="comentarioVer112">
                   <div class="chip green lighten-2">
                    <?php if($usuarioComentario1R['idPrivilegios']==1){ ?>
                    <img src="../img/avatar/avatar-13.png" alt="Contact Person">
                  <?php }else if($usuarioComentario1R['idPrivilegios']==2){ ?>
                    <img src="../img/personCallin.png" alt="Contact Person">
                  <?php }else if($usuarioComentario1R['idPrivilegios']>=3){ ?>
                    <img src="../img/cliente.png" alt="Contact Person">
                    <?php } echo $usuarioComentario1R['nombre'].' '.$usuarioComentario1R['apellido']; ?>
                  </div>
                  <p class="gray-text"> <?php echo $registroObservacion2['observacion']; ?> </p>
                  <p style="text-align: right;"><span><?php echo $registroObservacion2['fechaHora'];  ?></span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>

             
          <?php }} ?>     

                
              </div>       
            </div>
        </div>

<?php }} } ?>








<?php 
$queryLogistica = ("SELECT * FROM logistica");
$buscarLogistica = $dbConn->prepare($queryLogistica);
$buscarLogistica->execute();
while ($registroLogistica=$buscarLogistica->fetch(PDO::FETCH_ASSOC)){

  $queryEmpresa3 = ("SELECT * FROM empresa where idempresa=:idempresa");
      $buscarEmpresa3 = $dbConn->prepare($queryEmpresa3);
      $buscarEmpresa3->bindParam(':idempresa', $registroLogistica['idEmpresa'], PDO::PARAM_INT); 
      $buscarEmpresa3->execute();


        $queryUsuario4 = ("SELECT * FROM usuario where idCliente=:idUsuario");
      $buscarUsuario4 = $dbConn->prepare($queryUsuario4);
      $buscarUsuario4->bindParam(':idUsuario', $registroLogistica['idUsuario'], PDO::PARAM_INT); 
      $buscarUsuario4->execute();

      while ($registroEmpresas3=$buscarEmpresa3->fetch(PDO::FETCH_ASSOC)){

         while ($registroUsuario4=$buscarUsuario4->fetch(PDO::FETCH_ASSOC)){


      $queryObservacion4 = ("SELECT * FROM observaciones where idEvento=:idEvento");
      $buscarObservacion4 = $dbConn->prepare($queryObservacion4);
      $buscarObservacion4->bindParam(':idEvento', $registroLogistica['idRegistro'], PDO::PARAM_INT); 
      $buscarObservacion4->execute();
      $hayComentarios4=$buscarObservacion4->rowCount();

            if ($registroLogistica['estadoIniciado']==1) {

    $iniciadoLogistica='Iniciado '.$registroLogistica['fechaRegistro'];
  }

  if($registroLogistica['estadoProceso']==1){

    $procesoLogistica='checked';

  }else{
    $procesoLogistica=" ";
  }


  if($registroLogistica['estadoCompletado']==1){

    $completadoLogistica='checked';

  }else{

    $completadoLogistica=" ";
  }


?>
        <!--Evento Logisitica-->
        <div class="col s12 m12 l12">
            <div class="card-panel ">
              <div class="row">
                <div class="col s2 m2 l2">
                      <img class="responsive-img" src="../img/order.png" style="background-size: cover;
   height: 100%;
   width: 100% ;
   text-align: center;">
                </div>

                <div class="col s10 m10 l10">
                
                  <h5 class="col s3 m3 l3" style="">Logistica</h5>
                  
                  <p class="col s3 m3 l3" style=" text-align: center;"><?php echo $registroLogistica['fechaRegistro']; ?></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text"><?php echo $registroUsuario4['nombre']; ?></samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt"><?php echo $registroLogistica['idRegistro']; ?></span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Dirección Recolección: <strong><?php echo $registroLogistica['direccionRecoleccion']; ?></strong></p>
                  <p>Contacto Recolección: <strong> <?php echo $registroLogistica['contactoRecoleccion']; ?></strong> </p>
                  <p>Horario: <strong> <?php echo $registroLogistica['horario']; ?></strong> </p>
                  <p>Dirección Entrega: <strong> <?php echo $registroLogistica['direccionEntrega']; ?></strong> </p>
                  <p>Contacto Entrega:  <strong> <?php echo $registroLogistica['contactoEntrega']; ?></strong> </p>
                  <p>Detalle:  <strong><?php echo $registroLogistica['detalle']; ?></strong> </p>

                </div>

                <div class="col s5 m5 l5">
                 
                    <p>Estatus Evento</p>
                    <p>
                      <label>
                        <input type="checkbox" checked="checked"  disabled />
                        <span><?php echo $iniciadoLogistica; ?></span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input type="checkbox" <?php echo $procesoLogistica; ?> onclick="logisticaProceso(<?php echo $registroLogistica['idRegistro'].',this.checked'; ?>);" />
                        <span>En proceso <?php echo $registroLogistica['fechaProceso']; ?></span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input type="checkbox" <?php echo $completadoLogistica; ?> onclick="logisticaCompleto(<?php echo $registroLogistica['idRegistro'].',this.checked'; ?>);" />
                        <span>Finalizado  <?php echo $registroLogistica['fechaCompletado']; ?></span>
                      </label>
                    </p>


                </div>
                 <div class="col s9 m9 l9 chip"><?php echo 'El evento pertenece a:  <strong>'.$registroEmpresas3['razonSocial'].'</strong>'; ?></div>


                 <script type="text/javascript">
                        function logisticaProceso(idModificar,estado){
                          evento=5;
                          //alert('id Modificar: '+idModificar+' Estado del check: '+estado+' noEvento '+evento+' Uri'+uri1);
                          $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "idModificarEvento": idModificar,
                                "estadoEvento": estado,
                                "txtEvento": evento
                                
                              },
                              success:function(r2){
                                if(estado==true){
                                M.toast({html: 'Evento en proceso :)', classes: 'rounded'});
                                }else{
                                   M.toast({html: 'Se actualizo sin proceso :)', classes: 'rounded'});
                                }

                                
                              }

                            });

                        }

                         function logisticaCompleto(idModificar,estado){
                          evento=6;
                          //alert('id Modificar: '+idModificar+' Estado del check: '+estado+' noEvento '+evento+' Uri'+uri1);
                          $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "idModificarEvento": idModificar,
                                "estadoEvento": estado,
                                "txtEvento": evento
                                
                              },
                              success:function(r2){
                                if(estado==true){
                                M.toast({html: 'Se completo el evento de manera correcta :)', classes: 'rounded'});
                                }else{
                                   M.toast({html: 'Se actualizo no se ha completado :)', classes: 'rounded'});
                                }

                                
                              }

                            });

                        }

                    </script>
                </div>
                  <form id="formularioComentario3" class="col s12 m12 l12">
                   
                    <div class="row">
                      <div class="input-field col s10 m10 l10">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="txtObservacion" id="<?php echo 'observacion3'.$registroLogistica['idRegistro']; ?>"  required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"   onclick="chatObservacion(<?php echo  '3,1,'.$_SESSION['idCliente'].','.$registroLogistica['idRegistro']; ?>);"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>
         <?php if($hayComentarios4==0){ ?>
                <h6 style="text-align: center;">No hay comentarios!!</h6>

            <?php  } while ($registroObservacion4=$buscarObservacion4->fetch(PDO::FETCH_ASSOC)){

                  $usuarioComentario4 = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC4 = $dbConn->prepare($usuarioComentario4);
                  $buscarUsuarioC4->bindParam(':idUsuario', $registroObservacion4['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC4->execute();

                  while ($usuarioComentarioR4=$buscarUsuarioC4->fetch(PDO::FETCH_ASSOC)){


             ?>     
                <div class=" col s12 m12 l12" id="<?php echo 'comentarioVer3'.$registroLogistica['idRegistro']; ?>">
                   <div class="chip green lighten-2">
                     <?php if($usuarioComentarioR4['idPrivilegios']==1){ ?>
                    <img src="../img/avatar/avatar-13.png" alt="Contact Person">
                  <?php }else if($usuarioComentarioR4['idPrivilegios']==2){ ?>
                    <img src="../img/personCallin.png" alt="Contact Person">
                  <?php }else if($usuarioComentarioR4['idPrivilegios']>=3){ ?>
                    <img src="../img/cliente.png" alt="Contact Person">
                    <?php } echo $usuarioComentarioR4['nombre'].' '.$usuarioComentarioR4['apellido']; ?>
                  </div>
                  <p class="gray-text"> <?php echo $registroObservacion4['observacion']; ?> </p>
                  <p style="text-align: right;"><span><?php echo $registroObservacion4['fechaHora'];  ?></span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>


          <?php }} ?>     

                
              </div>       
            </div>
        </div>
      </div>
      </div>
          

<?php }}} ?>

          






        </section>
        <!-- END CONTENT -->
        <!-- START RIGHT SIDEBAR NAV-->
       <aside id="right-sidebar-nav">
          <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
              <div class="row">
                <div class="col s12 border-bottom-1 mt-5">
                  <ul class="tabs">
                    <li class="tab col s4">
                      <a href="#activity" class="active">
                        <span class="material-icons">graphic_eq</span>
                      </a>
                    </li>
                    <li class="tab col s4">
                      <a href="#chatapp">
                        <span class="material-icons">call</span>
                      </a>
                    </li>

                  </ul>
                </div>
                
                <div id="chatapp" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">REGISTRO LLAMADAS</h6>
                  <div id="registroLllamadasMostrar" class="collection border-none">
                   <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color blue lighten-1">info_outline</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">No hay llamadas!</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small"></p>
                    </div>
                    
                  </div>
                </div>
                <div id="activity" class="col s12">
                  <h6 class="mt-5 mb-3 ml-3">EVENTOS RECIENTES</h6>
                  <div class="activity" id="registroEventos11">
                    <div class="col s3 mt-2 center-align recent-activity-list-icon">
                      <i class="material-icons white-text icon-bg-color deep-purple lighten-2">info_outline</i>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">Aun no hay eventos!</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small"></p>
                    </div>
                    

                  </div>
                </div>
              </div>
            </li>
          </ul>
        </aside>
        <!-- END RIGHT SIDEBAR NAV-->
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer" style="background-color: #22088D; ">
        <div class="footer-copyright">
          <div class="container">
            <span>Copyright ©
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> <a class="grey-text text-lighten-2" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Officient</a> Todos los derechos reservados.</span>
          
          </div>
        </div>
    </footer>

<p id="uriEnviar" style="display: none;"><?php echo $_SESSION['uri']; ?></p>

    <script type="text/javascript">
      
   //uri general para todos los procesos
    var uri1=$("#uriEnviar").text();

         function mostrarRegistroLlamadas(){
      var registroLlamadas= $.ajax({
        url: uri1+"controller/staticLateralIzquierdoC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('registroLllamadasMostrar').innerHTML = registroLlamadas;

    }
    setInterval(mostrarRegistroLlamadas,1000);


 function mostrarEventos(){
      var registroEventos= $.ajax({
        url: uri1+"controller/staticLateralDerechoEventoC.php",
        dataType: "text",
        async: false

      }).responseText;
      document.getElementById('registroEventos11').innerHTML = registroEventos;

    }
    setInterval(mostrarEventos,1000);


///funcion para insertar datos

function chatObservacion(tipoEvento,txtEvento,idCliente,idEvento){
  
  var observacion=$("#observacion"+tipoEvento+idEvento).val();
//alert("tipoEvento "+tipoEvento+" Evento ejecutar "+txtEvento+" idCliente "+idCliente+" idEvento "+idEvento+' observacion:' + observacion);
   
                        $.ajax({
                              type: "POST",
                              url: uri1+"controller/eventosC.php",
                              data: {
                                "txtTipoEvento": tipoEvento,
                                "txtIdUsuario": idCliente,
                                "txtObservacion": observacion,
                                "txtEvento": txtEvento,
                                "txtIdEvento": idEvento
                              },
                              success:function(r2){

                               
                                  M.toast({html: 'Se ha almacenado su comentario. :)', classes: 'rounded'});
                                  $("#comentarioVer"+tipoEvento+idEvento).load(" #comentarioVer"+tipoEvento+idEvento);
                                

                                
                              }

                            });

            }

                        
///funcion para busqueda


      $("#txtBuscar").keyup(function(){

       var pedido=$("#checkedPedido").prop('checked');
       var logistica=$("#checkedLogistica").prop('checked');
       var cita=$("#checkedCita").prop('checked');
       var pedido1=0;
       var logistica1=0;
       var cita1=0;


       if(pedido==true){
        pedido1=1;
       }

      if(logistica==true){
         logistica1=1;
       }

       if(cita==true){
         cita1=1;
       }

       
       //alert(pedido);
       var text =$(this).val();

        
       //alert("pedido "+pedido1+" cita "+cita1+" logistica "+logistica1);
        $.ajax({
          data:{
            "txtBuscar": text,
            "txtPedido1": pedido1,
            "txtCita1": cita1,
            "txtLogistica1": logistica1
          },
          url: uri1+'controller/busquedaEventosC.php',
          type: 'POST',
          beforeSend: function(){ },
          success: function (response){
            $('.salida').html(response);

          },
          error: function(){
            alert("error");
          } 


        });
     


      });


    </script>
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="../vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="../js/custom-script.js"></script>
  </body>
</html>