<?php

namespace Model;

class Tropa extends ActiveRecord
{
    public static $tabla = 'mper';

    public static $columnasDB = ['per_catalogo', 'per_serie', 'per_arma', 'per_grado', 'per_nom1', 'per_nom2', 'per_nom3', 'per_ape1', 'per_ape2', 'per_ape3', 'per_ced_ord', 'per_ced_reg', 'per_fec_ext_ced', 'per_ext_ced_lugar', 'per_est_civil', 'per_direccion', 'per_zona', 'per_dir_lugar', 'per_telefono', 'per_sexo', 'per_fec_nac', 'per_nac_lugar', 'per_promocion', 'per_afil_ipm', 'per_sangre', 'per_antiguedad', 'per_bienal', 'per_plaza', 'per_desc_empleo', 'per_fec_nomb', 'per_ord_gral', 'per_punto_og', 'per_situacion', 'per_prima_prof', 'per_dpi'];
    
    public static $idTabla = 'per_catalogo';

    public $per_catalogo;
    public $per_serie;
    public $per_grado;
    public $per_arma;
    public $per_nom1;
    public $per_nom2;
    public $per_nom3;
    public $per_ape1;
    public $per_ape2;
    public $per_ape3;
    public $per_ced_ord;
    public $per_ced_reg;
    public $per_fec_ext_ced;
    public $per_ext_ced_lugar;
    public $per_est_civil;
    public $per_direccion;
    public $per_zona;
    public $per_dir_lugar;
    public $per_telefono;
    public $per_sexo;
    public $per_fec_nac;
    public $per_nac_lugar;
    public $per_promocion;
    public $per_afil_ipm;
    public $per_sangre;
    public $per_antiguedad;
    public $per_bienal;
    public $per_plaza;
    public $per_desc_empleo;
    public $per_fec_nomb;
    public $per_ord_gral;
    public $per_punto_og;
    public $per_situacion;
    public $per_prima_prof;
    public $per_dpi;

    public function __construct($data = [])
    {
        $this->per_catalogo = $data['per_catalogo'];
        $this->per_serie = $data['per_serie'] ?? '';
        $this->per_grado = $data['per_grado'] ?? '';
        $this->per_arma = $data['per_arma'] ?? '0';
        $this->per_nom1 = $data['per_nom1'] ?? '';
        $this->per_nom2 = $data['per_nom2'] ?? '';
        $this->per_nom3 = $data['per_nom3'] ?? '';
        $this->per_ape1 = $data['per_ape1'] ?? '';
        $this->per_ape2 = $data['per_ape2'] ?? '';
        $this->per_ape3 = $data['per_ape3'] ?? '';
        $this->per_ced_ord = $data['per_ced_ord'] ?? '';
        $this->per_ced_reg = $data['per_ced_reg'] ?? '';
        $this->per_fec_ext_ced = $data['per_fec_ext_ced'] ?? '';
        $this->per_ext_ced_lugar = $data['per_ext_ced_lugar'] ?? '';
        $this->per_est_civil = $data['per_est_civil'] ?? '';
        $this->per_direccion = $data['per_direccion'] ?? '';
        $this->per_zona = $data['per_zona'] ?? '';
        $this->per_dir_lugar = $data['per_dir_lugar'] ?? '';
        $this->per_telefono = $data['per_telefono'] ?? '';
        $this->per_sexo = $data['per_sexo'] ?? '';
        $this->per_fec_nac = $data['per_fec_nac'] ?? '';
        $this->per_nac_lugar = $data['per_nac_lugar'] ?? '';
        $this->per_promocion = $data['per_promocion'] ?? '';
        $this->per_afil_ipm = $data['per_afil_ipm'] ?? '';
        $this->per_sangre = $data['per_sangre'] ?? '';
        $this->per_antiguedad = $data['per_antiguedad'] ?? '';
        $this->per_bienal = $data['per_bienal'] ?? '0';
        $this->per_plaza = $data['per_plaza'] ?? '';
        $this->per_desc_empleo = $data['per_desc_empleo'] ?? '';
        $this->per_fec_nomb = $data['per_fec_nomb'] ?? '';
        $this->per_ord_gral = $data['per_ord_gral'] ?? '';
        $this->per_punto_og = $data['per_punto_og'] ?? '';
        $this->per_situacion = $data['per_situacion'] ?? 'T0';
        $this->per_prima_prof = $data['per_prima_prof'] ?? '';
        $this->per_dpi = $data['per_dpi'] ?? '';
    }

