<?php
namespace Model;

class Traslados extends ActiveRecord
{
    protected static $tabla = 'morg';
    protected static $idTabla = 'org_plaza';

    protected static $columnasDB = ['org_ceom', 'org_dependencia', 'org_jerarquia', 'org_grado', 'org_plaza_desc', 'org_situacion', 'org_cod_pago', 'org_hrs_trab', 'org_fec_ult_mod', 'org_ord_gral', 'org_nominas', 'org_categoria'];

    public $org_plaza;
    public $org_ceom;
    public $org_dependencia;
    public $org_jerarquia;
    public $org_grado;
    public $org_plaza_desc;
    public $org_situacion;
    public $org_cod_pago;
    public $org_hrs_trab;
    public $org_fec_ult_mod;
    public $org_ord_gral;
    public $org_nominas;
    public $org_categoria;

    public function __construct($data = []) {
        $this->org_plaza = $data['org_plaza'] ?? null;
        $this->org_ceom = $data['org_ceom'] ?? '';
        $this->org_dependencia = $data['org_dependencia'] ?? '';
        $this->org_jerarquia = $data['org_jerarquia'] ?? '';
        $this->org_grado = $data['org_grado'] ?? '';
        $this->org_plaza_desc = $data['org_plaza_desc'] ?? '';
        $this->org_situacion = $data['org_situacion'] ?? '';
        $this->org_cod_pago = $data['org_cod_pago'] ?? '';
        $this->org_hrs_trab = $data['org_hrs_trab'] ?? '';
        $this->org_fec_ult_mod = $data['org_fec_ult_mod'] ?? '';
        $this->org_ord_gral = $data['org_ord_gral'] ?? '';
        $this->org_nominas = $data['org_nominas'] ?? '';
        $this->org_categoria = $data['org_categoria'] ?? '';

    }

    public static function ObtenerDatosTraslados_1 ($catalogo)
    {
        $sql = "SELECT PER_CATALOGO AS CATALOGO_1, TRIM(GRA_DESC_CT) AS GRADO_1, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_1, PER_PLAZA AS PLAZA_1, PER_DESC_EMPLEO AS EMPLEO_1, PER_SITUACION AS  SITUACION_1, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

        return self::fetchFirst($sql);
    }

    public static function ObtenerDatosTraslados_2 ($catalogo)
    {
        $sql = "SELECT PER_CATALOGO AS CATALOGO_2, TRIM(GRA_DESC_CT) AS GRADO_2, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_2, PER_PLAZA AS PLAZA_2, PER_DESC_EMPLEO AS EMPLEO_2, PER_SITUACION AS  SITUACION_2, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

        return self::fetchFirst($sql);
    }

    public static function llenarPlazaMorg($plaza){

        $sql = "UPDATE MORG SET ORG_SITUACION = 'DEFINIR QUE SE COLOCARA AQUI' WHERE ORG_PLAZA = $plaza"; // DEFINIR QUE SE VA A COLOCAR EN ORG_SITUACION

        return self::SQL($sql);
    }
}