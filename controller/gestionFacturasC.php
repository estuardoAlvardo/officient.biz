<?php 

session_start();

include '../conexion/conexion.php';



if(@$_POST['eventoEjecutar']==2){

	$anular=0;
	$q2 = ("UPDATE factura SET idCliente=:idCliente where numeroFactura=:numeroFactura");
            $anularFactura = $dbConn->prepare($q2);
            $anularFactura->bindParam(':idCliente', $anular, PDO::PARAM_INT);
            $anularFactura->bindParam(':numeroFactura', $_POST['idFactura'], PDO::PARAM_INT);  
            $anularFactura->execute();
}


if(@$_POST['eventoEjecutar']==3){
  
  $q2 = ("UPDATE factura SET idCliente=:idCliente, codigoMes=:codigoMes  where numeroFactura=:numeroFactura");
            $actualizarFactura = $dbConn->prepare($q2);
            $actualizarFactura->bindParam(':idCliente', $_POST['txtCodigoCliente'], PDO::PARAM_INT);
            $actualizarFactura->bindParam(':codigoMes', $_POST['txtCodigoMes'], PDO::PARAM_INT);
            $actualizarFactura->bindParam(':numeroFactura', $_POST['txtNoFactura'], PDO::PARAM_INT);  
            $actualizarFactura->execute();

}






