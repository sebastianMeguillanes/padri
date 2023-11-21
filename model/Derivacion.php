<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Derivacion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT d.idderivacion,d.fechaderivacion, d.remitentederivacion, d.destinatarioderivacion, p.personalnombre, d.tipoderivacion, d.condicionderivacion
        FROM derivacion d, personal p
		WHERE (d.idpersonal=p.idpersonal);";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar($fechaderivacion,$remitentederivacion,$destinatarioderivacion,$idpersonal,$tipoderivacion)
	{
            $sql="INSERT INTO derivacion (fechaderivacion,remitentederivacion,destinatarioderivacion,idpersonal,tipoderivacion)
		    VALUES ('$fechaderivacion','$remitentederivacion','$destinatarioderivacion','$idpersonal','$tipoderivacion');";
            return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idderivacion,$fechaderivacion,$remitentederivacion,$destinatarioderivacion,$idpersonal,$tipoderivacion)
	{ 
    	$sql="UPDATE derivacion SET fechaderivacion='$fechaderivacion',remitentederivacion='$remitentederivacion',destinatarioderivacion='$destinatarioderivacion',	idpersonal='$idpersonal',tipoderivacion='$tipoderivacion'
		WHERE idderivacion='$idderivacion';";
        return ejecutarConsulta($sql);
	}
	//Implementamos un método para desactivar categorías
	public function desactivar($idderivacion)
	{
		$sql="UPDATE derivacion SET condicionderivacion='0' WHERE idderivacion='$idderivacion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idderivacion)
	{
		$sql="UPDATE derivacion SET condicionderivacion='1' WHERE idderivacion='$idderivacion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idderivacion)
	{
		
		$sql="SELECT d.idderivacion,d.fechaderivacion, d.remitentederivacion, d.destinatarioderivacion, p.idpersonal, d.tipoderivacion
        FROM derivacion d, personal p
        WHERE(d.idpersonal=p.idpersonal) AND (idderivacion='$idderivacion')";
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