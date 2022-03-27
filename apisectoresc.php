<?PHP
include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);









	//$conexion = mysqli_connect($hostname, $username, $password, $database);


	$consulta = "select id_codigo,nombre_sucursal from rutas";



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





	//fallo en conexion
