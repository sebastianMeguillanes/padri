<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Atencion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.idatencion, a.fecha_atencion, e.nombreestudiante, a.condicionatencion, a.accion_atencion
		FROM atencion a, estudiante e
        WHERE (a.idestudiante=e.idestudiante);";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario_session,$fecha_atencion, $idestudiante, $accion_atencion)
	{
		$sql="INSERT INTO atencion(fecha_atencion, idestudiante, accion_atencion)
            VALUES ('$fecha_atencion', '$idestudiante', '$accion_atencion') RETURNING idatencion;";
			$idatencion = ejecutarConsulta_retornarID($sql);
			$sqlx = "INSERT INTO registro_atencion (id_usuariop, idatencion, idtipoaccion, fechaaccion, horaaccion)
			VALUES ('$idusuario_session', '$idatencion', '1', CURRENT_DATE, CURRENT_TIME);";
			return ejecutarConsulta($sqlx);
	}

	//Implementamos un método para editar registros
	public function editar($idatencion, $fecha_atencion, $idestudiante, $accion_atencion)
	{
		$sql="UPDATE atencion SET fecha_atencion='$fecha_atencion', idestudiante='$idestudiante', accion_atencion='$accion_atencion'
			WHERE idatencion='$idatencion';";
			return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idatencion)
	{
		$sql="UPDATE atencion SET condicionatencion='0' WHERE idatencion='$idatencion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idatencion)
	{
		$sql="UPDATE atencion SET condicionatencion='1' WHERE idatencion='$idatencion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idatencion)
	{
		$sql="SELECT a.idatencion, a.fecha_atencion, e.idestudiante, a.accion_atencion
        FROM atencion a, estudiante e
        WHERE (a.idestudiante=e.idestudiante) AND (idatencion='$idatencion')";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idatencion, fecha_atencion, accion_atencion FROM atencion 
		WHERE (condicionatencion=1)";
		return ejecutarConsulta($sql);		
	}

}

?>
