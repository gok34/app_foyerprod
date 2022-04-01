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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


   if (isset($_POST['id_reparto'])) {
      // captura de datos desde un formulario

      // $id_vendedor              = ($_POST['vendedor']);
      $id_reparto = ($_POST['id_reparto']);
      // $id_cita= 40;
      //$idusuario             = ($_POST['id_usuario']);
      // $tipo_actividad              = "visita";
      //$cadena_actividad = implode(" , ", $tipo_actividad);
      $latitud            = ($_POST['latitud']);
      $longitud            = ($_POST['longitud']);
      $montocobrado            = ($_POST['monto_cobrado']);
      $tipo_actividad              = ($_POST['tipo_actividad']);
      $devolucion            = ($_POST['devolucion']);

      // $latitud            = "2151545";
      // $longitud            = "1544";
      $estado = 2;




      //$conexion = mysqli_connect($hostname, $username, $password, $database);

      $query = "UPDATE control_reparto SET  Estado_reparto = '$estado', latitud_reparto_cierre = '$latitud', longitud_reparto_cierre = '$longitud',fecha_cierre='$fechahoy',devolucion='$devolucion',cobro='$montocobrado',tipo_actividad_reparto=' $tipo_actividad' WHERE id_reparto = '$id_reparto'";

      $sql = $dbConn->prepare($query);
      $sql->execute();



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
      $data = ['code' => "403", 'mensaje' => "Datos vacios "];
      echo json_encode($data);
   }
} else {

   header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
