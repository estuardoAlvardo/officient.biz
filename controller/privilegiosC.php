<?php

session_start();
 //phpinfo();
include '../conexion/conexion.php';



@$evento=$_POST['accionEjecutar'];


switch (@$evento) {
	case 1:	


		$estatus=1;  //activo //2=inactivo

		$q1 = ("INSERT INTO rolesPrivilegios (rol, descripcion, edicion, eliminacion, busqueda, actualizacion,estatus) VALUES(:rol, :descripcion, :edicion, :eliminacion, :busqueda, :actualizacion,:estatus)");
			$insertarNuevoRol = $dbConn->prepare($q1);
			$insertarNuevoRol->bindParam(':rol', $_POST['txtRol'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':descripcion', $_POST['txtDescripcion'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':edicion', $_POST['txtEdicion'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':eliminacion', $_POST['txtEliminacion'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':busqueda', $_POST['txtBusqueda'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':actualizacion', $_POST['txtActualizacion'], PDO::PARAM_STR); 
			$insertarNuevoRol->bindParam(':estatus',$estatus , PDO::PARAM_STR);
			$insertarNuevoRol->execute();


		
		break;
	
	case 2:
	
		$q1 = ("UPDATE rolesPrivilegios SET rol=:rol,descripcion=:descripcion,edicion=:edicion,eliminacion=:eliminacion,busqueda=:busqueda,actualizacion=:actualizacion WHERE idPrivilegio=:idPrivilegio");
			$actualizarPrivilegio = $dbConn->prepare($q1);
			$actualizarPrivilegio->bindParam(':rol', $_POST['modRol'], PDO::PARAM_STR); 
			$actualizarPrivilegio->bindParam(':descripcion', $_POST['modDescripcion'], PDO::PARAM_STR); 
			$actualizarPrivilegio->bindParam(':edicion', $_POST['modEdicion'], PDO::PARAM_STR); 
			$actualizarPrivilegio->bindParam(':eliminacion', $_POST['modEliminacion'], PDO::PARAM_STR); 
			$actualizarPrivilegio->bindParam(':busqueda', $_POST['modBusqueda'], PDO::PARAM_STR); 
			$actualizarPrivilegio->bindParam(':actualizacion', $_POST['modActualizacion'], PDO::PARAM_STR);
			$actualizarPrivilegio->bindParam(':idPrivilegio', $_POST['idActualizar'], PDO::PARAM_STR);  
			$actualizarPrivilegio->execute();	


		break;
	case 3:
		# Eliminar
	$estatus=2; //cambiamos el estatus o bandera para eliminar

	$q1 = ("UPDATE rolesPrivilegios SET estatus=:estatus where idPrivilegio=:idPrivilegio");
			$eliminarRegistro = $dbConn->prepare($q1);
			$eliminarRegistro->bindParam(':estatus', $estatus, PDO::PARAM_INT); 
			$eliminarRegistro->bindParam(':idPrivilegio', $_POST['idEliminar'], PDO::PARAM_INT); 
			$eliminarRegistro->execute();



		break;

	default:
			$q1 = ("SELECT * FROM rolesPrivilegios where estatus=1");
			$obtenerRoles = $dbConn->prepare($q1);
			$obtenerRoles->bindParam(':usuario', $_POST['txtUsuario'], PDO::PARAM_STR); 
			$obtenerRoles->execute();
			$cantidadRoles=$obtenerRoles->rowCount();	

	echo '<table class="responsive-table striped centered">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Rol</th>
                          <th>Descripción</th>
                          <th>Edición</th>
                          <th>Eliminación</th>
                          <th>Busqueda</th>
                          <th>Actualizar</th>
                      </tr>
                    </thead>
                    <tbody>';

while ($row1=$obtenerRoles->fetch(PDO::FETCH_ASSOC)){
	@$i+=1;


	if($row1["edicion"]==1){
			$edicionPri='Si';
	}else{
		$edicionPri='No';
	}	


	if($row1["eliminacion"]==1){
			$eliminacionPri='Si';
	}else{
		$eliminacionPri='No';
	}	

		if($row1["busqueda"]==1){
			$busquedaPri='Si';
	}else{
		$busquedaPri='No';
	}	

 if($row1["actualizacion"]==1){
			$actualizacionPri='Si';
	}else{
		$actualizacionPri='No';
	}	

	$rolEditar="rol".$row1["idPrivilegio"];
	$descripcionEditar="descripcion".$row1["idPrivilegio"];
	$edicionEditar="edicion".$row1["idPrivilegio"];
	$eliminacionEditar="eliminacion".$row1["idPrivilegio"];
	$busquedaEditar="busqueda".$row1["idPrivilegio"];
	$actualizarEdicion="actualizar".$row1["idPrivilegio"];



     echo               '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row1["rol"].'</td>
                        <td>'.$row1["descripcion"].'</td>
                        <td>'.$edicionPri.'</td>
                        <td>'.$eliminacionPri.'</td>
                        <td>'.$busquedaPri.'</td>
                        <td>'.$actualizacionPri.'</td>
                        <td><a class="btn-floating waves-effect indigo darken-4 modal-trigger" id="'.$row1["idPrivilegio"].'" href="#modal2"  onclick="actualizarDatos(this.id); ">
                        <i class="material-icons">mode_edit</i>


                        <input type="text" id="'.$rolEditar.'" value="'.$row1["rol"].'" style="display:none;">
                        <input type="text" id="'.$descripcionEditar.'" value="'.$row1["descripcion"].'" style="display:none;">
                        <input type="text" id="'.$edicionEditar.'" value="'.$row1["edicion"].'" style="display:none;">
                        <input type="text" id="'.$eliminacionEditar.'" value="'.$row1["eliminacion"].'" style="display:none;">
                        <input type="text" id="'.$busquedaEditar.'" value="'.$row1["busqueda"].'" style="display:none;">
                        <input type="text" id="'.$actualizarEdicion.'" value="'.$row1["actualizacion"].'" style="display:none;">

                       
                      </a></td>
                        <td><a class="btn-floating waves-effect lighten-1" id="'.$row1["idPrivilegio"].'" onclick="eliminacionDatos(this.id);">
                        <i class="material-icons">delete</i>
                      </a></td>

                      </tr>';

   }                   
          echo    '</tbody>
                  </table>';
		break;
}





	





 ?>