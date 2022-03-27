<?PHP
$hostname="us-cdbr-iron-east-05.cleardb.net";
$database="heroku_b6d2af3a334b261";
$username="b69c63209565c4";
$password="07e0c5d1";

$json=array();
	if(isset($_GET["p1"])&&($_GET["p2"])&&($_GET["p3"])&&($_GET["correo"]) && ($_GET["telefono"])){
		$p1=$_GET['p1'];
		$p2=$_GET['p2'];
		$p3=$_GET['p3'];
		$correo=$_GET['correo'];
		$telefono=$_GET['telefono'];
		
		
		
		$hoy ="" . date("d") ."/" . date("m") . "/" . date("Y").",".date("G").":".date("i").":".date("s");
		
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="INSERT INTO EncuestaBI161219(p1,p2,p3,correo,telefono,fecha) VALUES ('{$p1}','{$p2}' , '{$p3}','{$correo}','{$telefono}','{$hoy}')";
		$resultado=mysqli_query($conexion,$consulta);

       
		if($consulta){
		   $consulta="SELECT * FROM EncuestaBI161219  WHERE telefono='{$telefono}'";
		   $resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			
			echo json_encode($json);
		}



		else{
			$results["p1"]='';
			$results["p2"]='';
			$results["p3"]='';
			$results["correo"]='';
			$results["telefono"]='';
			$results["fecha"]=$hoy;
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
		   $results["p1"]='';
			$results["p2"]='';
			$results["p3"]='';
			$results["correo"]='';
			$results["telefono"]='';
			$results["fecha"]=$hoy;
			$json['datos'][]=$results;
			echo json_encode($json);
			
		
		//$hoy = getdate();
//print_r($hoy);
		//echo $hora;
		}
		
?>
