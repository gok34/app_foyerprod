<?PHP
include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);

/*$ip =   $dbdigital['host'];
exec("ping -n 1 $ip", $output, $status);
$tamaño = count($output);*/
//echo $status;
//echo $tamaño;
//if ($tamaño > 1) {
//echo "sss";
//$conexion = mysqli_connect("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

//valido la conexion


if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	if (isset($_GET["codigo_vendedor"])) {

		$codigo_vendedor = $_GET['codigo_vendedor'];
		//$codigo_sector = $_GET['codigo_sector'];





		//$conexion = mysqli_connect($hostname, $username, $password, $database);


		$consulta = "select citas.id_citas,rutas.nombre_sucursal,citas.fecha_cita,citas.estado,citas.id_usuario,cobro.monto from citas 
inner JOIN rutas on rutas.id_codigo=citas.ruta
inner join cobro on cobro.id_cobro_cliente=citas.id_usuario
inner join cobro on cobro.id_cobro_cliente=citas.ruta
where id_usuario={$codigo_vendedor} and estado IN(3,1) and DATE(fecha_cita)= CURDATE() ORDER BY fecha_cita ASC
";

		/*$consulta = "select citas.id_citas,rutas.nombre_sucursal,citas.fecha_cita,citas.estado,citas.id_usuario from citas 
inner JOIN rutas on rutas.id_codigo=citas.ruta
where id_usuario={$codigo_vendedor} and estado IN(3,1) ORDER BY DATE(NOW()) DESC";*/



		// --nuevo


		//	$resultado=mysqli_query($conexion,$consulta);


		if ($consulta) {
			//$resultado = mysqli_query($dbConn, $consulta);
			$sql = $dbConn->prepare($consulta);
			$sql->execute();
			//$sql->setFetchMode(PDO::FETCH_ASSOC);
			if ($reg = $sql->fetchAll(PDO::FETCH_ASSOC)) {
				$sql->closeCursor();

				$data = $reg;

				echo  json_encode($data);
				// echo '<br><br><br>';






				// echo($reg1), '<br>';




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
} else {
	header("HTTP/1.1 500 ERROR");
	$data = ['code' => "500", 'mensaje' => "Fallo en conexion"];
	echo json_encode($data);
	exit();
}
/*}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}*/