<?php 
session_start();
require_once "../model/User.php";
$usuario=new usuario();
require_once "seguridad.php";
$seguridad=new seguridad();

$idusuario_session=$_SESSION['id_usuariop'];
$idusuario=isset($_POST["idusuario"])? $_POST["idusuario"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$email=isset($_POST["email"])? $_POST["email"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";
$num_documento=isset($_POST["num_documento"])? mb_strtoupper($_POST["num_documento"]):"";
$tipo_estudiante=isset($_POST["tipoestudiante"])? $_POST["tipoestudiante"]:"";
$idcarrera=isset($_POST["carrera"])? $_POST["carrera"]:"";
$login=isset($_POST["login"])? $_POST["login"]:"";
$clave=isset($_POST["clave"])? $_POST["clave"]:"";

switch ($_GET["op"]){
	case '0':
        $rspta = $usuario->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>($reg['usuariocondicion'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idusuarioe'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['idusuarioe'].')"><i class="bx bx-trash"></i></button>':
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['idusuarioe'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['idusuarioe'].')"><i class="material-icons">done</i>></i></button>',
                "1"=>$reg['nombreestudiante'],
                "2"=>$reg['telefonoestudiante'],
                "3"=>$reg['identificacionestudiante'],
                "4"=>$reg['correoestudiante'],
                "5"=>$reg['nombreusuarioe'],
                "6"=>($reg['usuariocondicion'])?'<span class="badge badge-default">Activado</span>':
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
        //Hash SHA256 en la contraseña
		$clavehash=$seguridad->stringEncryption('encrypt', $clave);
		if (empty($idusuario)){
			$rspta=$usuario->insertar($idusuario_session,$nombre,$email,$telefono,$num_documento,$tipo_estudiante,$idcarrera,$login,$clavehash);
			echo $rspta ? "1:El usuario fué registrado" : "0:El usuario no fué registrado";
		}
		else {
			$rspta=$usuario->editar($idusuario_session,$idusuario,$nombre,$email,$telefono,$num_documento,$tipo_estudiante,$idcarrera,$login,$clavehash);
			echo $rspta ? "1:El usuario fué actualizado" : "0:El usuario no fué actualizado";
		}
	break;
    case '2':
		$rspta=$usuario->desactivar($idusuario_session,$idusuario);
 		echo $rspta ? "1:El usuario fué Desactivado" : "0:El usuario no fué Desactivado";
	break;

	case '3':
		$rspta=$usuario->activar($idusuario_session,$idusuario);
 		echo $rspta ? "1:El usuario fué Activado" : "0:El usuario no fué Activado";
	break;

	case '4':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
	
			$logina=$_POST['logina'];
			$clavea=$_POST['clavea'];
			//echo '$clavea antes de encriptar: '.$clavea.'<br>';
			//Hash SHA256 en la contraseña
			$clavehash=$seguridad->stringEncryption('encrypt', $clavea);
			//echo '$clavehash encriptado: '.$clavehash.'<br>';
			$rspta=$usuario->verificar($logina, $clavehash);
			$numRows = pg_num_rows($rspta);
			//$contador=0;a
			//echo '$coincidencias encontradas: '.$numRows.'<br>';
			echo $numRows ;
			while ($fetch= pg_fetch_assoc($rspta)){
				
				//Declaramos las variables de sesión
				$_SESSION['idusuarioe']=$fetch['idusuarioe'];
				$_SESSION['nombreestudiante']=$fetch['nombreestudiante'];

				//echo $_SESSION['idusuarioe'];

			}
	break;

	  
	  
	case "6":		
		$prueba=$seguridad->stringEncryption('decrypt', $clave);
		echo $prueba;
	break;

	case '7':
		$rspta = $usuario->select2();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idestudiante'] . '>' . $reg['nombreestudiante'] . '</option>';
		}
		
	break;

	case '8':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../view/sign-in.php");
	break;
	case '9':
		$rspta = $usuario->select();

        while ($reg = pg_fetch_assoc($rspta))
        {
            echo '<option value=' . $reg['idusuarioe'] . '>' . $reg['nombreusuarioe'] . '</option>';
        }
	break;

	case "10":
		$rspta = $usuario->listar();
		$idusuarioe=$_GET['id'];
		$marcados = $usuario->listarmarcados($idusuarioe);
		$valores=array();
		while ($per = pg_fetch_assoc($marcados))
			{
				array_push($valores, $per['idusuarioe']);
			}
		while ($reg = pg_fetch_assoc($rspta))
			{
				$sw=in_array($reg['idusuarioe'],$valores)?'selected="selected"':'';
				echo '<option value=' . $reg['idusuarioe'] . ' '.$sw.'>'.$reg['nombreusuarioe'].'</option>';
			}
	break;
}

?>