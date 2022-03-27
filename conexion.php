<?PHP
$hostname = "204.48.20.116";
$database = "appfoyer";
$username = "remoto";
$password = "misma2021";
$json = array();






$conexion = mysqli_connect($hostname, $username, $password, $database);


$consulta = "SELECT * FROM conexion";

$resultado = mysqli_query($conexion, $consulta);




while ($reg = mysqli_fetch_array($resultado)) {

	$json['datos'][] = $reg;
}

/*
		if (!$conexion) {
    die("Problemas con la conexion " . mysqli_connect_error());
}
echo "conexion Exitosa";
*/




mysqli_close($conexion);

echo json_encode($json);
