<?PHP
include "permisos.php";


$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);

//$dbConn =  connect($db);





//$ip =   $dbhostiger['host'];
//exec("ping -n 1 $ip", $output, $status);
//$tamaño = count($output);
//echo $status;
//echo $tamaño;
//if ($tamaño > 1) {

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{


$consulta="SELECT * FROM vehiculos  ";
try {
if ($consulta) {
//Mostrar lista de post
$sql = $dbConn->prepare($consulta);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
header("HTTP/1.1 200 OK");
//$data = ['Status' => "0"];
echo json_encode($sql->fetchAll());

 $sql->closeCursor();
}
	 else {
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
} catch (PDOException $e) {
	 if ($e->getCode() == '42S02'){
		 header('Content-Type: application/json');
			 header("HTTP/1.1 404 ERROR");
		$data = ['code' => "42S02", 'error' => "no existe la tabla"];
		echo json_encode($data);
		exit();
		 }
		 else if($e->getCode() == '42000'){
			 header('Content-Type: application/json');
 header("HTTP/1.1 404 ERROR");
		$data = ['code' => "42000", 'error' => "error de sintaxis"];
		echo json_encode($data);

		 }
		 else if($e->getCode() == '42S22'){
			 header('Content-Type: application/json');
 header("HTTP/1.1 404 ERROR");
		$data = ['code' => "42S22", 'error' => "Columna no Declarada"];
		echo json_encode($data);

		 }
    //echo 'Connection failed: ' . $e->getMessage();
}
		

}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
/*} else {
	header("HTTP/1.1 500 ERROR");
	$data = ['code' => "500", 'mensaje' => "Fallo en conexion"];
	echo json_encode($data);
	exit();
}*/
