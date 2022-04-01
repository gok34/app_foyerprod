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
        $cantidadbolsa = ($_POST['cantidadbolsa']);
        $cajapeque = ($_POST['cajapeque']);
        $cajamediana = ($_POST['cajamediana']);
        $cajagrandei = ($_POST['cajagrande']);

        $bulto = ($_POST['bulto']);

        //
        $clientes = ($_POST['clientes']);
        $areadestino = ($_POST['areadestino']);

        $departamento = ($_POST['departamento']);

        if ($cajagrande >= 1) {
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

        //validacion numereo de guia
        if (isset($_POST['numerodeguia'])) {
            $numerodeguia = $_POST['numerodeguia'];
            //$nombre = $nombre2;
        } else {
            $numerodeguia = 0;
        }
        //validacion de fecha de entrega
        if (isset($_POST['fechaentrega'])) {
            $fechaentrega = $_POST['fechaentrega'];
            //$nombre = $nombre2;
        } else {
            $fechaentrega = "";
        }




        //
        /*echo $tipoenvio;
        echo $orden;
        echo $cantidadbolsa;
        echo $clientes;
        echo $departamento;
        echo $areadestino;*/
        $tipoempaque = "bolsa = " . $cantidadbolsa . " ,  caja pequeña =" . $cajapeque . " ,  caja Mediana = " . $cajamediana . " ,  caja grande = " . $cajagrande . "bulto = " . $bulto;

        //echo $fecha . $hora,'<br>';
        //echo $sector,'<br>';
        //echo $id_vendedor,'<br>';
        //echo $cadena_rutas,'<br>';

        //echo count($rutas),'<br>';

        //foreach ($rutas as $result) {
        //echo $result, '<br>';


        //$conexion = mysqli_connect($hostname, $username, $password, $database);

        $query = "INSERT INTO control_reparto(num_orde,Cliente,departamento_reparto,Estado_reparto,fecha_creacion,area_destino,bolsa_pequeña,caja_pequeña,caja_mediana,caja_grande,cajas_secundaria,guia_cargo,fechadeentregacargo,observacionesvarias,bulto,tipo_de_empaque,tipoenvio)
                                                        VALUES('$orden','$clientes','$departamento','1','$fechahoy','$areadestino',' $cantidadbolsa',' $cajapeque','$cajamediana','$cajagrande','$cajaseundaria','$numerodeguia','$fechaentrega','$observaciones','$bulto','$tipoempaque','$tipoenvio')";

        $sql = $dbConn->prepare($query);
        $sql->execute();

        //}


        if ($sql->rowCount() > 0) {
            //  header("HTTP/1.1 200 OK");
            //  $data = ['code' => "200", 'mensaje' => "se almacenado con exito"];
            header('Location: reportegeneral.php');
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
