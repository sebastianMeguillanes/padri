<?php 
session_start();
require_once "../model/Rol.php";
$rol=new Rol();

require_once "../model/Permiso.php";
$permiso=new Permiso();

$idrol=isset($_POST["idrol"])? $_POST["idrol"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";

switch ($_GET["op"]){
	case '0':
		$rspta=$rol->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$per="";
			$rsptax = $permiso->listarmarcados($reg['idrol']);
			while ($regx = pg_fetch_assoc($rsptax))
			{
				$per.=$regx['permisonombre'].", ";
			}
			$data[]=array(
				"0"=>($reg['rolcondicion'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idrol'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idrol'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idrol'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idrol'].')"><i class="bx bx-check"></i></button>',
				"1"=>$reg['rolnombre'],
				"2"=>substr($per, 0, -2),
				"3"=>($reg['rolcondicion'])?'<span class="badge badge-default">Activado</span>':
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
		if (empty($idrol)){
			$rspta=$rol->insertar($nombre,$_POST["permisos"]);
			echo $rspta ? "1:El Rol fué registrado" : "0:El Rol no fué registrado";
		}
		else {
			$rspta=$rol->editar($idrol,$nombre,$_POST["permisos"]);
			echo $rspta ? "1:El Rol fué actualizado" : "0:El Rol no fué actualizado";
		}
	break;

	case '2':
		$rspta=$rol->desactivar($idrol);
 		echo $rspta ? "1:El Rol fué Desactivado" : "0:El Rol no fué Desactivado";
	break;

	case '3':
		$rspta=$rol->activar($idrol);
 		echo $rspta ? "1:El Rol fué Activado" : "0:El Rol no fué Activado";
	break;

	case '4':
		$rspta=$rol->mostrar($idrol);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $rol->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idrol'] . '>' . $reg['rolnombre'] . '</option>';
		}
	break;
}
?>