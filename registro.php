<?PHP
$hostname="us-cdbr-iron-east-05.cleardb.net";
$database="heroku_b6d2af3a334b261";
$username="b69c63209565c4";
$password="07e0c5d1";
$json=array();
	if(isset($_GET["names"])&&($_GET["user"]) && isset($_GET["pwd"])){
		$names=$_GET['names'];
		$user=$_GET['user'];
		$pwd=$_GET['pwd'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="INSERT INTO usuarios(names, user, pwd) VALUES ('{$names}','{$user}' , '{$pwd}')";
		$resultado=mysqli_query($conexion,$consulta);

       
		if($consulta){
		   $consulta="SELECT * FROM usuarios  WHERE names='{$names}'";
		   $resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["names"]='';
			$results["user"]='';
			$results["pwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
		    $results["names"]='';
		   	$results["user"]='';
			$results["pwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>
