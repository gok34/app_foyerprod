<?PHP
include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);


	//valido la conexion

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{



	if (isset($_GET["codigo_vendedor"])) {

		$codigo_vendedor = $_GET['codigo_vendedor'];
        $codigo_sector = $_GET['codigo_sector'];
	




		//$conexion = mysqli_connect($hostname, $username, $password, $database);


	  $consulta = "select rutas.nombre_sucursal,rutas.id_sucursal,rutas.id_codigo from rutas
inner join sector on sector.id_sector=rutas.id_sucursal 
INNER JOIN usuarios on usuarios.cod_vendedor= rutas.codigo_vendedor 
where rutas.id_sucursal={$codigo_sector} and rutas.codigo_vendedor={$codigo_vendedor} ";


		//	$resultado=mysqli_query($conexion,$consulta);


		if ($consulta) {
			//$resultado = mysqli_query($dbConn, $consulta);
			$sql = $dbConn->prepare($consulta);
			$sql->execute();
			//$sql->setFetchMode(PDO::FETCH_ASSOC);
			 if ($reg = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                 header('Content-Type: application/json');
            $sql->closeCursor();
            
           $data = $reg;
            
				echo  json_encode($data);
              // echo '<br><br><br>';


                             
		
			
			
          // echo($reg1), '<br>';
             
                            

			
				//	file_put_contents('jui0001.json', json_encode($json));
			} else {
                header('Content-Type: application/json');
				header("HTTP/1.1 403 OK");
				$data = ['code' => "403", 'parametro error' => "Contraseña Incorrecta"];
				echo json_encode($data);
				exit();
			}




			/* convertir json de la consulta en datos utils;*/

			/*	$Array = json_decode(json_encode($json), true);
		if (empty($Array)) {
			return;
		}
		ob_start();
		foreach ($Array['datos'] as $result) {
			echo $result['user'], '<br>', $result['names'];
		}*/


			/*aqui termina */
		}
	} else {
		//Mostrar lista de post
		//$sql = $dbConn->prepare("SELECT * FROM usuarios");
		//$sql->execute();
		//$sql->setFetchMode(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
		header("HTTP/1.1 404 ERROR");
		$data = ['code' => "404", 'mensaje' => "No parametros"];
		echo json_encode($data);
		exit();
	}

}else {
header('Content-Type: application/json');
     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}


	//fallo en conexion
/*} else {
    header('Content-Type: application/json');
	header("HTTP/1.1 500 ERROR");
	$data = ['code' => "500", 'mensaje' => "Fallo en conexion"];
	echo json_encode($data);
	exit();
}*/