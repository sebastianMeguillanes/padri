<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Hoja_ruta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT r.idruta,r.fecharuta,d.tipoderivacion,r.descripcionruta,r.condicionruta
        FROM hoja_ruta r, derivacion d
		WHERE (r.idderivacion=d.idderivacion);";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario_session,$fecharuta,$idderivacion,$descripcionruta)
	{
        $sql="INSERT INTO hoja_ruta (fecharuta,idderivacion,descripcionruta)
		VALUES ('$fecharuta','$idderivacion','$descripcionruta') RETURNING idruta;";
        $idruta = ejecutarConsulta_retornarID($sql);
		$sqlx = "INSERT INTO registro_hoja_ruta (id_usuariop, idruta, idtipoaccion, fechaaccion, horaaccion)
		VALUES ('$idusuario_session', '$idruta', '1', CURRENT_DATE, CURRENT_TIME);";
		return ejecutarConsulta($sqlx);

	}

	//Implementamos un método para editar registros
	public function editar($idusuario_session,$idruta,$fecharuta,$idderivacion,$descripcionruta)
	{ 
    	$sql="UPDATE hoja_ruta SET fecharuta='$fecharuta',idderivacion='$idderivacion',descripcionruta='$descripcionruta'
		WHERE idruta='$idruta'RETURNING idruta;";
        $idruta = ejecutarConsulta_retornarID($sql);
		$sqlx = "INSERT INTO registro_hoja_ruta (id_usuariop, idruta, idtipoaccion, fechaaccion, horaaccion)
		VALUES ('$idusuario_session', '$idruta', '2', CURRENT_DATE, CURRENT_TIME);";
		return ejecutarConsulta($sqlx);
	}
	//Implementamos un método para desactivar categorías
	public function desactivar($idruta)
	{
		$sql="UPDATE hoja_ruta SET condicionruta='0' WHERE idruta='$idruta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idruta)
	{
		$sql="UPDATE hoja_ruta SET condicionruta='1' WHERE idruta='$idruta'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idruta)
	{
		$sql="SELECT r.idruta,r.fecharuta,d.idderivacion,r.descripcionruta
        FROM hoja_ruta r, derivacion d
		WHERE (r.idderivacion=d.idderivacion) AND (idruta='$idruta');";
		return ejecutarConsultaSimpleFila($sql);
		

	}

	public function select()
	{		
		$sql="SELECT idderivacion, tipoderivacion FROM derivacion
		WHERE (condicionderivacion=1)";
		return ejecutarConsulta($sql);	
	}

	
	
}
?>