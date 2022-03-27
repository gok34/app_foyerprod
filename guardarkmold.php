<?PHP

include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
//$dbConn =  connect($db);
//$dbConn =  connect($dbhostiger);
$dbConn =  connect($dbdigital);
//$ip =   $dbdigital['host'];
//$ip =   $dbhostiger['host'];
/*exec("ping -n 1 $ip", $output, $status);
$tamaño = count($output);
//echo $status;
//echo $tamaño;
if ($tamaño > 1) {*/

date_default_timezone_set('America/Guatemala');
$fechahoy = date("Y-m-d H:i:s");
//echo $fechahoy;


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

if (isset($_FILES['imagen']['name']) ) {
   // captura de datos desde un formulario
   //$title1              = ($_POST['nombre']);
   $kilometraje              = ($_POST['kilometraje']);
   $estado              = ($_POST['estado']);
   $idusuario             = ($_POST['id_usuario']);
   $latitud            = ($_POST['latitud']);
   $longitud            = ($_POST['longitud']);
if (isset($_POST['vehiculo'])){
{
    $vehiculo= $_POST['vehiculo'];
//$nombre = $nombre2;
}else{
	 $vehiculo= " ";
}

   $nama_file          = $_FILES['imagen']['name'];
   $ukuran_file         = $_FILES['imagen']['size'];
   $tipe_file          = $_FILES['imagen']['type'];
   $tmp_file           = $_FILES['imagen']['tmp_name'];
   //echo $nama_file;
   //echo $tipe_file;

   //-------------imagenar mas pequeña

   $porcentaje = 0.5;
   list($ancho, $alto) = getimagesize($tmp_file);
   $nuevo_ancho = $ancho * $porcentaje;
   $nuevo_alto = $alto * $porcentaje;
   //Redimensionar
   $imagen_p = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
   $imagen = imagecreatefromjpeg($tmp_file);
   imagecopyresampled($imagen_p, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
   /* Sobreescribimos la imagen original con la reescalada */
   imagejpeg($imagen_p, $tmp_file);

   $ukuran_file         = $_FILES['imagen']['size'];
   //----------------------------


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

      //$conexion = mysqli_connect($hostname, $username, $password, $database);


if($estado==1){
$query = "INSERT INTO control(kilometraje,id_usuario,imagen,contenido,tipo,fecha,latitud,longitud,estado)
                                                        VALUES('$kilometraje','$idusuario','$nama_file','$contenido','$tipe_file','$fechahoy','$latitud','$longitud','$estado')";

      $sql = $dbConn->prepare($query);
      $sql->execute();
}
else {

$query1 = "SELECT kilometraje FROM control WHERE ESTADO=1 AND ID_USUARIO=$idusuario ORDER BY  id DESC limit 1";

      $sql1 = $dbConn->prepare($query1);
      $sql1->execute();

  while ($row11 =  $sql1->fetch()) {
  $kilomtrajeinical=$row11['kilometraje'];
}

$totalkm=$kilometraje- $kilomtrajeinical;

$query = "INSERT INTO control(kilometraje,id_usuario,imagen,contenido,tipo,fecha,latitud,longitud,estado,totalkm)
                                                        VALUES('$kilometraje','$idusuario','$nama_file','$contenido','$tipe_file','$fechahoy','$latitud','$longitud','$estado','$totalkm')";

      $sql = $dbConn->prepare($query);
      $sql->execute();


}  


      



      if ($sql->rowCount() > 0) {
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