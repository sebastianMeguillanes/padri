<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Rol
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idrol, rolnombre, rolcondicion FROM rol";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$idpermiso)
	{
		$sql="INSERT INTO rol (rolnombre, rolcondicion)
		VALUES ('$nombre', '1') RETURNING idrol";
		$idrol = ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;
		while ($num_elementos < count($idpermiso))
		{
			$sql_detalle = "INSERT INTO rol_permiso(idrol, idpermiso) VALUES('$idrol', '$idpermiso[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($idrol,$nombre,$idpermiso)
	{
		$sql="UPDATE rol SET rolnombre='$nombre' WHERE idrol='$idrol'";
		$idrolx= ejecutarConsulta($sql);
		$sqldel="DELETE FROM rol_permiso WHERE idrol='$idrol'";
		ejecutarConsulta($sqldel);
		$num_elementos=0;
		$sw=true;
		while ($num_elementos < count($idpermiso))
		{
			$sql_detalle = "INSERT INTO rol_permiso(idrol, idpermiso) VALUES('$idrol', '$idpermiso[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idrol)
	{
		$sql="UPDATE rol SET rolcondicion='0' WHERE idrol='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idrol)
	{
		$sql="UPDATE rol SET rolcondicion='1' WHERE idrol='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idrol)
	{
		$sql="SELECT a.idrol, a.rolnombre, a.rolcondicion, g.idpermiso FROM rol a, rol_permiso g WHERE a.idrol=g.idrol AND a.idrol='$idrol'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idrol, rolnombre FROM rol 
		WHERE (rolcondicion=1) ORDER BY rolnombre ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($codigo,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(idrol) AS idrol FROM rol WHERE (rolcodigo='$codigo') AND (idrol<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['idrol'];		
	}
}

?>