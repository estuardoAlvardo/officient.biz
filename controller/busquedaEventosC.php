<?php

session_start();

include '../conexion/conexion.php';

if($_POST['txtPedido1']==1){




$queryPerdido = ("SELECT * FROM pedido where idRegistro=:idRegistro");
$buscarPedidos = $dbConn->prepare($queryPerdido);
$buscarPedidos->bindParam(':idRegistro', $_POST['txtBuscar'], PDO::PARAM_INT); 
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

  }


  if($registroPedido['estadoCompleto']==1){

    $completadoM='checked';

  }


while ($registroEmpresas=$buscarEmpresa->fetch(PDO::FETCH_ASSOC)){
      while ($registroUsuario3=$buscarUsuario3->fetch(PDO::FETCH_ASSOC)){


      $queryObservacion2 = ("SELECT * FROM observaciones where idEvento=:idEvento");
      $buscarObservacion2 = $dbConn->prepare($queryObservacion2);
      $buscarObservacion2->bindParam(':idEvento', $registroPedido['idRegistro'], PDO::PARAM_INT); 
      $buscarObservacion2->execute();
      $hayComentarios2=$buscarObservacion2->rowCount();



echo ' <div class="col s12 m12 l12">
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
                  
                  <p class="col s3 m3 l3" style=" text-align: center;">'.$registroPedido['fechaRegistro'].'</p>
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text">'.$registroUsuario3['nombre'].'</samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt">'.$registroPedido['idRegistro'].'</span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Dirección Empresa:<strong>'.$registroPedido['direccionEntrega'].'</strong></p>
                  <p>Contacto Entrega: <strong>'.$registroPedido['contactoEntrega'].'</strong> </p>
                  <p>Nombre a facturar:<strong>'.$registroPedido['nombreFactura'].'</strong> </p>
                  <p>Nit:  <strong>'.$registroPedido['nit'].'</strong> </p>
                  <p>Pedido:  <strong>'.$registroPedido['pedido'].'</strong> </p>
                  <p>Detalle:  <strong>'.$registroPedido['detalle'].'</strong> </p>
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
                        <input type="checkbox"'. @$procesoPedido.' onclick="procesoDesproceso('.$registroPedido['idRegistro'].',this.checked);" />
                        <span>En proceso '.$registroPedido['fechaProceso'].'</span>
                      </label>
                    </p>
                 
                    <p>
                      <label>
                        <input type="checkbox" '. @$completadoM .' onclick="completoIncompleto('.$registroPedido['idRegistro'].',this.checked );" />
                        <span>Finalizado '.$registroPedido['fechaCompleto'].'</span>
                      </label>
                    </p>


                </div>


                <script type="text/javascript">
                        function procesoDesproceso(idModificar,estado){
                          evento=3;
                          //alert("id Modificar: "+idModificar+" Estado del check: "+estado+"noEvento "+evento+" Uri"+uri1);
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
                                M.toast({html: "Evento en proceso :)", classes: "rounded"});
                                }else{
                                   M.toast({html: "Se actualizo sin proceso :)", classes: "rounded"});
                                }

                                
                              }

                            });

                        }

                         function completoIncompleto(idModificar,estado){
                          evento=4;
                          //alert("id Modificar: "+idModificar+"Estado del check: "+estado+" noEvento "+evento+" Uri"+uri1);
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
                                M.toast({html: "Se completo el evento de manera correcta :)", classes: "rounded"});
                                }else{
                                   M.toast({html: "Se actualizo no se ha completado :)", classes: "rounded"});
                                }

                                
                              }

                            });

                        }

                    </script>
                                     <div class="col s9 m9 l9 chip">El evento pertenece a:  <strong>'.$registroEmpresas['razonSocial'].'</strong></div>

                    </div>

                  <form id="formularioComentario2" class="col s12 m12 l12">
                        
                    <div class="row">
                      <div class="input-field col s10 m10 l10">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="txtObservacion" id="observacion2'.$registroPedido['idRegistro'].'"   required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"  onclick="chatObservacion(2,1,'.$_SESSION['idCliente'].','.$registroPedido['idRegistro'].');"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>';

       if($hayComentarios2==0){

       	echo '<h6 style="text-align: center;">No hay comentarios!!</h6>';

       	} while ($registroObservacion2=$buscarObservacion2->fetch(PDO::FETCH_ASSOC)){

                  $usuarioComentario1 = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC1 = $dbConn->prepare($usuarioComentario1);
                  $buscarUsuarioC1->bindParam(':idUsuario', $registroObservacion2['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC1->execute();

                  while ($usuarioComentario1R=$buscarUsuarioC1->fetch(PDO::FETCH_ASSOC)){

    if($usuarioComentario1R['idPrivilegios']==1){
        $avatarObservacion=  ' <img src="../img/avatar/avatar-13.png" alt="Contact Person">';
      }elseif($usuarioComentario1R['idPrivilegios']==2){
        $avatarObservacion=  ' <img src="../img/personCallin.png" alt="Contact Person">';

      }elseif($usuarioComentario1R['idPrivilegios']>=3){
        $avatarObservacion= '<img src="../img/cliente.png" alt="Contact Person">';

      }


         echo ' <div class=" col s12 m12 l12" id="comentarioVer112">
                   <div class="chip green lighten-2">'.$avatarObservacion.'
                    '.$usuarioComentario1R['nombre'].' '.$usuarioComentario1R['apellido'].'
                  </div>
                  <p class="gray-text">'. $registroObservacion2['observacion'].' </p>
                  <p style="text-align: right;"><span>'.$registroObservacion2['fechaHora'].'</span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>';
}}

echo '</div>       
            </div>
        </div>';


  }} } 








}else if($_POST['txtLogistica1']==1){



//echo 'encontre logistica y el id que busco es '. $_POST['txtBuscar'];

       


$queryLogistica = ("SELECT * FROM logistica where idRegistro=:idRegistro");
$buscarLogistica = $dbConn->prepare($queryLogistica);
$buscarLogistica->bindParam(':idRegistro', $_POST['txtBuscar'], PDO::PARAM_INT);
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





echo '<div class="col s12 m12 l12">
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
                  
                  <p class="col s3 m3 l3" style=" text-align: center;">'.$registroLogistica['fechaRegistro'].'</p>
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text">'.$registroUsuario4['nombre'].'</samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt">'.$registroLogistica['idRegistro'].'</span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Dirección Recolección: <strong>'.$registroLogistica['direccionRecoleccion'].'</strong></p>
                  <p>Contacto Recolección: <strong>'.$registroLogistica['contactoRecoleccion'].'</strong> </p>
                  <p>Horario: <strong>'.$registroLogistica['horario'].'</strong> </p>
                  <p>Dirección Entrega: <strong>'.$registroLogistica['direccionEntrega'].'</strong> </p>
                  <p>Contacto Entrega:  <strong>'. $registroLogistica['contactoEntrega'].'</strong> </p>
                  <p>Detalle:  <strong>'.$registroLogistica['detalle'].'</strong> </p>

                </div>

                <div class="col s5 m5 l5">
                 
                    <p>Estatus Evento</p>
                    <p>
                      <label>
                        <input type="checkbox" checked="checked"  disabled />
                        <span>'.$iniciadoLogistica.'</span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input type="checkbox" '.$procesoLogistica .' onclick="logisticaProceso('.$registroLogistica['idRegistro'].',this.checked);" />
                        <span>En proceso '.$registroLogistica['fechaProceso'].'</span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input type="checkbox" '.$completadoLogistica.' onclick="logisticaCompleto('.$registroLogistica['idRegistro'].',this.checked);" />
                        <span>Finalizado '.$registroLogistica['fechaProceso'].'</span>
                      </label>
                    </p>


                </div>

                <div class="col s9 m9 l9 chip">El evento pertenece a:  <strong>'.$registroEmpresas3['razonSocial'].'</strong></div>
                 <script type="text/javascript">
                        function logisticaProceso(idModificar,estado){
                          evento=5;
                          //alert("id Modificar: "+idModificar+" Estado del check: "+estado+" noEvento "+evento+" Uri"+uri1);
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
                                M.toast({html: "Evento en proceso :)", classes: "rounded"});
                                }else{
                                   M.toast({html: "Se actualizo sin proceso :), classes: "rounded"});
                                }

                                
                              }

                            });

                        }

                         function logisticaCompleto(idModificar,estado){
                          evento=6;
                          //alert("id Modificar: "+idModificar+" Estado del check: "+estado+" noEvento "+evento+" Uri"+uri1);
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
                                M.toast({html: "Se completo el evento de manera correcta :)", classes: "rounded"});
                                }else{
                                   M.toast({html: "Se actualizo no se ha completado :)", classes: "rounded"});
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
                        <input type="text" name="txtObservacion" id="observacion3'.$registroLogistica['idRegistro'].'"  required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"   onclick="chatObservacion(3,1,'.$_SESSION['idCliente'].','.$registroLogistica['idRegistro'].');"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>';

         if($hayComentarios4==0){


         	echo '<h6 style="text-align: center;">No hay comentarios!!</h6>';


         	 } while ($registroObservacion4=$buscarObservacion4->fetch(PDO::FETCH_ASSOC)){

                  $usuarioComentario4 = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC4 = $dbConn->prepare($usuarioComentario4);
                  $buscarUsuarioC4->bindParam(':idUsuario', $registroObservacion4['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC4->execute();

                  while ($usuarioComentarioR4=$buscarUsuarioC4->fetch(PDO::FETCH_ASSOC)){

      if($usuarioComentarioR4['idPrivilegios']==1){
        $avatarObservacion=  ' <img src="../img/avatar/avatar-13.png" alt="Contact Person">';
      }elseif($usuarioComentarioR4['idPrivilegios']==2){
        $avatarObservacion=  ' <img src="../img/personCallin.png" alt="Contact Person">';

      }elseif($usuarioComentarioR4['idPrivilegios']>=3){
        $avatarObservacion= '<img src="../img/cliente.png" alt="Contact Person">';

      }

        echo '<div class=" col s12 m12 l12" id="comentarioVer3'.$registroLogistica['idRegistro'].'">
                   <div class="chip green lighten-2">'.$avatarObservacion.'
                    '.$usuarioComentarioR4['nombre'].' '.$usuarioComentarioR4['apellido'].'
                  </div>
                  <p class="gray-text">'.$registroObservacion4['observacion'].'</p>
                  <p style="text-align: right;"><span>'.$registroObservacion4['fechaHora'].'</span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>';


 }} 

 echo '</div>       
            </div>
        </div>
      </div>
      </div>';


      }}}
















}else if($_POST['txtCita1']==1){



if(empty( $_POST['txtBuscar'])){
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    Aun no ha ingresado codigo del evento!
    <i class="close material-icons">close</i>
  	</div>
  </div>';

}else{

          $queryCita = ("SELECT * FROM calendar where idRegistro=:idRegistro");
          $buscarCita = $dbConn->prepare($queryCita);
          $buscarCita->bindParam(':idRegistro', $_POST['txtBuscar'], PDO::PARAM_INT); 
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



   echo '<div class="col s5 m12 l12">
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
                  <p class="col s3 m3 l3" style=" text-align: right;">Operador: <samp class="chip indigo darken-4 white-text">'.$registroUsuario['nombre'].'</samp></p>
                  <p class="col s3 m3 l3" style=" text-align: right;">No Evento: <span style="font-size: 14pt">'.$registroCalendar['idRegistro'].'</span></p>

                  <div class="datosCliente col s5 m5 l5">
                  <p>Nombre Empresa:<strong>'.$registroEmpresa2['razonSocial'].'</strong></p>
                  <p>Evento: <strong>'.$registroCalendar['tituloEvento'].'</strong></p>
                  <p>Descripción evento: <strong>'.$registroCalendar['descripcionEvento'].'</strong> </p>
                  <p>Fecha Inicio: <strong>'.$registroCalendar['fechaInicio'].'</strong> </p>
                  <p>Fecha fin: <strong>'.$registroCalendar['fechaFin'].'</strong> </p>
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
                        <input type="checkbox"'.$checkedConfirmado.' onclick="confirmarDesconfirmar('.$registroCalendar["idRegistro"].',this.checked)"/>
                        <span>Confirmado :'.$registroCalendar['fechaConfirmar'].'</span>
                      </label>
                    </p>
                      
                    </form>

                                       <script type="text/javascript">
                        function confirmarDesconfirmar(idModificar,estado){
                          evento=2;
                          //alert("id Modificar: "+idModificar+"Estado del check: "+estado+" noEvento "+evento+ "Uri" +uri1);
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
                                M.toast({html: "Se ha Confirmado cita de manera correcta :)", classes: "rounded"});
                                }else{
                                   M.toast({html: "Se ha Desconfirmado cita de manera correcta :)", classes: "rounded"});
                                }

                                
                              }

                            });

                        }

                    </script>

                    </div>
                    <div class="col s9 m9 l9 chip">El evento pertenece a:  <strong>'.$registroEmpresa2['razonSocial'].'</strong></div>
            
                </div>


                  <form id="formularioComentario" class="col s12 m12 l12">
                    <input type="text" name="txtTipoEvento" value="1" style="display: none;">

                    <input type="text" name="txtEvento" value="1" style="display: none;">
                    <input type="text" name="txtIdUsuario" value="'.$_SESSION['idCliente'].'" style="display: none;">
                    <input type="text" name="txtIdEvento" value="'.$registroCalendar['idRegistro'].'" style="display:none;">
                    <div class="row">
                      <div class="input-field col s10 m10 l10">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="txtObservacion" id="observacion1'.$registroCalendar['idRegistro'].'"  required></input>
                        <label for="icon_prefix2">Hacer observación</label>
                      </div>
                      <div class="col s2 m2 l2">
                        <a class="btn-floating btn-large waves-effect"  onclick="chatObservacion(1,1,'.$_SESSION['idCliente'].','.$registroCalendar['idRegistro'].');"><i class="material-icons">send</i></a>
                      </div>
                    </div>
                  </form>';
           if($hayComentarios1==0){ 

           	echo '<h6 style="text-align: center;">No hay comentarios!!</h6>';


          } while ($registroObservacion=$buscarObservacion1->fetch(PDO::FETCH_ASSOC)){

          	 $usuarioComentario = ("SELECT * FROM usuario where idCliente=:idUsuario");
                  $buscarUsuarioC = $dbConn->prepare($usuarioComentario);
                  $buscarUsuarioC->bindParam(':idUsuario', $registroObservacion['idUsuario'], PDO::PARAM_INT); 
                  $buscarUsuarioC->execute();

                  while ($usuarioComentario=$buscarUsuarioC->fetch(PDO::FETCH_ASSOC)){

    if($usuarioComentario['idPrivilegios']==1){
        $avatarObservacion=  ' <img src="../img/avatar/avatar-13.png" alt="Contact Person">';
      }elseif($usuarioComentario['idPrivilegios']==2){
        $avatarObservacion=  ' <img src="../img/personCallin.png" alt="Contact Person">';

      }elseif($usuarioComentario['idPrivilegios']>=3){
        $avatarObservacion= '<img src="../img/cliente.png" alt="Contact Person">';

      }



               echo '<div class=" col s12 m12 l12" id="comentarioVer111">
                   <div class="chip green lighten-2">'.$avatarObservacion.'
                   '.$usuarioComentario['nombre'].' '.$usuarioComentario['apellido'].'</div>
                  <p class="gray-text">'.$registroObservacion['observacion'].'</p>
                  <p style="text-align: right;"><span>'.$registroObservacion['fechaHora'].'</span></p>
                  <div class="progress">
                <div class="determinate indigo darken-4" style="width: 100%"></div>
              </div>
                  
                </div>';

} }

echo '</div>       
            </div>
        </div>';

        } } }




}









}else{
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    Debes elegir el tipo de evento a buscar!
    <i class="close material-icons">close</i>
  	</div>
  </div>';
}	




?>