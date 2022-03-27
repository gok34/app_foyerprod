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


    if (isset($_POST['id_codigo']) && isset($_FILES['imagen']['name'])) {
        // captura de datos desde un formulario

        // $id_vendedor              = ($_POST['vendedor']);
        $id_cliente = ($_POST['id_codigo']);
        // $id_cita= 40;
        //$tipo_actividad              = ($_POST['tipo_actividad']);
        // $tipo_actividad              = "visita";
        //$cadena_actividad = implode(" , ", $tipo_actividad);
        $latitud            = ($_POST['latitud']);
        $longitud            = ($_POST['longitud']);

         $estado_cleinte            = 2;
        // $longitud            = "1544";

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
            $fp = fopen(
                $tmp_file,
                "rb"
            );
            $contenido = fread($fp, $ukuran_file);
            $contenido = addslashes($contenido);
            fclose($fp);




            //$conexion = mysqli_connect($hostname, $username, $password, $database);

            $query = "UPDATE rutas SET  latitud = '$latitud', longitud = '$longitud',imagen_cliente='$contenido',fecha_ingreso='$fechahoy',estado_cliente='$estado_cleinte'  WHERE  id_codigo = '$id_cliente'";

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
            print "No se ha podido subir el archivo al servidor <br>";
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
