<?php
namespace Model;

class Traslados extends ActiveRecord
{
    protected static $tabla = 'mper';
    protected static $idTabla = 'per_catalogo';

    protected static $columnasDB = ['per_codigo', 'per_cod_arm', 'per_cod_gra', 'per_nom1', 'per_nom2', 'per_ape1', 'per_ape2', 'per_dpi', 'per_plaza', 'per_foto', 'per_dep_dpi', 'per_est_civil', 'per_direccion', 'per_departamento', 'per_municipio', 'per_telefono', 'per_sexo', 'per_fecha_nacimiento', 'per_dep_nacimiento', 'per_sangre', 'per_hijos', 'per_tipo', 'per_plaza_anterior', 'per_desc_empleo', 'per_fecha_nom', 'per_exp', 'per_puesto', 'per_situacion', 'per_grado', 'per_codigo_sup', 'per_observaciones'];

    public $per_catalogo;
    public $per_codigo;
    public $per_cod_arm;
    public $per_cod_gra;
    public $per_nom1;
    public $per_nom2;
    public $per_ape1;
    public $per_ape2;
    public $per_dpi;
    public $per_plaza;
    public $per_foto;
    public $per_dep_dpi;
    public $per_est_civil;
    public $per_direccion;
    public $per_departamento;
    public $per_municipio;
    public $per_telefono;
    public $per_sexo;
    public $per_fecha_nacimiento;
    public $per_dep_nacimiento;
    public $per_sangre;
    public $per_hijos;
    public $per_tipo;
    public $per_plaza_anterior;
    public $per_desc_empleo;
    public $per_fecha_nom;
    public $per_exp;
    public $per_puesto;
    public $per_situacion;
    public $per_grado;
    public $per_codigo_sup;
    public $per_observaciones;


    public function __construct($data = []) {
        $this->per_catalogo = $data['per_catalogo'] ?? null;
        $this->per_codigo = $data['per_codigo'] ?? '';
        $this->per_cod_arm = $data['per_cod_arm'] ?? '';
        $this->per_cod_gra = $data['per_cod_gra'] ?? '';
        $this->per_nom1 = $data['per_nom1'] ?? '';
        $this->per_nom2 = $data['per_nom2'] ?? '';
        $this->per_ape1 = $data['per_ape1'] ?? '';
        $this->per_ape2 = $data['per_ape2'] ?? '';
        $this->per_dpi = $data['per_dpi'] ?? '';
        $this->per_plaza = $data['per_plaza'] ?? '';
        $this->per_foto = $data['per_foto'] ?? '';
        $this->per_dep_dpi = $data['per_dep_dpi'] ?? '';
        $this->per_est_civil = $data['per_est_civil'] ?? '';
        $this->per_direccion = $data['per_direccion'] ?? '';
        $this->per_departamento = $data['per_departamento'] ?? '';
        $this->per_municipio = $data['per_municipio'] ?? '';
        $this->per_telefono = $data['per_telefono'] ?? '';
        $this->per_sexo = $data['per_sexo'] ?? '';
        $this->per_fecha_nacimiento = $data['per_fecha_nacimiento'] ?? '';
        $this->per_dep_nacimiento = $data['per_dep_nacimiento'] ?? '';
        $this->per_sangre = $data['per_sangre'] ?? '';
        $this->per_hijos = $data['per_hijos'] ?? '';
        $this->per_tipo = $data['per_tipo'] ?? '';
        $this->per_plaza_anterior = $data['per_plaza_anterior'] ?? '';
        $this->per_desc_empleo = $data['per_desc_empleo'] ?? '';
        $this->per_fecha_nom = $data['per_fecha_nom'] ?? '';
        $this->per_exp = $data['per_exp'] ?? '';
        $this->per_puesto = $data['per_puesto'] ?? '';
        $this->per_situacion = $data['per_situacion'] ?? '';
        $this->per_grado = $data['per_grado'] ?? '';
        $this->per_codigo_sup = $data['per_codigo_sup'] ?? '';
        $this->per_observaciones = $data['per_observaciones'] ?? '';
    }

    public static function buscarTropa()
    {
        $dependencia = $_SESSION['dep_llave'];

        $sql = "SELECT PER_CATALOGO AS CATALOGO, 
                GRA_DESC_CT AS GRADO, PER_APE1 || ' ' || PER_APE2 || ' ' || PER_NOM1 || ' ' || PER_NOM2 AS NOMBRE_COMPLETO, 
                PER_PLAZA AS PLAZA, 
                PER_DESC_EMPLEO AS EMPLEO, 
                ORG_CEOM AS CEOM, 
                DEP_DESC_LG AS DEPENDENCIA
                FROM MPER 
                INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO 
                INNER JOIN MORG ON PER_PLAZA = ORG_PLAZA
                INNER JOIN MDEP ON ORG_DEPENDENCIA = DEP_LLAVE
                WHERE DEP_LLAVE = '$dependencia' AND PER_SITUACION IN ('TH', 'T0');";

        return self::fetchArray($sql);
    }

    public static function buscarDatos($catalogo)
    {
        $sql = "SELECT PER_CATALOGO AS CATALOGO, GRA_DESC_CT AS GRADO, PER_APE1 || ' ' || PER_APE2 || ' ' || PER_NOM1 || ' ' || PER_NOM2 AS NOMBRE_COMPLETO, PER_PLAZA AS PLAZA,PER_DESC_EMPLEO AS EMPLEO FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO WHERE PER_CATALOGO = $catalogo";

        return self::fetchFirst($sql);
    }

}