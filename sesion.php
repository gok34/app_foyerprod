

<?PHP
$hostname="us-cdbr-iron-east-05.cleardb.net";
$database="heroku_b6d2af3a334b261";
$username="b69c63209565c4";
$password="07e0c5d1";
$json=array();
	if(isset($_GET["usuario"]) && isset($_GET["idasistencia"])){
		$user=$_GET['usuario'];
		$pwd=$_GET['idasistencia'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="SELECT usuario, idasistencia, NOMBRE FROM asistencia WHERE  usuario= '{$user}' AND idasistencia = '{$pwd}'";
		
		$resultado=mysqli_query($conexion,$consulta);
		
		
		

		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			
				
					
			}

			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["usuario"]='';
			$results["idasistencia"]='';
			$results["NOMBRE"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
			
			
		}
		
	}
	else{
		   	$results["usuario"]='';
			$results["idasistencia"]='';
			$results["NOMBRE"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>

