<?php
// Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conexion.php";

class DepartamentoFacade
{
    private $departamento;

    public function __construct()
    {
        $this->departamento = new Departamento();
    }

    public function listarDepartamentos()
    {
        return $this->departamento->listar();
    }

    public function insertarDepartamento($nombre)
    {
        return $this->departamento->insertar($nombre);
    }

    public function editarDepartamento($iddepartamento, $nombre)
    {
        return $this->departamento->editar($iddepartamento, $nombre);
    }

    public function desactivarDepartamento($iddepartamento)
    {
        return $this->departamento->desactivar($iddepartamento);
    }

    public function activarDepartamento($iddepartamento)
    {
        return $this->departamento->activar($iddepartamento);
    }

    public function mostrarDepartamento($iddepartamento)
    {
        return $this->departamento->mostrar($iddepartamento);
    }

    public function obtenerDepartamentos()
    {
        return $this->departamento->select();
    }

    public function comprobarDuplicados($iddepartamento)
    {
        return $this->departamento->comprueba_duplicados($iddepartamento);
    }
}
?>
