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


    if (isset($_FILES['imagen']['name'])&& isset($_FILES['imagen2']['name'])) {
        // captura de datos desde un formulario
        //$title1              = ($_POST['nombre']);
       
      
     
        $id_usuario             = ($_POST['id_usuario']);
        $latitud            = ($_POST['latitud']);
        $longitud            = ($_POST['longitud']);


        $nama_file          = $_FILES['imagen']['name'];
        $ukuran_file         = $_FILES['imagen']['size'];
        $tipe_file          = $_FILES['imagen']['type'];
        $tmp_file           = $_FILES['imagen']['tmp_name'];
		//imagen2
		 $nama_file2          = $_FILES['imagen2']['name'];
        $ukuran_file2         = $_FILES['imagen2']['size'];
        $tipe_file2          = $_FILES['imagen2']['type'];
        $tmp_file2          = $_FILES['imagen2']['tmp_name'];
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
			
			 $porcentaje2 = 0.5;
        list($ancho2, $alto2) = getimagesize($tmp_file2);
        $nuevo_ancho2 = $ancho2 * $porcentaje2;
        $nuevo_alto2 = $alto2 * $porcentaje2;
        //Redimensionar
        $imagen_p2 = imagecreatetruecolor($nuevo_ancho2, $nuevo_alto2);
        $imagen2 = imagecreatefromjpeg($tmp_file2);
		
        imagecopyresampled($imagen_p2, $imagen2, 0, 0, 0, 0, $nuevo_ancho2, $nuevo_alto2, $ancho2, $alto2);
		
        /* Sobreescribimos la imagen original con la reescalada */
        imagejpeg($imagen_p2, $tmp_file2);
		

        $ukuran_file2         = $_FILES['imagen2']['size'];
			
    if ($tmp_file2 != "none") {
            $fp2 = fopen($tmp_file2, "rb");
            $contenido2 = fread($fp2, $ukuran_file2);
            $contenido2 = addslashes($contenido2);
			
            fclose($fp2);


            $query = "INSERT INTO vales(imagen_vale,imagen_comprobante,fecha_guarda,latitud,longitud,id_usuario)
                                                        VALUES('$contenido','$contenido2','$fechahoy','$longitud','$latitud','$id_usuario')";

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
            print "No se ha podido subir el archivo al servidor2 <br>";
        }
			
			
        } else {
            print "No se ha podido subir el archivo al servidor1 <br>";
        }
    } else {
        header("HTTP/1.1 200 OK");
        $data = ['code' => "200", 'mensaje' => "datos vacios "];
        echo json_encode($data);
    }
} else {

    header("HTTP/1.1 403 ERROR");
    $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
    echo json_encode($data);
}
