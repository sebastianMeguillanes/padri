<?php 
session_start();
require_once "../model/Atencion.php";
$atencion=new Atencion();
require_once "seguridad.php";
$seguridad=new seguridad();

$idusuario_session=$_SESSION['id_usuariop'];
$idatencion=isset($_POST["idatencion"])? $_POST["idatencion"]:"";
$fecha_atencion=isset($_POST["fecha_atencion"])? mb_strtoupper($_POST["fecha_atencion"]):"";
$idestudiante=isset($_POST["idestudiante"])? $_POST["idestudiante"]:"";
$accion_atencion=isset($_POST["accion_atencion"])? mb_strtoupper($_POST["accion_atencion"]):"";

switch ($_GET["op"]){
	case '0':
		$rspta=$atencion->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['condicionatencion'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idatencion'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idatencion'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idatencion'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idatencion'].')"><i class="bx bxs-check-square"></i></button>',
				"1"=>$reg['fecha_atencion'],
                "2"=>$reg['nombreestudiante'],
                "3"=>$reg['accion_atencion'],
				"4"=>($reg['condicionatencion'])?'<span class="badge badge-default">Activado</span>':
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
		if (empty($idatencion)){
			$rspta=$atencion->insertar($idusuario_session,$fecha_atencion, $idestudiante, $accion_atencion);
			echo $rspta ? "1:La Atención fué registrada" : "0:La Atención no fué registrado";
		}
		else {
			$rspta=$atencion->editar($idatencion, $fecha_atencion, $idestudiante, $accion_atencion);
			echo $rspta ? "1:La Atención fué actualizada" : "0:La Atención no fué actualizada";
		}
	break;

	case '2':
		$rspta=$atencion->desactivar($idatencion);
 		echo $rspta ? "1:La Atención fué Desactivada" : "0:La Atención no fué Desactivada";
	break;

	case '3':
		$rspta=$atencion->activar($idatencion);
 		echo $rspta ? "1:La Atención fué Activada" : "0:La Atención no fué Activada";
	break;

	case '4':
		$rspta=$atencion->mostrar($idatencion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
}
?>