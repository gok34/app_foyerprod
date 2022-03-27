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


    if (isset($_POST['nombrelocal']) && isset($_POST['nombrecontacto'])  && isset($_POST['nit'])  && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['id_usuario']) && isset($_FILES['imagen']['name'])) {
        // captura de datos desde un formulario
        //$title1              = ($_POST['nombre']);
        $nombrelocal              = ($_POST['nombrelocal']);
        $sector              = ($_POST['sector']);
        //$id_vendedor              = 7;
        $nombrecontacto              = ($_POST['nombrecontacto']);
        $nit              = ($_POST['nit']);
        $telefono             = ($_POST['telefono']);
        $direccionc             = ($_POST['direccion']);
        $id_usuario             = ($_POST['id_usuario']);
        $latitud            = ($_POST['latitud']);
        $longitud            = ($_POST['longitud']);

   $estado_cleinte            = 3;

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


            $query = "INSERT INTO rutas(nombre_sucursal,codigo_vendedor,id_sucursal,nit,nombrecontacto,telefono,direccion,longitud,latitud,fecha_ingreso,imagen_cliente,estado_cliente)
                                                        VALUES('$nombrelocal','$id_usuario','$sector','$nit','$nombrecontacto','$telefono','$direccionc','$longitud','$latitud','$fechahoy','$contenido','$estado_cleinte')";

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
        $data = ['code' => "403", 'mensaje' => "datos vacios "];
        echo json_encode($data);
    }
} else {

    header("HTTP/1.1 403 ERROR");
    $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
    echo json_encode($data);
}
