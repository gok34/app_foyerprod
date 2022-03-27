<?PHP

include "permisos.php";



$json = array();

include "config.php";
include "utils.php";
$dbConn =  connect($db);
$dbConn1 =  connect($dbdigital);
date_default_timezone_set('America/Guatemala');
$fechahoy = date("Y-m-d H:i:s");
//echo $fechahoy;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{


//$dbConn =  connect($db);
//valido valores viene vacio
if (isset($_GET["id_usuario"])) {
    $id_usuario = $_GET['id_usuario'];

    //validcion de estdo de fotos
    $consulta = "SELECT estado FROM control WHERE id_usuario= '{$id_usuario}'  AND DATE(fecha) = CURDATE()  ORDER BY id DESC LIMIT 1 ";
    $consulta2 = "SELECT estado FROM control WHERE id_usuario= '{$id_usuario}'  and DATE(fecha)=CURDATE()-1 ORDER BY id DESC  limit 1  ";


    //validacion de dia anterio
    $sql1 = $dbConn1->prepare($consulta2);
    $sql1->execute();

    $reg1 = $sql1->fetch(PDO::FETCH_ASSOC);
    // echo $reg1['estado'];
    //validacion del dia anterio
    if ($reg1['estado'] == 1) {
         header('Content-Type: application/json');
        header("HTTP/1.1 200 OK");
        $data = ['code' => "200", 'estado' => '2', 'mensaje' => "no hay foto de cierre de dia"];
        echo json_encode($data);
    } else {




        //validacion de conuslta del dia
        $sql = $dbConn1->prepare($consulta);
        $sql->execute();
        //echo $sql->rowCount();

        //validacion que esta correto el utlimo dato
        if ($sql->rowCount() == 0) {
            header("HTTP/1.1 200 OK");
            $data = ['code' => "200",'estado' =>'1' ,'mensaje' => "no hay datos"];
            echo json_encode($data);
        } else {
            if ($reg = $sql->fetch(PDO::FETCH_ASSOC)) {
                // echo $reg['estado'];

                if ($reg['estado'] == 1) {
                     header('Content-Type: application/json');
                    header("HTTP/1.1 200 OK");
                    $data = ['code' => "200", 'estado' => '2', 'mensaje ' => 'No ha cerrado ultima ruta'];
                    $json = $data;
                    echo json_encode($json);
                } else if ($reg['estado'] == 2) {
                     header('Content-Type: application/json');
                    header("HTTP/1.1 200 OK");
                    $data = ['code' => "200", 'estado' => '1','mensaje ' => 'bbba'];
                    $json = $data;
                    echo json_encode($json);
                } else {
                     header('Content-Type: application/json');
                    header("HTTP/1.1 200 OK");
                    $data = ['code' => "405", 'estado' => '1','mensaje ' => 'aaa'];
                    $json = $data;
                    echo json_encode($json);
                }
            }
        }
        

    
        //validcion de cambos

    }
} else {
    header("HTTP/1.1 403 ERROR");
    $data = ['code' => "403", 'mensaje' => "id vacio "];
    echo json_encode($data);
}
}else {

     header("HTTP/1.1 403 ERROR");
   $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
   echo json_encode($data);
}
