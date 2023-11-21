<?php 
session_start();
require_once "../model/Hoja_ruta.php";
$hoja_ruta=new Hoja_ruta();
require_once "seguridad.php";
$seguridad=new seguridad();

$idusuario_session=$_SESSION['id_usuariop'];
$idruta=isset($_POST["idruta"])? $_POST["idruta"]:"";
$fecharuta=isset($_POST["fecharuta"])? mb_strtoupper($_POST["fecharuta"]):"";
$idderivacion=isset($_POST["idderivacion"])? $_POST["idderivacion"]:"";
$descripcionruta=isset($_POST["descripcionruta"])? $_POST["descripcionruta"]:"";


switch ($_GET["op"]){
	case '0':
        $rspta = $hoja_ruta->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>($reg['condicionruta'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idruta'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idruta'].')"><i class="bx bx-trash"></i></button>':
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idruta'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idruta'].')"><i class="material-icons">done</i>></i></button>',
                "1"=>$reg['fecharuta'],
                "2"=>$reg['tipoderivacion'],
                "3"=>$reg['descripcionruta'],
                "4"=>($reg['condicionruta'])?'<span class="badge badge-default">Activado</span>':
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

		if (empty($idruta)){
			//echo json_encode($remitentederivacion);
			$rspta=$hoja_ruta->insertar($idusuario_session,$fecharuta,$idderivacion,$descripcionruta);
			echo $rspta ? "1:Hoja de ruta registrado" : "0:Hoja de ruta no registrado";
		}
		else {

			$rspta=$hoja_ruta->editar($idusuario_session,$idruta,$fecharuta,$idderivacion,$descripcionruta);
			echo $rspta ? "1:Hoja de ruta actualizado" : "0:Hoja de ruta no actualizado";
		}
	break;
    case '2':
		$rspta=$hoja_ruta->desactivar($idruta);
 		echo $rspta ? "1:Hoja de ruta Desactivado" : "0:Hoja de ruta no Desactivado";
	break;

	case '3':
		$rspta=$hoja_ruta->activar($idruta);
 		echo $rspta ? "1:Hoja de ruta Activado" : "0:Hoja de ruta no Activado";
	break;

	case '4':
		$rspta=$hoja_ruta->mostrar($idruta);
 		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case '5':
		$rspta = $hoja_ruta->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idruta'] . '>' . $reg['tipoderivacion'] . '</option>';
		}
	break;

}
?>