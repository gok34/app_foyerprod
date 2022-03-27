<?PHP

include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
//$dbConn =  connect($db);
$dbConn =  connect($dbdigital);
date_default_timezone_set('America/Guatemala');
$fechahoy = date("Y-m-d H:i:s");
$hora = date(" H:i:s");
//echo $fechahoy;
//echo $hora;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{


if (isset($_POST['nombre'])  && isset($_POST['password']) && isset($_POST['codigousuario']) && isset($_POST['tipousuario']) && isset($_POST['sexo']) ) {
   // captura de datos desde un formulario
   //$title1              = ($_POST['nombre']);
   $nombre              = ($_POST['nombre']);
   //$id_vendedor              = 7;
    $pass              = ($_POST['password']);
   $codigousuario              = ($_POST['codigousuario']);
   $tipousuario             = ($_POST['tipousuario']);
   $sexo             = ($_POST['sexo']);
  //$cadena_rutas = implode(" , ", $rutas);
  $user = ($_POST['codigousuario']);

   //echo $fecha . $hora,'<br>';
   //echo $sector,'<br>';
    //echo $id_vendedor,'<br>';
//echo $cadena_rutas,'<br>';

//echo count($rutas),'<br>';

//foreach ($rutas as $result) {
			//echo $result, '<br>';
		
   
      //$conexion = mysqli_connect($hostname, $username, $password, $database);

      $query = "INSERT INTO usuarios(names,pwd,user,cod_vendedor,id_tipousuario,sexo,fecha_creacion)
                                                        VALUES('$nombre','$pass','$user','$codigousuario','$tipousuario','$sexo','$fechahoy')";

      $sql = $dbConn->prepare($query);
      $sql->execute();

//}


      if ($sql->rowCount() > 0) {
       //  header("HTTP/1.1 200 OK");
       //  $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
        header('Location: reportegeneral.php');
         
      } else {
         //  header("HTTP/1.1 403 OK");
        // $data = ['code' => "403", 'mensaje' => "No se almacenado "];
        // echo json_encode($data);
		  header('Location: reportegeneral.php');
      }
   } else {
       //header("HTTP/1.1 403 OK");
        // $data = ['code' => "403", 'mensaje' => "datos vacios "];
         header('Location: reportegeneral.php');
   }

}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
?>