<?php
namespace Model;

class TropaBeneficiarios extends ActiveRecord
{
    protected static $tabla = 'tropa_beneficiarios';
    protected static $idTabla = 'ben_id';

    protected static $columnasDB = ['ben_catalogo', 'ben_nombre','ben_direccion', 'ben_celular', 'ben_parentesco', 'ben_porcentaje', 'ben_situacion', 'ben_sexo', 'ben_estado_civil', 'ben_fecha_nacimiento', 'ben_depto_nacimiento', 'ben_mun_nacimiento', 'ben_dpi'];

    public $ben_id;
    public $ben_catalogo;
    public $ben_nombre;
    public $ben_direccion;
    public $ben_celular;
    public $ben_parentesco;
    public $ben_porcentaje;
    public $ben_situacion;
    public $ben_sexo;
    public $ben_estado_civil;
    public $ben_fecha_nacimiento;
    public $ben_depto_nacimiento;
    public $ben_mun_nacimiento;
    public $ben_dpi;

    public function __construct($data = []) {
        $this->ben_id = $data['ben_id'] ?? '';
        $this->ben_catalogo = $data['ben_catalogo'] ?? '';
        $this->ben_nombre = $data['ben_nombre'] ?? '';
        $this->ben_direccion = $data['ben_direccion'] ?? '';
        $this->ben_celular = $data['ben_celular'] ?? '';
        $this->ben_parentesco = $data['ben_parentesco'] ?? '';
        $this->ben_porcentaje = $data['ben_porcentaje'] ?? '';
        $this->ben_situacion = $data['ben_situacion'] ?? '';
        $this->ben_sexo = $data['ben_sexo'] ?? '';
        $this->ben_estado_civil = $data['ben_estado_civil'] ?? '';
        $this->ben_fecha_nacimiento = $data['ben_fecha_nacimiento'] ?? '';
        $this->ben_depto_nacimiento = $data['ben_depto_nacimiento'] ?? '';
        $this->ben_mun_nacimiento = $data['ben_mun_nacimiento'] ?? '';
        $this->ben_dpi = $data['ben_dpi'] ?? '';

    }
}