<?php
namespace Model;

class Dpue extends ActiveRecord
{
    public static $tabla = 'dpue';
    public static $idTabla = 'pue_catalogo';

    public static $columnasDB = [ 'pue_catalogo', 'pue_grado', 'pue_arma', 'pue_jerarquia', 'pue_dependencia', 'pue_plaza', 'pue_ceom', 'pue_desc', 'pue_situacion', 'pue_fec_nomb', 'pue_ord_gral', 'pue_punto_og', 'pue_fec_cese'];

    public $pue_catalogo;
    public $pue_grado;
    public $pue_arma;
    public $pue_jerarquia;
    public $pue_dependencia;
    public $pue_plaza;
    public $pue_ceom;
    public $pue_desc;
    public $pue_situacion;
    public $pue_fec_nomb;
    public $pue_ord_gral;
    public $pue_punto_og;
    public $pue_fec_cese;

    public function __construct($data = []) {
        $this->pue_catalogo = $data['pue_catalogo'] ?? null;
        $this->pue_grado = $data['pue_grado'] ?? '';
        $this->pue_arma = $data['pue_arma'] ?? '';
        $this->pue_jerarquia = $data['pue_jerarquia'] ?? '';
        $this->pue_dependencia = $data['pue_dependencia'] ?? '';
        $this->pue_plaza = $data['pue_plaza'] ?? '';
        $this->pue_ceom = $data['pue_ceom'] ?? '';
        $this->pue_desc = $data['pue_desc'] ?? '';
        $this->pue_situacion = $data['pue_situacion'] ?? '';
        $this->pue_fec_nomb = $data['pue_fec_nomb'] ?? '';
        $this->pue_ord_gral = $data['pue_ord_gral'] ?? '';
        $this->pue_punto_og = $data['pue_punto_og'] ?? '';
        $this->pue_fec_cese = $data['pue_fec_cese'] ?? '';
    }


}