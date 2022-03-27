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
$stat = $dbConn->prepare("SELECT `control`.`id`,`control`.`kilometraje`,`control`.`imagen`,`control`.`contenido`,`control`.`tipo`,`control`.`fecha`,`control`.`latitud`,`control`.`longitud`,usuarios.names FROM `control`
INNER JOIN usuarios ON control.id_usuario = usuarios.cod_vendedor
 where id=?");
$stat->bindParam(1, $id);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:" . $row['tipo']);
echo $row['contenido'];
echo '<img src="data:image/jpeg;base64,' . base64_encode($row['continido']) . '"/>';
