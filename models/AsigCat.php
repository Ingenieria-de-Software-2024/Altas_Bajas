<?php
namespace Model;

class AsigCat extends ActiveRecord
{
    public static $tabla = 'asc_cat';
    public static $idTabla = 'asc_tipo';

    public static $columnasDB = [ 'asc_catalogo'];

    public $asc_tipo;
    public $asc_catalogo;

    public function __construct($data = []) {
        $this->asc_tipo = $data['asc_tipo'] ?? null;
        $this->asc_catalogo = $data['asc_catalogo'] ?? '';
    }

    public static function UpdateAsignacionCatalogo($per_catalogo){

        $sql = "UPDATE asig_cat SET asc_catalogo = $per_catalogo WHERE asc_tipo = 'T'";


        return self::SQL($sql);
    }
}