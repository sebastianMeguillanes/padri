<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Servicio{

	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idservicio, nombreservicio, condicionservicio FROM servicio";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario_session,$nombre,$idusuarioe)
	{
		$sql="INSERT INTO servicio (nombreservicio, condicionservicio)
		VALUES ('$nombre', '1') RETURNING idservicio";
		$idservicio = ejecutarConsulta_retornarID($sql);
		
		$num_elementos=0;
		$sw=true;	
		while ($num_elementos < count($idusuarioe))
		{
			$sql_detalle = "INSERT INTO usuario_servicio(idservicio, idusuarioe) VALUES('$idservicio', '$idusuarioe[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		
		return $sw;
		$sqlx = "INSERT INTO registro_servicios (id_usuariop, idservicio, idtipoaccion, fechaaccion, horaaccion)
		VALUES ('$idusuario_session', '$idservicio', '1', CURRENT_DATE, CURRENT_TIME);";
		ejecutarConsulta($sqlx);
	}	
    }

	public function editar($idusuario_session, $idservicio, $nombre, $idusuarioe){
    $sql = "UPDATE servicio SET nombreservicio='$nombre' WHERE idservicio='$idservicio'";
    $idserviciox = ejecutarConsulta($sql);

    $sqldel = "DELETE FROM usuario_servicio WHERE idservicio='$idservicio'";
    ejecutarConsulta($sqldel);

    $num_elementos = 0;
    $sw = true;
    while ($num_elementos < count($idusuarioe)) {
        $sql_detalle = "INSERT INTO usuario_servicio(idservicio, idusuarioe) VALUES('$idservicio', '$idusuarioe[$num_elementos]')";
        ejecutarConsulta($sql_detalle) or $sw = false;
        $num_elementos = $num_elementos + 1;
    }

    $sqlx = "INSERT INTO registro_servicios (id_usuariop, idservicio, idtipoaccion, fechaaccion, horaaccion)
             VALUES ('$idusuario_session', '$idservicio', '2', CURRENT_DATE, CURRENT_TIME)";
    ejecutarConsulta($sqlx);

    return $sw;
	}


	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario_session,$idservicio)
	{
		$sql="UPDATE servicio SET condicionservicio='0' WHERE idservicio='$idservicio' RETURNING idservicio";
		$idservicio = ejecutarConsulta_retornarID($sql);
		$sqlx = "INSERT INTO registro_servicios (id_usuariop, idservicio, idtipoaccion, fechaaccion, horaaccion)
		VALUES ('$idusuario_session', '$idservicio', '4', CURRENT_DATE, CURRENT_TIME);";
		return ejecutarConsulta($sqlx);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario_session,$idservicio)
	{
		$sql="UPDATE servicio SET condicionservicio='1' WHERE idservicio='$idservicio'RETURNING idservicio";
		$idservicio = ejecutarConsulta_retornarID($sql);
		$sqlx = "INSERT INTO registro_servicios (id_usuariop, idservicio, idtipoaccion, fechaaccion, horaaccion)
		VALUES ('$idusuario_session', '$idservicio', '3', CURRENT_DATE, CURRENT_TIME);";
		return ejecutarConsulta($sqlx);
	
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idservicio)
	{
		$sql="SELECT a.idservicio, a.nombreservicio, a.condicionservicio, u.idusuarioe FROM servicio a, usuario_servicio u WHERE a.idservicio=u.idservicio AND a.idservicio='$idservicio'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idservicio, nombreservicio FROM servicio 
		WHERE (condicionservicio=1) ORDER BY nombreservicio ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($codigo,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(idservicio) AS idservicio FROM servicio WHERE (serviciocodigo='$codigo') AND (idservicio<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['idservicio'];		
	}
}

?>