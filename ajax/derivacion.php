<?php 
session_start();
require_once "../model/Derivacion.php";
$derivacion=new Derivacion();
require_once "seguridad.php";
$seguridad=new seguridad();

$idderivacion=isset($_POST["idderivacion"])? $_POST["idderivacion"]:"";
$fechaderivacion=isset($_POST["fechaderivacion"])? mb_strtoupper($_POST["fechaderivacion"]):"";
$remitentederivacion=isset($_POST["remitentederivacion"])? $_POST["remitentederivacion"]:"";
$destinatarioderivacion=isset($_POST["destinatarioderivacion"])? mb_strtoupper($_POST["destinatarioderivacion"]):"";
$idpersonal=isset($_POST["idpersonal"])? $_POST["idpersonal"]:"";
$tipoderivacion=isset($_POST["tipoderivacion"])? $_POST["tipoderivacion"]:"";


switch ($_GET["op"]){
	case '0':
        $rspta = $derivacion->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){
            $data[]=array(
                "0"=>($reg['condicionderivacion'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idderivacion'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idderivacion'].')"><i class="bx bx-trash"></i></button>':
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idderivacion'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idderivacion'].')"><i class="material-icons">done</i>></i></button>',
                "1"=>$reg['fechaderivacion'],
                "2"=>$reg['remitentederivacion'],
                "3"=>$reg['destinatarioderivacion'],
                "4"=>$reg['personalnombre'],
                "5"=>$reg['tipoderivacion'],
                "6"=>($reg['condicionderivacion'])?'<span class="badge badge-default">Activado</span>':
                    '<span class="badge badge-default">Desactivado</span>'
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    
    break;
	case '1':
		if (empty($idderivacion)){
			//echo json_encode($remitentederivacion);
			$rspta=$derivacion->insertar($fechaderivacion,$remitentederivacion,$destinatarioderivacion,$idpersonal,$tipoderivacion);
			echo $rspta ? "1:La derivacion fué registrado" : "0:La derivacion no fué registrado";
		}
		else {

			$rspta=$derivacion->editar($idderivacion,$fechaderivacion,$remitentederivacion,$destinatarioderivacion,$idpersonal,$tipoderivacion);
			echo $rspta ? "1:La derivacion fué actualizado" : "0:La derivacion no fué actualizado";
		}
	break;
    case '2':
		$rspta=$derivacion->desactivar($idderivacion);
 		echo $rspta ? "1:La derivacion fué Desactivado" : "0:La derivacion no fué Desactivado";
	break;

	case '3':
		$rspta=$derivacion->activar($idderivacion);
 		echo $rspta ? "1:La derivacion fué Activado" : "0:La derivacion no fué Activado";
	break;

	case '4':
		$rspta=$derivacion->mostrar($idderivacion);
 		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $derivacion->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idderivacion'] . '>' . $reg['tipoderivacion'] . '</option>';
		}
	break;

}
?>