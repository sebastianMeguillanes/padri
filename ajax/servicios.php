<?php 
session_start();
require_once "../model/servicios.php";
$servicio=new Servicio();

require_once "../model/user.php";
$user=new usuario();

$idusuario_session=$_SESSION['id_usuariop'];
$idservicio=isset($_POST["idservicio"])? $_POST["idservicio"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";

switch ($_GET["op"]){
	case '0':
		$rspta=$servicio->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$per="";
			$rsptax = $user->listarmarcados($reg['idservicio']);
			while ($regx = pg_fetch_assoc($rsptax))
			{
				$per.=$regx['nombreusuarioe'].", ";
			}
			$data[]=array(
				"0"=>($reg['condicionservicio'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idservicio'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idservicio'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idservicio'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idservicio'].')"><i class="bx bx-check"></i></button>',
				"1"=>$reg['nombreservicio'],
				"2"=>substr($per, 0, -2),
				"3"=>($reg['condicionservicio'])?'<span class="badge badge-default">Activado</span>':
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
		if (empty($idservicio)){
			$rspta=$servicio->insertar($idusuario_session,$nombre,$_POST["usuario"]);
			echo $rspta ? "1:El Servicio fue registrado" : "0:El Servicio no fue registrado";
		}
		else {
			$rspta=$servicio->editar($idusuario_session,$idservicio,$nombre,$_POST["usuario"]);
			echo $rspta ? "1:El Servicio fue actualizado" : "0:El Servicio no fue actualizado";
		}
	break;

	case '2':
		$rspta=$servicio->desactivar($idusuario_session,$idservicio);
 		echo $rspta ? "1:El Servicio fue Desactivado" : "0:El Servicio no fue Desactivado";
	break;

	case '3':
		$rspta=$servicio->activar($idusuario_session,	$idservicio);
 		echo $rspta ? "1:El Servicio fue Activado" : "0:El Servicio no fue Activado";
	break;

	case '4':
		$rspta=$servicio->mostrar($idservicio);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $servicio->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idservicio'] . '>' . $reg['nombreservicio'] . '</option>';
		}
	break;
}
?>