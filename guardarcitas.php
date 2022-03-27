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


if (isset($_POST['fecha'])  && isset($_POST['sector']) && isset($_POST['vendedor']) && isset($_POST['rutas']) ) {
   // captura de datos desde un formulario
   //$title1              = ($_POST['nombre']);
   $id_vendedor              = ($_POST['vendedor']);
   //$id_vendedor              = 7;
   $fecha              = ($_POST['fecha']);
   $sector              = ($_POST['sector']);
   $rutas             = ($_POST['rutas']);
  $cadena_rutas = implode(" , ", $rutas);
  $estado = 1;

   //echo $fecha . $hora,'<br>';
   //echo $sector,'<br>';
    //echo $id_vendedor,'<br>';
//echo $cadena_rutas,'<br>';

//echo count($rutas),'<br>';

foreach ($rutas as $result) {
			//echo $result, '<br>';
		
   
      //$conexion = mysqli_connect($hostname, $username, $password, $database);

      $query = "INSERT INTO citas(fecha_cita,fecha_creada,sector,id_usuario,ruta,estado)
                                                        VALUES('$fecha . $hora','$fechahoy','$sector','$id_vendedor','$result','$estado')";

      $sql = $dbConn->prepare($query);
      $sql->execute();

}


      if ($sql->rowCount() > 0) {
         header("HTTP/1.1 200 OK");
         $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
         echo json_encode($data);
         
      } else {
           header("HTTP/1.1 403 OK");
         $data = ['code' => "403", 'mensaje' => "No se almacenado "];
         echo json_encode($data);
      }
   } else {
       header("HTTP/1.1 403 OK");
         $data = ['code' => "403", 'mensaje' => "datos vacios "];
         echo json_encode($data);
   }

}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
?>