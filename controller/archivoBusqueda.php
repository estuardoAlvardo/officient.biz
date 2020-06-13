<?php 

session_start();

include '../conexion/conexion.php';

@$evento=$_POST['evento'];

switch ($evento) {
	case 1:
		# insertar
		    $q3 = ("SELECT * FROM archivo where idEmpresa=:idEmpresa and idRequisito=:idRequisito ");
                      $registroArchivo1 = $dbConn->prepare($q3);
                      $registroArchivo1->bindParam(':idEmpresa', $_POST['idEmpresa'], PDO::PARAM_INT);
                      $registroArchivo1->bindParam(':idRequisito', $_POST['idRequisito'], PDO::PARAM_INT);
                      $registroArchivo1->execute();
                      $encontramos=$registroArchivo1->rowCount();

                      while ($row2=$registroArchivo1->fetch(PDO::FETCH_ASSOC)){

                      	$_SESSION['idArchivo1']=$row2['idArchivo'];
                      }


                      if($encontramos==0){
                      $estado=1;	
                      $q3 = ("INSERT INTO archivo(idEmpresa, idRequisito, estado) VALUES (:idEmpresa, :idRequisito, :estado)");
                      $insertarArchivo = $dbConn->prepare($q3);
                      $insertarArchivo->bindParam(':idEmpresa', $_POST['idEmpresa'], PDO::PARAM_INT);
                      $insertarArchivo->bindParam(':idRequisito', $_POST['idRequisito'], PDO::PARAM_INT);
                      $insertarArchivo->bindParam(':estado', $estado, PDO::PARAM_INT);
                      $insertarArchivo->execute();


                      }else{

                      if($_POST['estado1']=='true'){
                      	$estado=1;
                      }else if($_POST['estado1']=='false'){
                      	$estado=0;
                      }


                       $q32 = ("UPDATE archivo SET estado=:estado WHERE idArchivo=:idArchivo");
                      $actualizarDatos = $dbConn->prepare($q32);
                      $actualizarDatos->bindParam(':estado', $estado, PDO::PARAM_INT);
                      $actualizarDatos->bindParam(':idArchivo', $_SESSION['idArchivo1'], PDO::PARAM_INT);
                      $actualizarDatos->execute();	



                      }



		break;
	
	default:


	if (isset($_POST['txtBuscar']) and !empty($_POST['txtBuscar'])) {

			$nombreBuscar="%".$_POST['txtBuscar']."%";

			$q41 = ("SELECT * FROM empresa where nombreCliente LIKE :buscar");
            $buscarClientes1 = $dbConn->prepare($q41);
            $buscarClientes1->bindParam(':buscar', $nombreBuscar, PDO::PARAM_STR); 
            $buscarClientes1->execute();


            while ($row11=$buscarClientes1->fetch(PDO::FETCH_ASSOC)){ 

                      $q22 = ("SELECT * FROM requisitosOficina");
                      $buscarRequisitos2 = $dbConn->prepare($q22);
                      $buscarRequisitos2->execute();
                      $cantidadRequisitos2=$buscarRequisitos2->rowCount();
                      @$cont2+=1;


         echo '
         <div class="row">	
         <div class="col s12 m4 l4">
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header blue darken-3">
                      <h4 class="task-card-title">'.substr($row11['razonSocial'],0,15).'</h4>
                      <p class="task-card-date">'.$row11['nombreCliente'].'</p>
                      <p class="task-card-date">Archivo</p>

                    </li>
                    ';

           while ($row22=$buscarRequisitos2->fetch(PDO::FETCH_ASSOC)){

         $q322 = ("SELECT * FROM archivo where idEmpresa=:idEmpresa and idRequisito=:idRequisito and estado=1 ");
                      $registroArchivo11 = $dbConn->prepare($q322);
                      $registroArchivo11->bindParam(':idEmpresa', $row11['idempresa'], PDO::PARAM_INT);
                      $registroArchivo11->bindParam(':idRequisito', $row22['idRequisito'], PDO::PARAM_INT);
                      $registroArchivo11->execute();
                      $encontramos11=$registroArchivo11->rowCount();

                      if($encontramos11>=1){
                        $checkbox1='checked';

                      }else{
                        $checkbox1='';

                      }

                   $variableN=$row22['requisito'].$row11['idempresa'];

            echo '<li class="collection-item dismissable">
                      <input type="checkbox" id="'.$variableN.'" name=" task'.$row11['idempresa'].'"'.$checkbox1.' onclick="activarDesactivar1('.$row11['idempresa'].','.$row22['idRequisito'].',this.checked);" />
                      <label for="'.$variableN.'">'.$row22['requisito'].'</label>
                    </li>
                    <p id="cantidadEmpresa1" style="display: none;">'.$cont2.'</p> </u>';

             echo '<script type="text/javascript">
                        var cantidad = $("cantidadEmpresa1").text();

                      function activarDesactivar1(idEmpresa,idRequisito,estado){
                        //alert("idEmpresa = "+idEmpresa+" Id Requisito="+idRequisito+"Estado ="+estado);

                          ///funcion para insertar datos
                            var idEmpresa=idEmpresa;
                            var idRequi= idRequisito;
                            var estadoE=estado;
                            var evento=1;
                           
                               $.ajax({
                              type: "POST",
                              url: uri1+"controller/archivoBusqueda.php",
                              data: {
                                "idEmpresa": idEmpresa,
                                "idRequisito": idRequisito,
                                "estado1": estadoE,
                                "evento": evento
                              },
                              success:function(r2){
                                M.toast({html: "Se ha actualizado de manera correcta :)", classes: "rounded"});

                                
                              }

                            });


                      }

                    </script>';


}

         echo '</div>';           


}


}else{
	echo '<di class="row"><div class="col s1 m1 l1">
	</div><div class="chip">
    No hay busqueda!
    <i class="close material-icons">close</i>
  	</div>
  </div>';
}


		break;
}


?>