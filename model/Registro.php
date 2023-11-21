<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

Class Registro
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT* FROM tipo_registrousuario t, registro_usuarios u, usuario e,usuario_personal p where t.idtipoaccion = u.idtipoaccion 
        and u.id_usuariop = p.id_usuariop and u.idusuarioe = e.idusuarioe";
		return ejecutarConsulta($sql);		
	}
	public function listar_registros_personal()
	{
		$sql="SELECT*FROM tipo_registrousuario t, registro_usuariosp u, usuario_personal p
		WHERE t.idtipoaccion = u.idtipoaccion AND u.id_usuariop = p.id_usuariop";
		return ejecutarConsulta($sql);		
	}
	public function listar_registros_hojaruta()
	{
		$sql="SELECT*FROM tipo_registrousuario t, usuario_personal p, hoja_ruta h,registro_hoja_ruta r, derivacion d
		WHERE t.idtipoaccion = r.idtipoaccion and h.idruta=r.idruta and h.idderivacion=d.idderivacion and p.id_usuariop=r.id_usuariop";
		return ejecutarConsulta($sql);		
	}
	public function listar_registros_servicios()
	{
		$sql="SELECT*FROM tipo_registrousuario t, usuario_personal p, servicio s, registro_servicios r
		WHERE t.idtipoaccion = r.idtipoaccion and s.idservicio=r.idservicio  and p.id_usuariop=r.id_usuariop";
		return ejecutarConsulta($sql);		
	}

}


?>