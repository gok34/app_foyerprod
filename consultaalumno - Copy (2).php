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

$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];
$dbConn =  connect($db);

$directorio = "https://registrophp.herokuapp.com/public/imagenes/public/imagenes/";
$aleatorio = mt_rand(100, 99999);
$ruta = "https://registrophp.herokuapp.com/public/imagenes/public/imagenes/" . $aleatorio . ".png";

// captura de datos desde un formulario
//$title1              = ($_POST['nombre']);
$kilometraje              = ($_POST['kilometraje']);
$tipovisita              = ($_POST['tipovisita']);
$idusuario             = ($_POST['id_usuario']);


$nombre = $_FILES['imagen']['name'];

$guardado = $_FILES['imagen']['tmp_name'];

if (!file_exists($directorio)) {
	mkdir($directorio, 0777, true);
	if (file_exists($directorio)) {

		if (move_uploaded_file($guardado,  'archivos/' . $nombre)) {
			echo "Archivo guardado con exito";
		} else {
			echo "Archivo no se pudo guardar";
		}
	}
} else {
	if (move_uploaded_file($guardado,  $directorio . $aleatorio . ".png")) {
		echo "Archivo guardado con exito";
	} elseif (move_uploaded_file($guardado, $directorio . $aleatorio . ".pdf")) {
		echo "Archivo guardado con exito";
	} else {
		echo "Archivo no se pudo guardar";
	}

	var_dump($ruta);
	//cho $_SERVER['HTTP_HOST'];
	$host = $_SERVER["HTTP_HOST"];
	$url = $_SERVER["REQUEST_URI"];
	echo "http://" . $host . $url;
}


/*

$nama_file          = $_FILES['imagen']['name'];
$ukuran_file        = $_FILES['imagen']['size'];
$tipe_file          = $_FILES['imagen']['type'];
$tmp_file           = $_FILES['imagen']['tmp_name'];


//echo $_FILES['descripcion']['name'];
// determinar la extensión permisible
$allowed_extensions = array('jpg', 'jpeg', 'png', 'mp4');

// Establecer una ruta de carpeta para almacenar la imagen
$direccion = dirname(__DIR__) . "\\registroapi\public\imagenes\\";
$path               = $direccion . $nama_file;

// Comprobar la extensión
$file               = explode(".", $nama_file);
$extension          = array_pop($file);


// Compruebe si el tipo de archivo que esté cargado de conformidad con las extensiones permitidas
if (in_array($extension, $allowed_extensions)) {
	// Si el tipo de archivo que esté cargado de conformidad con las extensiones permitidas:
	if ($ukuran_file <= 1000000) { // Comprueba si el tamaño del archivo subido menos igual a 1 MB
		//Si el tamaño del archivo es menor o igual a 1 MB, hacer:
		//El proceso de carga
		//if (move_uploaded_file($tmp_file, $path)) { // Compruebe si la imagen fue subida o no con éxito
		// Si la imagen ha cargado correctamente, Marca:
		// consultar comando para guardar los datos en la tabla is_portfolio

		$conexion = mysqli_connect($hostname, $username, $password, $database);

		/*	$consulta = "INSERT INTO control(kilometraje,id_usuario,tipo_actividad,imagen)
                                                        VALUES('$kilometraje',$idusuario,$tipovisita ,'$nama_file')";
				$resultado = mysqli_query($conexion, $consulta);*/
/*
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
		} else {
			// Si la imagen no se ha subido, mostrar un mensaje no se ha subido
			header("HTTP/1.1 403 ERROR");
			$data = ['code' => "403", 'mensaje' => "No se almacenado "];
			echo json_encode($data);
		}
		/*	} else {
			// Si el tamaño del archivo es de menos de 1 MB, mostrar un mensaje no se ha subido
			echo "se almacenado con exito imagen tamaño";
		}*/
/*	} else {
		//Si el tipo de archivo subido no es JPG / JPEG / PNG, mostrar un mensaje no se ha subido
		echo "se almacenado con exito imagen no sipo correcto";
	}
}
header("HTTP/1.1 403 ERROR");
$data = ['code' => "403", 'mensaje' => "DATOS VACIOS"];
echo json_encode($data);
*/