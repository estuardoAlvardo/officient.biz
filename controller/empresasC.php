<?php 


session_start();
 //phpinfo();
include '../conexion/conexion.php';

@$evento=$_POST['accionEjecutar'];
 
	switch ($evento) {
		case 1:
			# insertar

			$q1 = ("INSERT INTO empresa (razonSocial, direccionFiscal, nit, nombreCliente, telefono, pbx,fechaCorte,periodo,deposito,estado,paqueteAsignado) VALUES(:razonSocial, :direccionFiscal, :nit, :nombreCliente, :telefono, :pbx,:fechaCorte,:periodo,:deposito,:estado,:paqueteAsignado)");
			$insertarEmpresa = $dbConn->prepare($q1);
			$insertarEmpresa->bindParam(':razonSocial', $_POST['txtRazonSocial'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':direccionFiscal', $_POST['txtDireccionFiscal'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':nit', $_POST['txtNit'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':nombreCliente', $_POST['txtNombreCliente'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':telefono', $_POST['txtTelefono'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':pbx', $_POST['txtPbx'], PDO::PARAM_STR); 
			$insertarEmpresa->bindParam(':fechaCorte',$_POST['txtFechaCorte'] , PDO::PARAM_STR);
			$insertarEmpresa->bindParam(':periodo',$_POST['txtPeriodo'] , PDO::PARAM_INT);
			$insertarEmpresa->bindParam(':deposito',$_POST['txtDeposito'] , PDO::PARAM_STR);
			$insertarEmpresa->bindParam(':paqueteAsignado',$_POST['txtPaquete'] , PDO::PARAM_STR);
			$insertarEmpresa->bindParam(':estado',$_POST['txtEstado'] , PDO::PARAM_INT);
			$insertarEmpresa->execute();



			break;

	    case 2:


			$q1 = ("UPDATE empresa SET razonSocial=:razonSocial, direccionFiscal=:direccionFiscal, nit=:nit, nombreCliente=:nombreCliente, telefono=:telefono, pbx=:pbx, fechaCorte=:fechaCorte, periodo=:periodo, deposito=:deposito, estado=:estado, paqueteAsignado=:paqueteAsignado where idempresa=:idempresa");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':razonSocial', $_POST['modRazonSocial'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':direccionFiscal', $_POST['modDireccionFiscal'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':nit', $_POST['modNit'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':nombreCliente', $_POST['modNombreCliente'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':telefono', $_POST['modTelefono'], PDO::PARAM_STR);
			$actualizarRegsitro->bindParam(':pbx', $_POST['modPbx'], PDO::PARAM_INT); 
			$actualizarRegsitro->bindParam(':fechaCorte', $_POST['modFechaCorte'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':periodo', $_POST['modPeriodo'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':deposito', $_POST['modDeposito'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':estado', $_POST['modEstado'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':paqueteAsignado', $_POST['modPaquete'], PDO::PARAM_INT); 
			$actualizarRegsitro->bindParam(':idempresa', $_POST['idActualizar'], PDO::PARAM_INT); 
			$actualizarRegsitro->execute();


			break;
		case 3:
	# Eliminar
	$estado=3; //cambiamos el estatus o bandera para eliminar 1=activo,2=ocacional,3=suspendido,4=fraude,5=inactivo

	$q1 = ("UPDATE empresa SET estado=:estado where idempresa=:idempresa");
			$eliminarRegistro = $dbConn->prepare($q1);
			$eliminarRegistro->bindParam(':estado', $estado, PDO::PARAM_INT); 
			$eliminarRegistro->bindParam(':idempresa', $_POST['idEliminar'], PDO::PARAM_INT); 
			$eliminarRegistro->execute();
			

			break;


		
		default:
		
			//consultamos clientes 
			$q1 = ("SELECT * FROM empresa order by estado asc");
			      $buscarEmpresa = $dbConn->prepare($q1);
			      $buscarEmpresa->execute();




echo '<table class="responsive-table striped centered">
                    <thead>
                      <tr>
                          
                          <th>Razón Social</th>
                          <th>Dirección</th>
                          <th>Nit</th>
                          <th>Cliente</th>
                          <th>Teléfono</th>
                          <th>Pbx</th>
                          <th>Fecha Corte</th>
                          <th>Periodo</th>
                          <th>Deposito Garantía</th>
                          <th>Estado</th>
                          <th>Paquete</th>
                          
                          
                      </tr>
                    </thead>
                    <tbody>';


while ($row1=$buscarEmpresa->fetch(PDO::FETCH_ASSOC)){

    $razonSocial="razonSocial".$row1["idempresa"];
	$direccionFiscal="direccionFiscal".$row1["idempresa"];
	$nit="nit".$row1["idempresa"];
	$nombreCliente="nombreCliente".$row1["idempresa"];
	$telefono="telefono".$row1["idempresa"];
	$pbx="pbx".$row1["idempresa"];
	$fechaCorte="fechaCorte".$row1["idempresa"];
	$periodo2="periodo".$row1["idempresa"];
	$deposito="deposito".$row1["idempresa"];
	$estado="estado".$row1["idempresa"];
	

//manejamos estilos para diferentes estados 1=activo,2=ocacional,3=suspendido,4=fraude,5=inactivo
	switch ($row1['estado']) {

	    case 2:
	    	$estadoEmpresa='<div class="chip  light-blue lighten-1" style="color:black;">Ocacional</div>';	
						
			break;
		case 3:
			$estadoEmpresa='<div class="chip yellow lighten-1" style="color:black;">Suspendido</div>';
			break;
		case 4:
			$estadoEmpresa='<div class="chip orange" style="color:black;">Fraude</div>';
			break;
		
		case 5:
			$estadoEmpresa='<div class="chip deep-orange accent-4" style="color:white;">Inactivo</div>';			
			break;
		
		default:
			$estadoEmpresa='<div class="chip green accent-3" style="color:black;">Activo</div>';				
		break;
	}


switch ($row1["periodo"]) {
	case 1:
		$periodo='mensual';	
		break;
	case 2:
		$periodo='Bimensual';	
		break;
	case 3:
		$periodo='Trimestral';	
		break;
	case 4:
		$periodo='Cuatrimestre';	
		break;
	case 5:
		$periodo='Quintrimestre';	
		break;
	case 6:
		$periodo='Semestre';	
		break;
	case 12:
		$periodo='Anual';	
		break;

	default:
		$periodo='Sin Especificar';
		break;
}
	


			     	@$i+=1;






 								



     echo               '<tr>
                       
                        <td>'.$row1["razonSocial"].'</td>
                        <td>'.$row1["direccionFiscal"].'</td>
                        <td>'.$row1["nit"].'</td>
                        <td>'.$row1["nombreCliente"].'</td>
                        <td>'.$row1["telefono"].'</td>
                        <td>'.$row1["pbx"].'</td>
                        <td>'.$row1["fechaCorte"].'</td>
                        <td>'.$periodo.'</td>
                        <td>Q.'.$row1["deposito"].'</td>
                        <td>'.$estadoEmpresa.'</td>';




			     			if(!empty($row1['paqueteAsignado'])){

			     				$query1 = ("SELECT * FROM paquete where idpaquete=:idpaquete ");
                                      $buscarPaquetes = $dbConn->prepare($query1);
                                      $buscarPaquetes->bindParam(':idpaquete', $row1["paqueteAsignado"], PDO::PARAM_INT); 
                                      $buscarPaquetes->execute(); 
                                        while ($paquete=$buscarPaquetes->fetch(PDO::FETCH_ASSOC)){
                                        		if($row1['paqueteAsignado']!=NULL){
                                        			echo '<td>'.$paquete['nombrePaquete'].'</td>'; 
                                        		
                                        	}
                                        }


			     			}else{
			     			 echo '<td>Sin paquete</td>'; 
			     			}


                        
                        


echo  '<td><a class="btn-floating waves-effect indigo darken-4 modal-trigger" id="'.$row1["idempresa"].'" href="#modal2"  onclick="actualizarDatos(this.id); ">
                        <i class="material-icons">mode_edit</i>

                        <input type="text" id="'.$razonSocial.'" value="'.$row1["razonSocial"].'" style="display:none;">
                        <input type="text" id="'.$direccionFiscal.'" value="'.$row1["direccionFiscal"].'" style="display:none;">
                        <input type="text" id="'.$nit.'" value="'.$row1["nit"].'" style="display:none;">
                        <input type="text" id="'.$nombreCliente.'" value="'.$row1["nombreCliente"].'" style="display:none;">
                        <input type="text" id="'.$telefono.'" value="'.$row1["telefono"].'" style="display:none;">
                        <input type="text" id="'.$pbx.'" value="'.$row1["pbx"].'" style="display:none;">
                        <input type="text" id="'.$fechaCorte.'" value="'.$row1["fechaCorte"].'" style="display:none;">
                        <input type="text" id="'.$periodo2.'" value="'.$row1["periodo"].'" style="display:none;">
                        <input type="text" id="'.$deposito.'" value="'.$row1["deposito"].'" style="display:none;">
                       <input type="text" id="'.$estado.'" value="'.$row1["estado"].'" style="display:none;">
                       

                      </a>
                      <a class="btn-floating waves-effect lighten-1" id="'.$row1["idempresa"].'" onclick="eliminacionDatos(this.id);">
                        <i class="material-icons">visibility_off</i>
                      </a>

                      </td>
                        <td></td>

                      </tr>';



				}


echo    		'</tbody>
                  </table>';



			break;
	}


?>