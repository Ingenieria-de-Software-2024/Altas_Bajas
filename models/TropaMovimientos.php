<?php
namespace Model;

class TropaMovimientos extends ActiveRecord
{
    protected static $tabla = 'tropa_movimientos';
    protected static $idTabla = 'mov_id';

    protected static $columnasDB = [ 'mov_catalogo', 'mov_dependencia','mov_accion', 'mov_fecha', 'mov_situacion'];

    public $mov_id;
    public $mov_catalogo;
    public $mov_dependencia;
    public $mov_accion;
    public $mov_fecha;
    public $mov_situacion;

    public function __construct($data = []) {
        $this->mov_id = $data['mov_id'] ?? null;
        $this->mov_catalogo = $data['mov_catalogo'] ?? '';
        $this->mov_dependencia = $data['mov_dependencia'] ?? '';
        $this->mov_accion = $data['mov_accion'] ?? '';
        $this->mov_fecha = $data['mov_fecha'] ?? '';
        $this->mov_situacion = $data['mov_situacion'] ?? '';

    }

}