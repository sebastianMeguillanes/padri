<?php 
session_start();
require_once "../model/Permiso.php";

$permiso=new Permiso();
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$id=isset($_POST["id"])? mb_strtoupper($_POST["id"]):"";

switch ($_GET["op"]){

	case '0':
		$rspta=$permiso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){	
 			$data[]=array(
 				"0"=>$reg['permisonombre'],
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
		if (empty($id)){
			$rspta=$permiso->insertar($nombre);
			echo $rspta ? "1:El permiso fue registrado" : "0:El permiso no fue registrado";
		}
		else {
			$rspta=$permiso->editar($id,$nombre);
			echo $rspta ? "1:El permiso fue editado" : "0:El permiso no fue editado";
		}
	break;
	case '2':
		$rspta = $permiso->select();

        while ($reg = pg_fetch_assoc($rspta))
        {
            echo '<option value=' . $reg['idpermiso'] . '>' . $reg['permisonombre'] . '</option>';
        }
	break;
	case "3":
		$rspta = $permiso->listar();
		$id=$_GET['id'];
		$marcados = $permiso->listarmarcados($id);
		$valores=array();
		while ($per = pg_fetch_assoc($marcados))
			{
				array_push($valores, $per['idpermiso']);
			}
		while ($reg = pg_fetch_assoc($rspta))
			{
				$sw=in_array($reg['idpermiso'],$valores)?'selected="selected"':'';
				echo '<option value=' . $reg['idpermiso'] . ' '.$sw.'>'.$reg['permisonombre'].'</option>';
			}
	break;
}
?>