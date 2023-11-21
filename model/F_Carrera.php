<?php
// Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

class CarreraFacade
{
    private $carrera;

    public function __construct()
    {
        $this->carrera = new Carrera();
    }

    public function listarCarreras()
    {
        return $this->carrera->listar();
    }

    public function insertarCarrera($nombre, $iddepartamento)
    {
        return $this->carrera->insertar($nombre, $iddepartamento);
    }

    public function editarCarrera($idcarrera, $nombre, $iddepartamento)
    {
        return $this->carrera->editar($idcarrera, $nombre, $iddepartamento);
    }

    public function desactivarCarrera($idcarrera)
    {
        return $this->carrera->desactivar($idcarrera);
    }

    public function activarCarrera($idcarrera)
    {
        return $this->carrera->activar($idcarrera);
    }

    public function mostrarCarrera($idcarrera)
    {
        return $this->carrera->mostrar($idcarrera);
    }

    public function obtenerCarreras()
    {
        return $this->carrera->select();
    }

    public function comprobarDuplicados($idcarrera)
    {
        return $this->carrera->comprueba_duplicados($idcarrera);
    }
}
?>
