<?php

session_start();

include '../conexion/conexion.php';

//echo $_POS['txtBuscar'];
@$evento=$_POST['accionEjecutar'];
switch ($evento) {
	case 1:
		# insertar
	$q1 = ("INSERT INTO requisitosOficina (requisito, descripcion) VALUES(:requisito, :descripcion)");
			$insertarArchivo = $dbConn->prepare($q1);
			$insertarArchivo->bindParam(':requisito', $_POST['txtRequisito'], PDO::PARAM_STR); 
			$insertarArchivo->bindParam(':descripcion', $_POST['txtDescripcion'], PDO::PARAM_STR); 
			$insertarArchivo->execute();
		break;
	case 2:
		# Actualizar
		$q1 = ("UPDATE requisitosOficina SET requisito=:requisitos,descripcion=:descripcion where idRequisito=:idRequisito");
			$actualizarRegsitro = $dbConn->prepare($q1);
			$actualizarRegsitro->bindParam(':requisitos', $_POST['modRequisito'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':descripcion', $_POST['modDescripcion'], PDO::PARAM_STR); 
			$actualizarRegsitro->bindParam(':idRequisito', $_POST['idActualizar'], PDO::PARAM_STR); 
			$actualizarRegsitro->execute();



		break;
	case 3:
		
	$q1 = ("DELETE FROM requisitosOficina WHERE idRequisito=:idRequisito ");
			$eliminarRegistro = $dbConn->prepare($q1);
			$eliminarRegistro->bindParam(':idRequisito', $_POST['idEliminar'], PDO::PARAM_INT); 
			$eliminarRegistro->execute();
		break;
	case 4:
		# code...
		break;
	
	default:
		# Mostrar tabla

	//consultamos clientes 
			$q1 = ("SELECT * FROM requisitosOficina");
			$buscarRequisitos = $dbConn->prepare($q1);
			$buscarRequisitos->execute();


	echo '<table class="responsive-table striped centered">
                    <thead>
                      <tr>
                          
                          <th>#</th>
                          <th>Requisito</th>
                          <th>Descripcion</th>
                         
                          
                          
                      </tr>
                    </thead>
                    <tbody>';


while ($row1=$buscarRequisitos->fetch(PDO::FETCH_ASSOC)){
	$idRequisitos="idRequisitos".$row1['idRequisito'];
	$requisito="requisito".$row1["idRequisito"];
	$descripcion="descripcion".$row1["idRequisito"];



				     	@$i+=1;

				     	echo '<tr>
				     				 <td>'.$i.'</td>
			                        <td>'.$row1["requisito"].'</td>
			                        <td>'.$row1["descripcion"].'</td>';

			             echo  '<td><a class="btn-floating waves-effect indigo darken-4 modal-trigger" id="'.$row1["idRequisito"].'" href="#modal2"  onclick="actualizarDatos(this.id); ">
                        <i class="material-icons">mode_edit</i>


                        <input type="text" id="'.$idRequisitos.'" value="'.$row1["idRequisito"].'" style="display:none;">
                        <input type="text" id="'.$requisito.'" value="'.$row1["requisito"].'" style="display:none;">
                        <input type="text" id="'.$descripcion.'" value="'.$row1["descripcion"].'" style="display:none;">

                        
                       

                      </a>
                      <a class="btn-floating waves-effect lighten-1" id="'.$row1["idRequisito"].'" onclick="eliminacionDatos(this.id);">
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