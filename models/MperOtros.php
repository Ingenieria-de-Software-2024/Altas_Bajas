<?php
namespace Model;

class MperOtros extends ActiveRecord
{
    public static $tabla = 'mper_otros';
    public static $idTabla = 'oper_catalogo';

    public static $columnasDB = ['oper_catalogo','oper_nit', 'oper_celular_personal','oper_celular_servicio', 'oper_correo_institucional', 'oper_correo_personal', 'oper_obs', 'oper_desc1', 'oper_desc2', 'oper_desc3'];

    public $oper_catalogo;
    public $oper_nit;
    public $oper_celular_personal;
    public $oper_celular_servicio;
    public $oper_correo_institucional;
    public $oper_correo_personal;
    public $oper_obs;
    public $oper_desc1;
    public $oper_desc2;
    public $oper_desc3;

    public function __construct($data = []) {
        $this->oper_catalogo = $data['oper_catalogo'] ?? null;      
        $this->oper_nit = $data['oper_nit'] ?? '';
        $this->oper_celular_personal = $data['oper_celular_personal'] ?? '';
        $this->oper_celular_servicio = $data['oper_celular_servicio'] ?? '';
        $this->oper_correo_institucional = $data['oper_correo_institucional'] ?? '';
        $this->oper_correo_personal = $data['oper_correo_personal'] ?? '';
        $this->oper_obs = $data['oper_obs'] ?? '';
        $this->oper_desc1 = $data['oper_desc1'] ?? '';
        $this->oper_desc2 = $data['oper_desc2'] ?? '';
        $this->oper_desc3 = $data['oper_desc3'] ?? '';

    }
}