<?PHP

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$hostname = "us-cdbr-iron-east-05.cleardb.net";
$database = "heroku_b6d2af3a334b261";
$username = "b69c63209565c4";
$password = "07e0c5d1";
$json = array();

include "config.php";
include "utils.php";
date_default_timezone_set('America/Guatemala');
$fechahoy = date("Y-m-d H:i:s");
//echo $fechahoy;

$dbConn =  connect($db);


if (!$_FILES['imagen']['name'] == '') {
   // captura de datos desde un formulario
   //$title1              = ($_POST['nombre']);
   $kilometraje              = ($_POST['kilometraje']);
   $tipovisita              = ($_POST['tipovisita']);
   $idusuario             = ($_POST['id_usuario']);
   //  $comments             = ($_POST['comments']);


   $nama_file          = $_FILES['imagen']['name'];
   $ukuran_file         = $_FILES['imagen']['size'];
   $tipe_file          = $_FILES['imagen']['type'];
   $tmp_file           = $_FILES['imagen']['tmp_name'];
   //echo $nama_file;
   //echo $tipe_file;



   //echo $_FILES['descripcion']['name'];
   // determinar la extensión permisible
   $allowed_extensions = array('jpg', 'jpeg', 'png', 'mp4');

   // Establecer una ruta de carpeta para almacenar la imagen
   $direccion = $_SERVER['DOCUMENT_ROOT'] . "/public/imagenes/";
   $path               = $direccion . $nama_file;

   //echo $_SERVER['DOCUMENT_ROOT']."<br>";
   //echo $path;
   //echo $path;
   // Comprobar la extensión
   $file               = explode(".", $nama_file);
   $extension          = array_pop($file);

   if ($tmp_file != "none") {
      $fp = fopen($tmp_file, "rb");
      $contenido = fread($fp, $ukuran_file);
      $contenido = addslashes($contenido);
      fclose($fp);

      $conexion = mysqli_connect($hostname, $username, $password, $database);



      $query = mysqli_query($conexion, "INSERT INTO control(kilometraje,id_usuario,tipo_actividad,imagen,contenido,tipo,fecha)
                                                        VALUES('$kilometraje','$idusuario','$tipovisita' ,'$nama_file','$tipe_file','$comments','$fechahoy')")
         or die('Hubo un error en la consulta de inserción : ' . mysqli_error($conexion));



      if (mysqli_affected_rows($conexion) > 0) {
         header("HTTP/1.1 200 OK");
         $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
         echo json_encode($data);
      } else {
      }
   } else {
      print "No se ha podido subir el archivo al servidor <br>";
   }
} else {
   header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "imagen vacia "];
   echo json_encode($data);
}