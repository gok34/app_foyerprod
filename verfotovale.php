<?PHP
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$hostname = "31.170.166.145";
$database = "u835344958_foyerapp";
$username = "u835344958_appfoyer";
$password = "#iQ634@pne";
$json = array();

include "config.php";
include "utils.php";


$dbConn = connect($dbdigital);





//$dbh = new PDO("mysql:host=$hostname;dbname=$database", "u835344958_appfoyer", "#iQ634@pne");
$id = isset($_GET['id']) ? $_GET['id'] : "";
$id2 = isset($_GET['id2']) ? $_GET['id2'] : "";


if($id==null){
	$stat = $dbConn->prepare("select id_vale,imagen_vale,imagen_comprobante,fecha_guarda,latitud,longitud from vales


 where id_vale=?");
$stat->bindParam(1, $id2);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:image/jpeg");
echo $row['imagen_comprobante'];
echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen_comprobante']) . '"/>';

	
}

else {
$stat = $dbConn->prepare("select id_vale,imagen_vale,imagen_comprobante,fecha_guarda,latitud,longitud from vales


 where id_vale=?");
$stat->bindParam(1, $id);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:image/jpeg");
echo $row['imagen_vale'];
echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen_vale']) . '"/>';
	
	
}
