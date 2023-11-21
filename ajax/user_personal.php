<?php 
session_start();
require_once "../model/Personal.php";
$usuario=new Usuario_Personal();
require_once "seguridad.php";
$seguridad=new seguridad();


$idusuario=isset($_POST["idusuario"])? $_POST["idusuario"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$email=isset($_POST["email"])? $_POST["email"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";
$num_documento=isset($_POST["num_documento"])? mb_strtoupper($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? $_POST["direccion"]:"";
$idrol=isset($_POST["rol"])? $_POST["rol"]:"";
$iddepartamento=isset($_POST["departamento"])? $_POST["departamento"]:"";
$login=isset($_POST["login"])? $_POST["login"]:"";
$clave=isset($_POST["clave"])? $_POST["clave"]:"";

switch ($_GET["op"]){
	case '0':
        $rspta = $usuario->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>($reg['usuariocondicion'])?'<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['id_usuariop'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="desactivar('.$reg['id_usuariop'].')"><i class="bx bx-trash"></i></button>':
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="mostrar('.$reg['id_usuariop'].')"><i class="bx bx-pencil"></i></button>'.
                    '<button class="btn btn-icon btn-neutral btn-icon-mini margin-0" onclick="activar('.$reg['id_usuariop'].')"><i class="material-icons">done</i>></i></button>',
                "1"=>$reg['personalnombre'],
                "2"=>$reg['personalcelular'],
                "3"=>$reg['identificacionpersonal'],
                "4"=>$reg['personalemail'],
                "5"=>$reg['nombreusuariop'],
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
			$rspta=$usuario->insertar($nombre,$iddepartamento,$idrol,$telefono,$direccion,$email,$num_documento,$login,$clavehash);
			echo $rspta ? "1:El usuario fué registrado" : "0:El usuario no fué registrado";
		}
		else {
			$rspta=$usuario->editar($idusuario,$nombre,$iddepartamento,$idrol,$telefono,$direccion,$email,$num_documento,$login,$clavehash);
			echo $rspta ? "1:El usuario fué actualizado" : "0:El usuario no fué actualizado";
		}
	break;
    case '2':
		$rspta=$usuario->desactivar($idusuario);
 		echo $rspta ? "1:El usuario fué Desactivado" : "0:El usuario no fué Desactivado";
	break;

	case '3':
		$rspta=$usuario->activar($idusuario);
 		echo $rspta ? "1:El usuario fué Activado" : "0:El usuario no fué Activado";
	break;

	case '4':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
	
		$logina = $_POST['logina'];
$clavea = $_POST['clavea'];
$clavehash = $seguridad->stringEncryption('encrypt', $clavea);
$rspta = $usuario->verificar($logina, $clavehash);
$numRows = pg_num_rows($rspta);
echo $numRows;

if ($numRows > 0) {
    while ($fetch = pg_fetch_assoc($rspta)) {
        $_SESSION['id_usuariop'] = $fetch['id_usuariop'];
        $_SESSION['personalnombre'] = $fetch['personalnombre'];
        $_SESSION['idrol'] = $fetch['idrol'];

        $marcados = $usuario->listarmarcados($fetch['id_usuariop']);

        // Declaramos el array para almacenar todos los permisos marcados
        $valores = array();

        // Almacenamos los permisos marcados en el array
        while ($per = pg_fetch_assoc($marcados)) {
            array_push($valores, $per['idpermiso']);
        }

        // Determinamos los accesos del usuario
        in_array(1, $valores) ? $_SESSION['escritorio'] = 1 : $_SESSION['escritorio'] = 0;
        in_array(2, $valores) ? $_SESSION['añadir'] = 1 : $_SESSION['añadir'] = 0;
        in_array(3, $valores) ? $_SESSION['registros'] = 1 : $_SESSION['registros'] = 0;
        in_array(4, $valores) ? $_SESSION['formularios'] = 1 : $_SESSION['formularios'] = 0;
        in_array(5,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
    }
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

	case '11':
		$rspta = $usuario->select2();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['idpersonal'] . '>' . $reg['personalnombre'] . '</option>';
		}
		
	break;
}
?>