    public static function buscarTropa()
    {
        $dependencia = $_SESSION['dep_llave'];

        $sql = "SELECT PER_CATALOGO AS CATALOGO, ORG_JERARQUIA, ORG_GRADO, GRA_DESC_CT AS GRADO, TRIM(NVL(PER_NOM1, '')) || ' ' || TRIM(NVL(PER_NOM2, '')) || ' ' || TRIM(NVL(PER_APE1, '')) || ' ' || TRIM(NVL(PER_APE2, '')) || ' ' || TRIM(NVL(PER_APE3, '')) AS NOMBRE_COMPLETO, ORG_PLAZA AS PLAZA, ORG_PLAZA_DESC AS EMPLEO, ORG_CEOM AS CEOM, PER_SITUACION AS SITUACION FROM MORG INNER JOIN GRADOS ON ORG_GRADO = GRA_CODIGO LEFT JOIN MPER ON ORG_PLAZA = PER_PLAZA LEFT JOIN MDEP ON DEP_LLAVE = ORG_DEPENDENCIA WHERE GRA_CLASE = 6 AND ORG_CEOM NOT IN ('TITULO') AND DEP_LLAVE = '$dependencia' ORDER BY ORG_PLAZA ASC;";

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
        $sql = "SELECT * FROM DEPMUN WHERE DM_CODIGO LIKE '" . $dep_mun . "%'";

        return self::fetchArray($sql);
    }

    public static function buscarMunicipiosResidencia($dep_mun)
    {
        $sql = "SELECT * FROM DEPMUN WHERE DM_CODIGO LIKE '" . $dep_mun . "%'";

        return self::fetchArray($sql);
    }

    public static function buscarMunicipiosNacimiento($dep_mun)
    {
        $sql = "SELECT * FROM DEPMUN WHERE DM_CODIGO LIKE '" . $dep_mun . "%'";

        return self::fetchArray($sql);
    }

    public static function buscarMunicipiosBen($dep_mun)
    {
        $sql = "SELECT * FROM DEPMUN WHERE DM_CODIGO LIKE '" . $dep_mun . "%'";

        return self::fetchArray($sql);
    }

    public static function verificarDpi($dpi)
    {
        $sql = "SELECT 
                    PER_CATALOGO AS PER_CATALOGO,
                    TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO,
                    SIT_DESC_LG AS SITUACION,
                    PER_SITUACION,
                    TRIM(PER_NOM1) AS PER_NOM1,
                    TRIM(PER_NOM2) AS PER_NOM2,
                    TRIM(PER_NOM3) AS PER_NOM3,
                    TRIM(PER_APE1) AS PER_APE1,
                    TRIM(PER_APE2) AS PER_APE2,
                    TRIM(PER_DPI) AS PER_DPI,
                    TRIM(PER_SANGRE) AS PER_SANGRE,
                    TRIM(PER_DIRECCION) AS PER_DIRECCION,
                    PER_ZONA AS PER_ZONA,
                    TRIM(PER_SEXO) AS PER_SEXO,
                    PER_FEC_NAC
                FROM MPER 
                INNER JOIN SITUACIONES 
                    ON SIT_CODIGO = PER_SITUACION
                WHERE REPLACE(PER_DPI, ' ', '') = '$dpi';
";

        return self::fetchFirst($sql);
    }

    public static function generarCatalogo()
    {
        $sql = "SELECT (CAST(ASC_CATALOGO || '1' AS INTEGER) + 7) AS NUEVO_CATALOGO FROM ASIG_CAT WHERE ASC_TIPO = 'T'";

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

    public static function BuscarDatosMperOtros($catalogo){
        $sql = "select * from mper_otros where oper_catalogo = $catalogo";

        $resultado = self::fetchFirst($sql);

        return $resultado ? true : false;
    }

    public static function ObtenerMotivoBaja($motivo){
        $sql = "SELECT SIT_DESC_lG AS MOTIVO_BAJA FROM SITUACIONES WHERE SIT_CODIGO = '$motivo'";

        return self::fetchFirst($sql);
    }

    public static function DatosBajaUsuario($catalogo){
        $sql ="SELECT PER_GRADO, PER_ARMA, PER_FEC_NOMB FROM MPER WHERE PER_CATALOGO = $catalogo";

        return self::fetchFirst($sql);
    }

}
