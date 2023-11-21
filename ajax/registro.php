<?php
session_start();
require_once "../model/Registro.php";
$registro = new Registro();


switch ($_GET["op"]){
	case '0':
        $rspta = $registro->listar();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>$reg['nombreusuariop'],
                "1"=>$reg['nombreusuarioe'],
                "2"=>$reg['tiponombre'],
                "3"=>$reg['fechaaccion'],
                "4"=>$reg['horaaccion'],
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
        $rspta = $registro->listar_regsitros_personal();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>$reg['nombreusuariop'],
                "1"=>$reg['nombreusuarioe'],
                "2"=>$reg['tiponombre'],
                "3"=>$reg['fechaaccion'],
                "4"=>$reg['horaaccion'],
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
    case '2':
        $rspta = $registro->listar_registros_hojaruta();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>$reg['nombreusuariop'],
                "1"=>$reg['remitentederivacion'],
                "2"=>$reg['destinatarioderivacion'],
                "3"=>$reg['tiponombre'],
                "4"=>$reg['fechaaccion'],
                "5"=>$reg['horaaccion'],
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
    case '3':
        $rspta = $registro->listar_registros_servicios();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>$reg['nombreusuariop'],
                "1"=>$reg['nombreservicio'],
                "2"=>$reg['tiponombre'],
                "3"=>$reg['fechaaccion'],
                "4"=>$reg['horaaccion'],
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
    case '4':
        $rspta = $registro->listar_registros_atenciones();
        //Vamos a declarar un array
        $data = Array();
    
        while ($reg = pg_fetch_assoc($rspta)){

            $data[]=array(
                "0"=>$reg['nombreusuariop'],
                "1"=>$reg['remitentederivacion'],
                "2"=>$reg['tiponombre'],
                "3"=>$reg['fechaaccion'],
                "4"=>$reg['horaaccion'],
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
}

?>