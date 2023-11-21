<?php 

require_once "global.php";
$conexion = pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USERNAME." password=".DB_PASSWORD."");

if (!$conexion)
{
	printf("Error : Unable to open database\n");
	exit();
}
    
if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = pg_query($conexion, $sql);
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = pg_query($conexion, $sql);
		$row = pg_fetch_assoc($query);
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = pg_query($conexion, $sql);
		$row = pg_fetch_array($query);
		$new_id = $row['0'];
		return $new_id;
	}
	
	function cerrar_conexion($sql)
	{
		global $conexion;
		pg_close($conexion);
		return true;
	}
	
}

?>