<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT*FROM estudiante e,usuario u WHERE e.idestudiante=u.idestudiante";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario_session,$nombre,$email,$telefono,$num_documento,$tipo_estudiante,$idcarrera,$login,$clavehash)
	{
            $sql="INSERT INTO estudiante (nombreestudiante,correoestudiante,identificacionestudiante,telefonoestudiante,idcarrera,idtipoestudiante)
		    VALUES ('$nombre','$email','$num_documento', '$telefono', '$idcarrera', '$tipo_estudiante') RETURNING idestudiante;";
            $idestudiante = ejecutarConsulta_retornarID($sql);
            $sqlx="INSERT INTO usuario(nombreusuarioe,contraseñausuario,idestudiante)
                VALUES ('$login', '$clavehash','$idestudiante') RETURNING idusuarioe";
			$idusuarioe = ejecutarConsulta_retornarID($sqlx);
			$sqlv="INSERT INTO registro_usuarios(id_usuariop,idusuarioe,idtipoaccion,fechaaccion,horaaccion)
			values('$idusuario_session','$idusuarioe','1',CURRENT_DATE,now()::time)";
			return ejecutarConsulta($sqlv);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario_session,$idusuarioe,$nombre,$email,$telefono,$num_documento,$tipo_estudiante,$idcarrera,$login,$clavehash)
	{ 
        $idestudiante=$this->idestudiante_usuario($idusuarioe);
        $sql="UPDATE estudiante SET nombreestudiante='$nombre',correoestudiante='$email',identificacionestudiante='$num_documento',telefonoestudiante='$telefono',idcarrera='$idcarrera',idtipoestudiante='$tipo_estudiante' 
		WHERE idestudiante='$idestudiante'";
		ejecutarConsulta($sql);
        $sqlx="UPDATE usuario SET nombreusuarioe='$login', contraseñausuario='$clavehash'
        WHERE idusuarioe = '$idusuarioe' RETURNING idusuarioe";
		ejecutarConsulta($sqlx);
		$sqlv="INSERT INTO registro_usuarios(id_usuariop,idusuarioe,idtipoaccion,fechaaccion,horaaccion)
		values('$idusuario_session','$idusuarioe','2',CURRENT_DATE,now()::time)";
		return ejecutarConsulta($sqlv);
	}
	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario_session,$idusuarioe)
	{
		$sql="UPDATE usuario SET usuariocondicion='0' WHERE idusuarioe='$idusuarioe' RETURNING idusuarioe";
		ejecutarConsulta($sql);
		$sqlv="INSERT INTO registro_usuarios(id_usuariop,idusuarioe,idtipoaccion,fechaaccion,horaaccion)
		values('$idusuario_session','$idusuarioe','4',CURRENT_DATE,now()::time)";
		return ejecutarConsulta($sqlv);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario_session,$idusuarioe)
	{
		$sql="UPDATE usuario SET usuariocondicion='1' WHERE idusuarioe='$idusuarioe'";
		ejecutarConsulta($sql);
		$sqlv="INSERT INTO registro_usuarios(id_usuariop,idusuarioe,idtipoaccion,fechaaccion,horaaccion)
		values('$idusuario_session','$idusuarioe','3',CURRENT_DATE,now()::time)";
		return ejecutarConsulta($sqlv);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuarioe)
	{
		$sql="SELECT*FROM estudiante e,usuario u WHERE e.idestudiante=u.idestudiante AND (u.idusuarioe='$idusuarioe')";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idusuarioe, nombreusuarioe FROM usuario 
		WHERE (usuariocondicion=1) ORDER BY nombreusuarioe ASC";
		return ejecutarConsulta($sql);		
	}

	public function select2()
	{		
		$sql="SELECT idestudiante, nombreestudiante FROM estudiante";
		return ejecutarConsulta($sql);	
	}
	
	public function listarmarcados($idservicio)
	{
		$sql="SELECT u.idusuarioe, u.nombreusuarioe FROM usuario_servicio s, usuario u WHERE s.idusuarioe=u.idusuarioe AND idservicio='$idservicio'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function idestudiante_usuario($idusuarioe)
	{
		$sql="SELECT e.idestudiante FROM estudiante e, usuario u WHERE e.idestudiante=u.idestudiante AND u.idusuarioe='$idusuarioe'";
		$idestudiante = ejecutarConsultaSimpleFila($sql);
		return $idestudiante["idestudiante"];
	}

	public function verificar($logina, $clavehash) {
		$sql = "SELECT u.idusuarioe,nombreestudiante,nombreusuarioe,contraseñausuario FROM usuario u, estudiante e 
		WHERE u.idestudiante=e.idestudiante AND nombreusuarioe='$logina' AND contraseñausuario='$clavehash' AND usuariocondicion='1'"; 
		return ejecutarConsulta($sql); 
	}
	

}

?>