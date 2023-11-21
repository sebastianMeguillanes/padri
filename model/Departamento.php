<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Departamento
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM departamento";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre)
	{
		$sql="INSERT INTO departamento(nombredepartamento, condiciondepartamento)
            VALUES ('$nombre', '1');";
			return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddepartamento,$nombre)
	{
		$sql="UPDATE departamento SET nombredepartamento='$nombre' 
			WHERE iddepartamento='$iddepartamento'";
			return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($iddepartamento)
	{
		$sql="UPDATE departamento SET condiciondepartamento='0' WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($iddepartamento)
	{
		$sql="UPDATE departamento SET condiciondepartamento='1' WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($iddepartamento)
	{
		$sql="SELECT iddepartamento, nombredepartamento, condiciondepartamento
        FROM departamento
        WHERE (iddepartamento='$iddepartamento')";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT iddepartamento, nombredepartamento FROM departamento 
		WHERE (condiciondepartamento=1) ORDER BY nombredepartamento ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function comprueba_duplicados($iddepartamento)
	{
		$resultado=0;
		$sql="SELECT COUNT(iddepartamento) AS iddepartamento FROM departamento WHERE (iddepartamento<>$iddepartamento)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['iddepartamento'];		
	}

}

?>