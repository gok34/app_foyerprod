<?PHP
include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);





	if (isset($_GET["codigo_vendedor"])) {

		$codigo_vendedor = $_GET['codigo_vendedor'];
	




		//$conexion = mysqli_connect($hostname, $username, $password, $database);


$consulta = "call sp_view_rutas($codigo_vendedor)";


		//	$resultado=mysqli_query($conexion,$consulta);


		if ($consulta) {
			//$resultado = mysqli_query($dbConn, $consulta);
			$sql = $dbConn->prepare($consulta);
			$sql->execute();
			//$sql->setFetchMode(PDO::FETCH_ASSOC);
			if ($reg = $sql->fetchAll(PDO::FETCH_ASSOC)) {
				 header('Content-Type: application/json');
				
 	//	array_Push($json, $data);
				 $data = $reg;
			//	$json =  $reg ;
			echo  json_encode($data);
          
			} else {
				 header('Content-Type: application/json');
				header("HTTP/1.1 200 OK");
				$data = [];
				echo json_encode($data);
				exit();
			}
		}
	} else {
		
			$consulta = "select sector.nombre_sector,rutas.id_sucursal  from rutas
inner join sector on sector.id_sector=rutas.id_sucursal 
INNER JOIN usuarios on usuarios.cod_vendedor= rutas.codigo_vendedor 
group by sector.nombre_sector";
		if ($consulta) {
			//$resultado = mysqli_query($dbConn, $consulta);
			$sql = $dbConn->prepare($consulta);
			$sql->execute();
			//$sql->setFetchMode(PDO::FETCH_ASSOC);
			if ($reg = $sql->fetchAll(PDO::FETCH_ASSOC)) {
				 header('Content-Type: application/json');
				
 	//	array_Push($json, $data);
				 $data = $reg;
			//	$json =  $reg ;
			echo  json_encode($data);
          
			} else {
				 header('Content-Type: application/json');
				header("HTTP/1.1 200 OK");
				$data = [];
				echo json_encode($data);
				exit();
			}
		}
		
		
		/*//Mostrar lista de post
		//$sql = $dbConn->prepare("SELECT * FROM usuarios");
		//$sql->execute();
		//$sql->setFetchMode(PDO::FETCH_ASSOC);
		 header('Content-Type: application/json');
		header("HTTP/1.1 404 ERROR");
		$data = ['code' => "404", 'mensaje' => "No parametros"];
		echo json_encode($data);
		exit();*/
	}




	//fallo en conexion
