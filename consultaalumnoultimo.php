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


$dbConn =  connect($db);


 if(!$_FILES['imagen']['name']==''){
// captura de datos desde un formulario
//$title1              = ($_POST['nombre']);
$kilometraje              = ($_POST['kilometraje']);
$tipovisita              = ($_POST['tipovisita']);
$idusuario             = ($_POST['id_usuario']);



$nama_file          = $_FILES['imagen']['name'];
$tmp_file        = $_FILES['imagen']['size'];
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
echo $path;
//echo $path;
// Comprobar la extensión
$file               = explode(".", $nama_file);
$extension          = array_pop($file);

if ( $tmp_file != "none" )
 {
    $fp = fopen($tmp_file, "rb");
    $contenido = fread($fp, $tmp_file);
    $contenido = addslashes($contenido);
    fclose($fp); 

    $conexion = mysqli_connect($hostname, $username, $password, $database);

		

			$query = mysqli_query($conexion, "INSERT INTO control(kilometraje,id_usuario,tipo_actividad,imagen,contenido)
                                                        VALUES('$kilometraje','$idusuario','$tipovisita' ,'$nama_file','$contenido')")
				or die('Hubo un error en la consulta de inserción : ' . mysqli_error($conexion));

    mysqli_query($query);

    if(mysqli_affected_rows($conn) > 0)
       print "Se ha guardado el archivo en la base de datos.";
    else
       print "NO se ha podido guardar el archivo en la base de datos.";
 }
 else
    print "No se ha podido subir el archivo al servidor";




			$conexion = mysqli_connect($hostname, $username, $password, $database);

		

			$query = mysqli_query($conexion, "INSERT INTO control(kilometraje,id_usuario,tipo_actividad,imagen)
                                                        VALUES('$kilometraje','$idusuario','$tipovisita' ,'$nama_file')")
				or die('Hubo un error en la consulta de inserción : ' . mysqli_error($conexion));
			//echo "se grabo";
			// comprobar consulta
			if ($query) {
				//	echo "se almacenado con exito";
				header("HTTP/1.1 200 OK");
				$data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
				echo json_encode($data);
			} 
		
}

else{
    	header("HTTP/1.1 403 ERROR");
				$data = ['code' => "406", 'mensaje' => "imagen vacia "];
				echo json_encode($data);
    
}