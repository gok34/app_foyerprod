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


    if (isset($_POST['tipoenvio'])) {
        // captura de datos desde un formulario
        //$title1              = ($_POST['nombre']);
        // $nombre              = ($_POST['nombre']);
        //$id_vendedor              = 7;
        //  $pass              = ($_POST['password']);
        //  $codigousuario              = ($_POST['codigousuario']);
        // $tipousuario             = ($_POST['tipousuario']);
        // $sexo             = ($_POST['sexo']);
        //$cadena_rutas = implode(" , ", $rutas);
        $tipoenvio = ($_POST['tipoenvio']);
        $orden = ($_POST['orden']);
		  $lugardestino = ($_POST['lugardestino']);
		   $solicitadopor = ($_POST['solicitadopor']);
        $cantidadbolsa = ($_POST['cantidadbolsa']);
        $cajapeque = ($_POST['cajapeque']);
        $cajamediana = ($_POST['cajamediana']);
        $cajagrandei = ($_POST['cajagrande']);

        $bulto = ($_POST['bulto']);

        //
		if (isset($_POST['clientes'])) {
			 $clientes = ($_POST['clientes']);
		}else {
			$clientes=0;
		}
       
	   
        
		if (isset($_POST['areadestino'])) {
			   $areadestino = ($_POST['areadestino']);
		}else {
			// $areadestino="";
		}

        //$departamento = ($_POST['departamento']);

		if (isset($_POST['departamento1'])) {
			    $departamento = ($_POST['departamento1']);
		}else {
		 $departamento=0;
		}
		
        if ($cajagrandei <= 1) {
            $cajagrande = $cajagrandei;
            $cajaseundaria = 0;
        } else {

            $total = $cajagrandei - 1;
            $cajagrande = 1;
            $cajaseundaria = $total;
        }

        /* //validacion obsrvaciones
        if (isset($_POST['observaciones'])) {
            $observaciones = $_POST['observaciones'];
            //$nombre = $nombre2;
        } else {
            $observaciones = "";
        }*/

        //validacion obsrvaciones
        if (isset($_POST['observacionesvarias'])) {
            $observaciones = $_POST['observacionesvarias'];
            //$nombre = $nombre2;
        } else {
            $observaciones = "";
        }
if (isset($_POST['numerodeguia1'])) {
            $numerodeguia = $_POST['numerodeguia1'];
            //$nombre = $nombre2;
        } else {
            $numerodeguia = 0;
        }
        //validacion numereo de guia
        if (isset($_POST['numerodeguia1'])) {
            $numerodeguia1 = $_POST['numerodeguia1'];
            //$nombre = $nombre2;
        } else {
            $numerodeguia1 = 0;
        }
		
		
		
		if (isset($_POST['numerodeguia2'])) {
            $numerodeguia2 = $_POST['numerodeguia2'];
            //$nombre = $nombre2;
        } else {
            $numerodeguia2 = 0;
        }
        //validacion de fecha de entrega
        if (isset($_POST['fechaentrega'])) {
            $fechaentregai = $_POST['fechaentrega'];
			      //$fechaentrega=$fechaentregai." ".$hora;
			
            //$nombre = $nombre2;
        } else {
            $fechaentrega = "0000-00-00 00:00:00.000000";
        }


        //
        echo $tipoenvio;
        echo $orden;
        echo $cantidadbolsa;
        echo $clientes;
        echo $departamento;
        echo $areadestino;
		  echo $numerodeguia;
		  
		  
		  
        $tipoempaque = "Bolsa = " .$cantidadbolsa . " ,  Caja Pequeña = " . $cajapeque . " ,      Caja Mediana = " . $cajamediana . " ,  Caja Grande = " . $cajagrande . "  , Bulto = " . $bulto;

        //echo $fecha . $hora,'<br>';
        //echo $sector,'<br>';
        //echo $id_vendedor,'<br>';
        //echo $cadena_rutas,'<br>';

        //echo count($rutas),'<br>';

        //foreach ($rutas as $result) {
        //echo $result, '<br>';


        //$conexion = mysqli_connect($hostname, $username, $password, $database);
if($tipoenvio=="interno"){
		if($areadestino=='cliente'){
			$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','$clientes','$departamento','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		
		else if($areadestino=='institucional'){
			$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888888','46','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		else if($areadestino=='xela'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888890','47','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		else if($areadestino=='sanus'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888891','48','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		else if($areadestino=='agudef'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888892','49','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		
		}
		
		else if($tipoenvio=="cargo"){
		
if($areadestino=='cliente'){
			$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','$clientes','$departamento','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','VA POR CARGO EXPRESS','$bulto','$tipoempaque','$tipoenvio /No. $numerodeguia1')";
		}
		
		else if($areadestino=='institucional'){
			$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888888','46','1','$fechahoy.','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','VA POR CARGO EXPRESS','$bulto','$tipoempaque','$tipoenvio /No. $numerodeguia2')";
		}
		else if($areadestino=='xela'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888890','47','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		else if($areadestino=='sanus'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888891','48','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}
		else if($areadestino=='agudef'){
				$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888892','49','1','$fechahoy','$areadestino',' $cantidadbolsa','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$observaciones','$bulto','$tipoempaque','$tipoenvio')";
		}		
			
			
			
			
			
			
		}
		else if($tipoenvio=="mandado"){
		

			$query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','8888893','50','1','$fechahoy','$lugardestino','null','$cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','Solicidado Por: $solicitadopor','$bulto','Lugar de Destino: $lugardestino','$lugardestino')";
		
		
		
			
			
			
			
			
			
		}
		
        

        $sql = $dbConn->prepare($query);
        $sql->execute();

        

        if ($sql->rowCount() > 0) {
            //  header("HTTP/1.1 200 OK");
            //  $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
            header('Location: agregarpedido.php');
        } else {
            //  header("HTTP/1.1 403 OK");
            // $data = ['code' => "403", 'mensaje' => "No se almacenado "];
            // echo json_encode($data);
            header('Location: reportegeneral.php');
        }
    } else {
        //header("HTTP/1.1 403 OK");
        // $data = ['code' => "403", 'mensaje' => "datos vacios "];
        header('Location: reportegeneral.php');
    }
} else {

    header("HTTP/1.1 403 ERROR");
    $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
    echo json_encode($data);
}
