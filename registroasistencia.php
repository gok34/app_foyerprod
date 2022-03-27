<?PHP
$hostname="us-cdbr-iron-east-05.cleardb.net";
$database="heroku_b6d2af3a334b261";
$username="b69c63209565c4";
$password="07e0c5d1";
$json=array();

	if(isset($_GET["nombre"])&&($_GET["apellido"])&&($_GET["colegio"])){
		$nombre=$_GET['nombre'];
		$apellido=$_GET['apellido'];
		$colegio=$_GET['colegio'];
	
	
	//verificar la hora con archivo ini
	
	date_default_timezone_set('America/Guatemala');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini.';
} else {
    echo 'La zona horaria del script y la zona horaria de la configuración ini coinciden.';
}




$hoy ="" . date("d") ."/" . date("m") . "/" . date("Y").",".date("G").":".date("i").":".date("s");
$asistencia="SI";
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		

		
		/* optener el ultimo registro*/
		$consultaultimoid=("SELECT MAX(idasistencia) as idasistencia, fecha FROM Tomaasistencia");
  
  $resultadoconsultaultimoid= mysqli_query($conexion,$consultaultimoid );
  $fila = mysqli_fetch_row ($resultadoconsultaultimoid);
$idasistenciaincrementable = $fila [0];
$fehca = $fila [1];
echo $fehca;
//echo $idasistenciaincrementable;
$idasistenciaincrementable++;
	//aqui termina el incremento de variable
	
/*insertar el valor a tabla de asistencia*/


		$consulta="INSERT INTO Tomaasistencia VALUES ('{$idasistenciaincrementable}','{$hoy}','{$asistencia}','{$nombre}','{$apellido}','{$colegio}')";
		
		
//termina insert de asitencia*/

 
  
  /*importate para valir query*/
 
       
		if($consulta){
			
		 $resultado=mysqli_query($conexion,$consulta )or die(mysqli_error($conexion));
		 echo "datos guardados";
		   // date_default_timezone_set('Australia/Melbourne');
    //preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    echo 'Zona horaria predeterminada: ' . $zonahoraria;
	
	print "<p>" . date("j") . "</p>\n";
		 if (!$resultado) {
     return false;
	
   } else {
    return $conexion->insert_id; 
	
}
 			mysqli_close($conexion);
								
			//echo json_encode($json);
			
		}



		else{
			$results["nombre"]='';
			$results["aqui"]='';
			$results["colegio"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
		    $results["nombre"]='';
			$results["dos"]='';
			$results["colegio"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>
