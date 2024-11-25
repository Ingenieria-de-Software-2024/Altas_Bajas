<?php
namespace Model;

class Tropa extends ActiveRecord
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

        $sql = "SELECT PER_CATALOGO AS CATALOGO, GRA_DESC_CT AS GRADO, TRIM(NVL(PER_NOM1, '')) || ' ' || TRIM(NVL(PER_NOM2, '')) || ' ' || TRIM(NVL(PER_APE1, '')) || ' ' || TRIM(NVL(PER_APE2, '')) || ' ' || TRIM(NVL(PER_APE3, '')) AS NOMBRE_COMPLETO, ORG_PLAZA AS PLAZA, PER_DESC_EMPLEO AS EMPLEO, ORG_CEOM AS CEOM, PER_SITUACION AS SITUACION FROM MORG INNER JOIN GRADOS ON ORG_GRADO = GRA_CODIGO LEFT JOIN MPER ON ORG_PLAZA = PER_PLAZA LEFT JOIN MDEP ON DEP_LLAVE = ORG_DEPENDENCIA WHERE GRA_CLASE = 6 AND ORG_CEOM NOT IN ('TITULO') AND DEP_LLAVE = '$dependencia'";

        return self::fetchArray($sql);
    }

//ALTAS

    public static function buscarDepartamentos()
    {
        $sql = "SELECT DM_CODIGO, TRIM(SUBSTRING(DM_MUN_DEP FROM INSTR(DM_MUN_DEP, ',') + 2)) AS DEPARTAMENTOS FROM DEPMUN WHERE DM_CODIGO LIKE '%01'";

        return self::fetchArray($sql);
    }

    public static function buscarMunicipios($dep_mun)
    {
        $sql = "SELECT * FROM DEPMUN WHERE DM_CODIGO LIKE \' . $dep_mun . '%\'";

        return self::fetchArray($sql);
    }

    public static function verificarDpi($dpi)
    {
        $sql = "SELECT PER_NOM1 || ' ' || PER_NOM2 || ' ' || PER_APE1 || ' ' || PER_APE2 AS NOMBRE_COMPLETO, SIT_DESC_LG AS SITUACION, PER_SITUACION FROM MPER INNER JOIN SITUACIONES ON SIT_CODIGO = PER_SITUACION WHERE REPLACE(PER_DPI, ' ', '') = '$dpi' AND PER_SITUACION IN (11, 'T0');
";

        return self::fetchFirst($sql);
    }

    
//BAJAS

    public static function buscarMotivoBaja()
    {
        $sql = "SELECT SIT_CODIGO, SIT_DESC_LG FROM SITUACIONES WHERE SIT_CODIGO IN ('TV', 'TS', 'TM', 'TF', 'TB', 'TX', 'TA', 'TP', 'TR', '1C', '1A', '1E', '14', '17', '17', 'TC', '21', '1V', '22', '23', '25', 'OD')";
        

        return self::fetchArray($sql);

    }

    public static function buscarDatosBajas($plaza)
    {
        $sql = "SELECT PER_CATALOGO AS CATALOGO_BAJA, TRIM(GRA_DESC_CT) AS GRADO_BAJA, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_BAJA, PER_PLAZA AS PLAZA_BAJA, PER_DESC_EMPLEO AS EMPLEO_BAJA FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO WHERE PER_PLAZA = '$plaza'";

        return self::fetchFirst($sql);
    }


//CORRECCIONES

    public static function obtenerDatosCorrecciones($correcciones)
    {
        $sql = "SELECT PER_CATALOGO AS CATALOGO_CORRECCIONES, PER_NOM1 AS PRIMER_NOMBRE_CORRECCIONES, PER_NOM2 AS SEGUNDO_NOMBRE_CORRECCIONES, PER_NOM3 AS TERCER_NOMBRE_CORRECCIONES, PER_APE1 AS PRIMER_APELLIDO_CORRECCIONES, PER_APE2 AS SEGUNDO_APELLIDO_CORRECCIONES, PER_APE3 AS TERCER_APELLIDO_CORRECCIONES, PER_FEC_EXT_CED AS FECH_EXT_DPI_TROPA_CORRECCIONES, DM_DESC_LG AS DEPTO_EXTENCION_DPI_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_EXTENCION_DPI_CORRECCIONES, PER_DPI AS DPI_CORRECCIONES, PER_PLAZA AS PLAZA_CORRECCIONES, GRA_DESC_CT AS GRADO_CORRECCIONES, PER_DESC_EMPLEO AS EMPLEO_CORRECCIONES, PER_FEC_NOMB AS FECH_ALTA_CORRECCIONES, PER_EST_CIVIL AS ESTADO_CIVIL_CORRECCIONES, PER_SANGRE AS TIPO_SANGRE_CORRECCIONES, PER_DIRECCION AS DIRECCION_CORRECCIONES, PER_ZONA AS ZONA_CORRRECCION, DM_DESC_LG AS DEPTO_RESIDENCIA_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_RESIDENCIA_CORRECCIONES, PER_TELEFONO AS TELEFONO_CORRECCIONES, PER_SEXO AS SEXO_CORRECCIONES, PER_FEC_NAC AS FECH_NAC_CORRECCIONES, DM_DESC_LG AS DEPTO_NACIMIENTO_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_NACIMIENTO_CORRECCIONES, OPER_NIT AS NIT_CORRECCIONES, OPER_CORREO_PERSONAL AS CORREO_CORRECCIONES, BEN_NOMBRE AS BEN_NOMBRE_CORRECCIONES, BEN_DPI AS DPI_BEN_CORRECCIONES, BEN_SEXO AS BEN_GENERO_CORRECCIONES, BEN_CELULAR AS TEL_BEN_CORRECCIONES, BEN_PARENTESCO AS PARENTESCO_CORRECCIONES, BEN_ESTADO_CIVIL AS BEN_EST_CIVIL_CORRECCIONES, BEN_FECHA_NACIMIENTO AS BEN_FECH_NACIMIENTO_CORRECCIONES, BEN_DEPTO_NACIMIENTO AS BEN_DEPTO_NACIMIENTO_CORRECCIONES, BEN_MUN_NACIMIENTO AS BEN_MUN_NACIMIENTO_CORRECCIONES, BEN_DIRECCION AS DIRECC_BEN_CORRECCIONES, SIT_DESC_CT AS SITUACION_CORRECCIONES, BEN_SITUACION AS SITUACION_BEN_CORRECCIONES FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO INNER JOIN DEPMUN ON PER_EXT_CED_LUGAR = DM_CODIGO INNER JOIN MPER_OTROS ON PER_CATALOGO = OPER_CATALOGO INNER JOIN TROPA_BENEFICIARIOS ON PER_CATALOGO = BEN_CATALOGO WHERE PER_CATALOGO = '$correcciones'";

        return self::fetchFirst($sql);
    }

    public static function buscarParentescos()
    {
        $sql = "SELECT PAR_CODIGO, PAR_DESC_MD FROM PARENTESCOS";
        

        return self::fetchArray($sql);

    }

}