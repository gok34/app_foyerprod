<?PHP
include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);
//$mysqli = new mysqli($hostname, $username, $password, $database);
//

//$con = mysqli_driver

//
//validcion de ip funcionado de remoto
/*$ip =   $dbdigital['host'];
//exec("ping -n 1 $ip", $output, $status);
//$tamaño = count($output);
//echo $status;
//echo $tamaño;
if ($tamaño > 1) {*/
//echo "sss";
//$conexion = mysqli_connect("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

//valido la conexion



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET["user"]) && isset($_GET["pwd"])) {

		$user = $_GET['user'];
		$pass = $_GET['pwd'];


		if ($_GET['user'] == "pruebas") {
			$user = 1001;


			//$conexion = mysqli_connect($hostname, $username, $password, $database);


			$consulta = "SELECT names,cod_vendedor,id_tipousuario FROM usuarios where user='{$user}' and pwd='{$pass}'  ";



			//	$resultado=mysqli_query($conexion,$consulta);


			if ($consulta) {
				//$resultado = mysqli_query($dbConn, $consulta);
				$sql = $dbConn->prepare($consulta);
				$sql->execute();
				//$sql->setFetchMode(PDO::FETCH_ASSOC);
				if ($reg = $sql->fetch(PDO::FETCH_ASSOC)) {
					//header('Content-Type: application/json');
					//	$data = ['code' => "404", 'mensaje' => "campos vacios"];

					//	array_Push($json, $data);
					$sql->closeCursor();
					$json = $reg;
					echo json_encode($json);
					//	file_put_contents('jui0001.json', json_encode($json));
				} else {
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
			header("HTTP/1.1 404 ERROR");
			$data = ['code' => "404", 'mensaje' => "No parametros"];
			echo json_encode($data);
			exit();
		}
	} else {
		//Mostrar lista de post
		//$sql = $dbConn->prepare("SELECT * FROM usuarios");
		//$sql->execute();
		//$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 404 ERROR");
		$data = ['code' => "404", 'mensaje' => "No parametros"];
		echo json_encode($data);
		exit();
	}




	//fallo en conexion
	/*} else {
	header("HTTP/1.1 500 ERROR");
	$data = ['code' => "500", 'mensaje' => "Fallo en conexion"];
	echo json_encode($data);
	exit();
}*/
} else {

	header("HTTP/1.1 403 ERROR");
	$data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
	echo json_encode($data);
}