if (isset($_POST['txtBuscar2']) and !empty($_POST['txtBuscar2'])) {

	$nombreBuscar=$_POST['txtBuscar2'];

$q1 = ("SELECT * FROM factura where numeroFactura=:buscar");
            $buscarFactura = $dbConn->prepare($q1);
            $buscarFactura->bindParam(':buscar', $nombreBuscar, PDO::PARAM_INT); 
            $buscarFactura->execute();



while ($row1=$buscarFactura->fetch(PDO::FETCH_ASSOC)){

//anulado 0
//cf      1

$row2['nit']='sin datos';
$row2['razonSocial']='sin datos';

if($row1['idCliente']==0){

echo '<div class="col s1 m1 l1"></div>
      <div class="col xl9 m8 s12 l9">
      <div class="card">
        <div class="card-content invoice-print-area">
          <!-- header section -->
          <div class="row invoice-date-number">
            <div class="col xl4 s12">
              <span class="invoice-number mr-1">Factura#</span>
              <span>'.$row1['numeroFactura'].'</span>
            </div>
            <div class="col xl8 s12">
              <div class="invoice-date display-flex align-items-center flex-wrap">
                <div class="mr-3" style="text-align: right;">
                  <small>Fecha :</small>
                  <span>'.$row1['fechaFactura'].'</span>
                </div>

              </div>
            </div>
          </div>
          <!-- logo and title -->
          <div class="row mt-3 invoice-logo-title">
            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
              <img src="../img/logo.png" alt="logo" height="100" width="100">
            </div>
            <div class="col m6 s12 pull-m6">
              <h4 class="indigo-text">Officient S.A</h4>
              <span>Oficinas Virtuales</span>
            </div>

          </div>
           <h5>Nombre Cliente: <span style="font-size:15pt;">'.@$row2['razonSocial'].'</span></h5>
           <h5>Nit: <span style="font-size:15pt;">'.@$row2['nit'].'</span></h5>
          <div class="divider mb-3 mt-3"></div>

          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col m6 s12">
              <h6 class="invoice-from">Descripción de la factura:</h6>
              <div class="invoice-address">
                <span>Servicios Prestados oficinas virtuales.</span>
              </div>
             
              
             
            </div>
            
          </div>
        
          <!-- product details table-->
          <div class="invoice-product-details">
          
          </div>
          <!-- invoice subtotal -->
          <div class="divider mt-3 mb-3"></div>
          <div class="invoice-subtotal">
            <div class="row">
              <div class="col m5 s12">
                <p>Gracias por su confianza.</p>
              </div>
              <div class="col xl4 m7 s12 offset-xl3">
                <ul>
                  <li class="divider mt-2 mb-2"></li>
                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">Total Factura</span>
                    <h6 class="invoice-subtotal-value"><span style="font-size:18pt;">Q<span>. '.$row1['montoFactura'].'</h6>
                  </li>
                  <li class="display-flex justify-content-between">
                </ul>
              </div>

            </div>
          </div>
            <div class="divActividades" style="">
                  <h6 style="text-align: center;">Modificar Facturación</h6>
                <div class="switch">
                <div class="chip red darken-3" style="color:white;" >ANULADA</div><br>
                    

                     <a class="waves-effect waves-light btn modal-trigger" href="#modal1" onclick="actualizarFactura('.$row1['numeroFactura'].',\''.$row1['fechaFactura'].'\',\''.$row2['razonSocial'].'\',\''.$row2['nit'].'\',\''.$row1['montoFactura'].'\','.$row1['codigoMes'].','.$row1['idCliente'].');">Actualizar Factura</a>
              </div>
        </div>
      </div>
    </div>';

}else{





$q2 = ("SELECT idempresa,nit,razonSocial FROM empresa where idempresa=:idempresa");
            $buscarEmpresa = $dbConn->prepare($q2);
            $buscarEmpresa->bindParam(':idempresa', $row1['idCliente'], PDO::PARAM_INT); 
            $buscarEmpresa->execute();

while ($row2=$buscarEmpresa->fetch(PDO::FETCH_ASSOC)){


echo '<div class="col s1 m1 l1"></div>
      <div class="col xl9 m8 s12 l9">
      <div class="card">
        <div class="card-content invoice-print-area">
          <!-- header section -->
          <div class="row invoice-date-number">
            <div class="col xl4 s12">
              <span class="invoice-number mr-1">Factura#</span>
              <span>'.$row1['numeroFactura'].'</span>
            </div>
            <div class="col xl8 s12">
              <div class="invoice-date display-flex align-items-center flex-wrap">
                <div class="mr-3" style="text-align: right;">
                  <small>Fecha :</small>
                  <span>'.$row1['fechaFactura'].'</span>
                </div>

              </div>
            </div>
          </div>
          <!-- logo and title -->
          <div class="row mt-3 invoice-logo-title">
            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
              <img src="../img/logo.png" alt="logo" height="100" width="100">
            </div>
            <div class="col m6 s12 pull-m6">
              <h4 class="indigo-text">Officient S.A</h4>
              <span>Oficinas Virtuales</span>
            </div>

          </div>
           <h5>Nombre Cliente: <span style="font-size:15pt;">'.$row2['razonSocial'].'</span></h5>
           <h5>Nit: <span style="font-size:15pt;">'.$row2['nit'].'</span></h5>
          <div class="divider mb-3 mt-3"></div>

          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col m6 s12">
              <h6 class="invoice-from">Descripción de la factura:</h6>
              <div class="invoice-address">
                <span>Servicios Prestados oficinas virtuales.</span>
              </div>
             
              
             
            </div>
            
          </div>
        
          <!-- product details table-->
          <div class="invoice-product-details">
          
          </div>
          <!-- invoice subtotal -->
          <div class="divider mt-3 mb-3"></div>
          <div class="invoice-subtotal">
            <div class="row">
              <div class="col m5 s12">
                <p>Gracias por su confianza.</p>
              </div>
              <div class="col xl4 m7 s12 offset-xl3">
                <ul>
                 
                  
                  
                  <li class="divider mt-2 mb-2"></li>
                  <li class="display-flex justify-content-between">
                    <span class="invoice-subtotal-title">Total Factura</span>
                    <h6 class="invoice-subtotal-value"><span style="font-size:18pt;">Q<span>. '.$row1['montoFactura'].'</h6>
                  </li>
                  <li class="display-flex justify-content-between">
                </ul>
              </div>

            </div>
          </div>
            <div class="divActividades" style="">
                  <h6 style="text-align: center;">Modificar Facturación</h6>
                <div class="switch">
                    <label>
                      Anular
                      <input type="checkbox" checked onclick="anularFactura('.$row1['numeroFactura'].','.$row2['idempresa'].',this.checked)">
                      <span class="lever"></span>
                      Activa
                    </label><br><br>

                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1" onclick="actualizarFactura('.$row1['numeroFactura'].',\''.$row1['fechaFactura'].'\',\''.$row2['razonSocial'].'\',\''.$row2['nit'].'\',\''.$row1['montoFactura'].'\','.$row1['codigoMes'].','.$row1['idCliente'].');">Actualizar Factura</a>
                  </div>
              </div>
        </div>
      </div>
    </div>
';

}

}
}

}else{

	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No ha realizado ninguna búsqueda!! :) 
    <i class="close material-icons">close</i>
  	</div>
  </div>';


}


?>