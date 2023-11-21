<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Usuario_Personal
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT*FROM usuario_personal u, personal p WHERE u.idpersonal=p.idpersonal";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$iddepartamento,$idrol,$telefono,$direccion,$email,$num_documento,$login,$clavehash)
	{
            $sql="INSERT INTO personal (personalnombre,iddepartamento,idrol,personalcelular,personaldireccion,personalemail,identificacionpersonal)
		    VALUES ('$nombre','$iddepartamento', '$idrol','$telefono', '$direccion','$email',$num_documento) RETURNING idpersonal;";
            $idpersonal = ejecutarConsulta_retornarID($sql);
            $sqlx="INSERT INTO usuario_personal(nombreusuariop,contraseñausuario,idpersonal)
                VALUES ('$login', '$clavehash','$idpersonal') RETURNING id_usuariop";
			return ejecutarConsulta($sqlx);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre,$iddepartamento,$idrol,$telefono,$direccion,$email,$num_documento,$login,$clavehash)
	{ 
        $idpersonal=$this->idpersonal_usuario($idusuario);
        $sql="UPDATE personal SET personalnombre='$nombre',iddepartamento='$iddepartamento',idrol='$idrol',personalcelular='$telefono',personaldireccion='$direccion',personalemail='$email',identificacionpersonal='$num_documento' WHERE idpersonal='$idpersonal'";
		ejecutarConsulta($sql);
        $sqlx="UPDATE usuario_personal SET nombreusuariop='$login', contraseñausuario='$clavehash'
         WHERE id_usuariop = '$idusuario'";
		return ejecutarConsulta($sqlx);
	}
	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario)
	{
		$sql="UPDATE usuario_personal SET usuariocondicion='0' WHERE id_usuariop='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{
		$sql="UPDATE usuario_personal SET usuariocondicion='1' WHERE id_usuariop='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT*FROM personal p,usuario_personal u WHERE p.idpersonal=u.idpersonal AND (u.id_usuariop='$idusuario')";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT id_usuariop, usuarionombre FROM usuario_personal 
		WHERE (usuariocondicion=1) ORDER BY usuarionombre ASC";
		return ejecutarConsulta($sql);		
	}
	public function select2()
	{
		$sql="SELECT idpersonal, personalnombre FROM personal";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function idpersonal_usuario($idusuario)
	{
		$sql="SELECT p.idpersonal FROM personal p, usuario_personal u WHERE p.idpersonal=u.idpersonal AND u.id_usuariop='$idusuario'";
		$idpersonal = ejecutarConsultaSimpleFila($sql);
		return $idpersonal["idpersonal"];
	}

	public function verificar($logina, $clavehash) {
		$sql = "SELECT * FROM usuario_personal u, personal p
		WHERE u.idpersonal=p.idpersonal AND u.nombreusuariop='$logina' 
		AND u.contraseñausuario='$clavehash' AND u.usuariocondicion='1'"; 
		return ejecutarConsulta($sql); 
	}

	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT p.idpermiso FROM usuario_personal u, rol r, rol_permiso p, personal e 
		WHERE e.idrol=r.idrol AND r.idrol=p.idrol AND u.idpersonal=e.idpersonal AND u.id_usuariop='$idusuario'";
		return ejecutarConsulta($sql);
	}

}
?>