<?PHP

include "config.php";
include "utils.php";


$dbConn =  connect($dbdigital);

$json=array();


if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	

    if (isset($_GET['usuername']))
    {

      $sql = $dbConn->prepare("SELECT * FROM usuarios");
    //  $sql->bindValue(':usuername', $_GET['usuername']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
   $array= $sql->fetch(PDO::FETCH_ASSOC)  ;
        $Array['datos'][]=$array;
        file_put_contents('jui0001.json', json_encode( $array));

        $Array = json_decode(json_encode($Array),true);
        if( empty( $Array ) ) {
            return;
        }
        ob_start();
        foreach($Array['datos'] as $result) {
            echo $result['nombre'], '<br>',$result['id'];
        }


        exit();
	 
	   }
	  else {

      $sql = $dbConn->prepare("SELECT * FROM usuarios");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
	  
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
	
	

}
   


		
/*
		if (!$conexion) {
    die("Problemas con la conexion " . mysqli_connect_error());
}
echo "conexion Exitosa";
*/






?>