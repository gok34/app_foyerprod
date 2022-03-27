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


if (isset($_POST['monto'])   ) {
   // captura de datos desde un formulario
   //$title1              = ($_POST['nombre']);
   $monto              = ($_POST['monto']);
   //$id_vendedor              = 7;
    $lugar              = ($_POST['lugar']);
   $descripcion              = ($_POST['descripcion']);
   $tipogasto             = ($_POST['tipogasto']);
   $quien             = ($_POST['sexo']);
  //$cadena_rutas = implode(" , ", $rutas);
  $formadepago = ($_POST['formadepago']);

//formadepago

   //echo $fecha . $hora,'<br>';
   //echo $sector,'<br>';
    //echo $id_vendedor,'<br>';
//echo $cadena_rutas,'<br>';

//echo count($rutas),'<br>';

//foreach ($rutas as $result) {
			//echo $result, '<br>';
		
   
      //$conexion = mysqli_connect($hostname, $username, $password, $database);

      $query = "INSERT INTO gastoAN(monto,descripcion_gasto,lugar,tipo_gasto,quien,fecha_gasto,tipopago)
                                                        VALUES('$monto','$descripcion','$lugar','$tipogasto','$quien','$fechahoy','$formadepago')";

      $sql = $dbConn->prepare($query);
      $sql->execute();

//}


      if ($sql->rowCount() > 0) {
       //  header("HTTP/1.1 200 OK");
       //  $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
        header('Location: gastonelly.php');
         
      } else {
         //  header("HTTP/1.1 403 OK");
        // $data = ['code' => "403", 'mensaje' => "No se almacenado "];
        // echo json_encode($data);
		  header('Location: gastonelly.php');
      }
   } else {
       //header("HTTP/1.1 403 OK");
        // $data = ['code' => "403", 'mensaje' => "datos vacios "];
         header('Location: gastonelly.php');
   }

}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
?>