<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Carrera
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT c.idcarrera, c.nombrecarrera, d.nombredepartamento ,c.condicioncarrera
		FROM carrera c, departamento d
        WHERE c.iddepartamento=d.iddepartamento";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre, $iddepartamento)
	{
		$sql="INSERT INTO carrera(nombrecarrera, condicioncarrera, iddepartamento)
            VALUES ('$nombre','1','$iddepartamento');";
			return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcarrera,$nombre, $iddepartamento)
	{
		$sql="UPDATE carrera SET nombrecarrera='$nombre',iddepartamento='$iddepartamento'
			WHERE idcarrera='$idcarrera'";
			return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcarrera)
	{
		$sql="UPDATE carrera SET condicioncarrera='0' WHERE idcarrera='$idcarrera'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcarrera)
	{
		$sql="UPDATE carrera SET condicioncarrera='1' WHERE idcarrera='$idcarrera'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcarrera)
	{
		$sql="SELECT c.idcarrera, c.nombrecarrera, c.condicioncarrera, d.iddepartamento
        FROM carrera c, departamento d
        WHERE (idcarrera='$idcarrera') AND (d.iddepartamento= c.iddepartamento)";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT idcarrera, nombrecarrera FROM carrera 
		WHERE (condicioncarrera=1) ORDER BY nombrecarrera ASC";
		return ejecutarConsulta($sql);		
	}

}

?>
