<?php
namespace Model;

class AsigCat extends ActiveRecord
{
    protected static $tabla = 'asc_cat';
    protected static $idTabla = 'asc_tipo';

    protected static $columnasDB = [ 'asc_catalogo'];

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