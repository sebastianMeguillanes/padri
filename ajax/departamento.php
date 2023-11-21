<?php 

session_start();
require_once "../model/Departamento.php";
$departamento=new Departamento();
require_once "seguridad.php";
$seguridad=new seguridad();

$iddepartamento=isset($_POST["iddepartamento"])? $_POST["iddepartamento"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";

switch ($_GET["op"]){
	case '0':
        $rspta = $departamento->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>($reg['condiciondepartamento'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['iddepartamento'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['iddepartamento'].')"><i class="bx bx-trash"></i></button>':
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['iddepartamento'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['iddepartamento'].')"><i class="material-icons">done</i>></i></button>',
                "1"=>$reg['nombredepartamento'],
                "2"=>($reg['condiciondepartamento'])?'<span class="badge h5 custom-font-size rounded-pill  bg-success">Activado</span>':
                    '<span class="badge h5 custom-font-size rounded-pill  bg-danger">Desactivado</span>'
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
		if (empty($iddepartamento)){
			$rspta=$departamento->insertar($nombre);
			echo $rspta ? "1:El departamento fué registrado" : "0:El departamento no fué registrado";
		}
		else {
			$rspta=$departamento->editar($iddepartamento,$nombre);
			echo $rspta ? "1:El departamento fué actualizado" : "0:El departamento no fué actualizado";
		}
	break;
    case '2':
		$rspta=$departamento->desactivar($iddepartamento);
 		echo $rspta ? "1:El departamento fué Desactivado" : "0:El departamento no fué Desactivado";
	break;

	case '3':
		$rspta=$departamento->activar($iddepartamento);
 		echo $rspta ? "1:El departamento fué Activado" : "0:El departamento no fué Activado";
	break;

	case '4':
		$rspta=$departamento->mostrar($iddepartamento);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $departamento->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['iddepartamento'] . '>' . $reg['nombredepartamento'] . '</option>';
		}
	break;
}
?>