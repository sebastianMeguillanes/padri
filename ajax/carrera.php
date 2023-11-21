<?php 
session_start();
require_once "../model/Carrera.php";
$carrera=new Carrera();
require_once "seguridad.php";
$seguridad=new seguridad();

$idcarrera=isset($_POST["idcarrera"])? $_POST["idcarrera"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$departamento=isset($_POST["departamento"])? $_POST["departamento"]:"";

switch ($_GET["op"]){
	case '0':
		$rspta=$carrera->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['condicioncarrera'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idcarrera'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idcarrera'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idcarrera'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idcarrera'].')"><i class="bx bxs-check-square"></i></button>',
				"1"=>$reg['nombrecarrera'],
                "2"=>$reg['nombredepartamento'],
				"3"=>($reg['condicioncarrera'])?'<span class="badge bg-primary">Activado</span>':
					'<span class="badge bg-danger">Desactivado</span>'
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
		if (empty($idcarrera)){
			$rspta=$carrera->insertar($nombre, $departamento);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}
		else {
			$rspta=$carrera->editar($idcarrera,$nombre, $departamento);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";
		}
	break;

	case '2':
		$rspta=$carrera->desactivar($idcarrera);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3':
		$rspta=$carrera->activar($idcarrera);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4':
		$rspta=$carrera->mostrar($idcarrera);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $carrera->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idcarrera'] . '>' . $reg['nombrecarrera'] . '</option>';
		}
	break;
}
?>