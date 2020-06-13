<?php 
session_start();

include '../conexion/conexion.php';


$queryN = ("SELECT * FROM registroLlamadas order by idRegistro desc");
$buscarRegistroLlamadas = $dbConn->prepare($queryN);
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

echo ' <a href="registroLlamadas.php" class="collection-item avatar border-none">
                      <img src="../img/personCallin.png" alt="" class="circle">
                      <span class="line-height-0">'.$registroEmpresas['razonSocial'].'</span>
                      <span class="medium-small right blue-grey-text text-lighten-3">'.$registroLlamadas['fechaRegistro'].' '.$registroLlamadas['horaRegistro'].'</span>
                      <p class="medium-small blue-grey-text text-lighten-3">'.$registroUsuario['nombre'].'</p>
                    </a>';

                }

                }

}

?>