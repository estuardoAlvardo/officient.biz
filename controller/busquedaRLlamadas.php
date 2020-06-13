<?php
session_start();

include '../conexion/conexion.php';

if (isset($_POST['txtBuscar']) and !empty($_POST['txtBuscar'])) {

	$nombreBuscar="%".$_POST['txtBuscar']."%";

$queryN = ("SELECT * FROM registroLlamadas where fechaRegistro LIKE :buscar");
           $buscarRegistroLlamadas = $dbConn->prepare($queryN);
           $buscarRegistroLlamadas->bindParam(':buscar', $nombreBuscar, PDO::PARAM_STR); 
			$buscarRegistroLlamadas->execute();


while ($registroLlamadas=$buscarRegistroLlamadas->fetch(PDO::FETCH_ASSOC)){

$queryN1 = ("SELECT * FROM empresa where idempresa=:idempresa");
    $registroEmpresa = $dbConn->prepare($queryN1);
    $registroEmpresa->bindParam(':idempresa', $registroLlamadas['idEmpresa'], PDO::PARAM_INT); 
    $registroEmpresa->execute();

    $queryN1 = ("SELECT * FROM usuario where idCliente=:idUsuario");
    $buscarUsuario= $dbConn->prepare($queryN1);
    $buscarUsuario->bindParam(':idUsuario', $registroLlamadas['idUsuario'], PDO::PARAM_INT); 
    $buscarUsuario->execute();


    while ($registroEmpresas=$registroEmpresa->fetch(PDO::FETCH_ASSOC)){

          while ($registroUsuario=$buscarUsuario->fetch(PDO::FETCH_ASSOC)){

if(empty($registroLlamadas['telefono'])){ $telefonoRegistro= 'No se registro número';}else{ $telefonoRegistro= $registroLlamadas['telefono'];}

if(empty($registroLlamadas['correoElectronico'])){ $correoRegistro= 'No se registro correo';}else{ $correoRegistro=  $registroLlamadas['correoElectronico'];}

if($registroLlamadas['tipoLlamada']==1){ $tipoLlamada= 'Trasnferencia de llamada';}else if($registroLlamadas['tipoLlamada']==2){ $tipoLlamada= 'Consulta en llamada';}else if($registroLlamadas['tipoLlamada']==0){$tipoLlamada='Se genero evento en llamada' ;}

if(empty($registroLlamadas['descripcionLlamada'])){ $descripcionLlamada= 'No se registro descripción';}else{ $descripcionLlamada= $registroLlamadas['descripcionLlamada'];}

          	echo '    <div class="card col s12 m12 l12">
      <div class="row">
        <div class="col s2 m2 l2">
          <img src="../img/support.png" style="background-size: cover;
                   height: 100%;
                   width: 100% ;
                   text-align: center; padding-top: 10px;">
        </div>
        <div class="col s10 m10 l10">
          <div class="row">
            <p class="chip col s4 m4 l4 indigo darken-4" style="color: white;">'.$registroEmpresas['razonSocial'].'</p>
            <p class="col s3 m3 l3 chip">Operador:'.$registroUsuario['nombre'].'</p>
            <p class="col s2 m2 l2 chip">'.$registroLlamadas['fechaRegistro'].''.$registroLlamadas['horaRegistro'].'</p>
            <p class="col s2 m2 l2 chip">Registro #:'.$registroLlamadas['idRegistro'].'</p>
          </div>
        
        <div class="row">
          <p>Persona que llama: <strong>'.$registroLlamadas['personaLlama'].'</strong></p>
          <p>Téfeno a transferir: <strong>'.$telefonoRegistro.'</strong></p>
          <p>Correo de llamada: <strong>'.$correoRegistro.'</strong></p>
          <p>Tipo llamada: <strong>'.$tipoLlamada.'</strong></p>
          <p>Descripción llamada: <strong>'.$descripcionLlamada.'</strong></p>
          
        </div>
         
        </div>
      </div>
    </div>';



 }}}
}else{

		echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No se ha encontrado nada que corresponda a su busqueda!
    <i class="close material-icons">close</i>
  	</div>
  </div>';

}


 ?>