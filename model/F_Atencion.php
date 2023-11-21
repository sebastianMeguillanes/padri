<?php
// Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

class AtencionFacade
{
    private $atencion;

    public function __construct()
    {
        $this->atencion = new Atencion();
    }

    public function listarAtenciones()
    {
        return $this->atencion->listar();
    }

    public function insertarAtencion($fecha_atencion, $idestudiante, $accion_atencion)
    {
        return $this->atencion->insertar($fecha_atencion, $idestudiante, $accion_atencion);
    }

    public function editarAtencion($idatencion, $fecha_atencion, $idestudiante, $accion_atencion)
    {
        return $this->atencion->editar($idatencion, $fecha_atencion, $idestudiante, $accion_atencion);
    }

    public function desactivarAtencion($idatencion)
    {
        return $this->atencion->desactivar($idatencion);
    }

    public function activarAtencion($idatencion)
    {
        return $this->atencion->activar($idatencion);
    }

    public function mostrarAtencion($idatencion)
    {
        return $this->atencion->mostrar($idatencion);
    }

    public function obtenerAtenciones()
    {
        return $this->atencion->select();
    }

    public function comprobarDuplicados($idatencion)
    {
        return $this->atencion->comprueba_duplicados($idatencion);
    }
}
?>
