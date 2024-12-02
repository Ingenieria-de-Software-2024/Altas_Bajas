<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\AsigCat;
use Model\Dpue;
use Model\MperOtros;
use Model\Trasalados;
use Model\Traslados;
use Model\Tropa;
use Model\TropaBeneficiarios;
use Model\TropaMovimientos;

class TropaController
{
    public static function index(Router $router)
    {

        $departamentos = Tropa::buscarDepartamentos();
        $motivos = Tropa::buscarMotivoBaja();
        $parentescos = Tropa::buscarParentescos();

        $router->render('tropa/index', [
            'motivos' => $motivos,
            'departamentos' => $departamentos,
            'parentescos' => $parentescos
        ]);
    }

    // ALTAS

    public static function buscarMunicipios()
    {
        $codigo_municipio = $_GET['municipio'];

        $dep_mun = substr($codigo_municipio, 0, 2);

        try {
            $municipios = Tropa::buscarMunicipios($dep_mun);
            http_response_code(200);
            echo json_encode($municipios);
        } catch (Exception $e) {

            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarMunicipiosResidencia()
    {
        $codigo_municipio = $_GET['municipio'];

        $dep_mun = substr($codigo_municipio, 0, 2);

        try {
            $municipios = Tropa::buscarMunicipiosResidencia($dep_mun);
            http_response_code(200);
            echo json_encode($municipios);
        } catch (Exception $e) {

            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarMunicipiosNacimiento()
    {
        $codigo_municipio = $_GET['municipio'];

        $dep_mun = substr($codigo_municipio, 0, 2);

        try {
            $municipios = Tropa::buscarMunicipiosNacimiento($dep_mun);
            http_response_code(200);
            echo json_encode($municipios);
        } catch (Exception $e) {

            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarMunicipiosBen()
    {
        $codigo_municipio = $_GET['municipio'];

        $dep_mun = substr($codigo_municipio, 0, 2);

        try {
            $municipios = Tropa::buscarMunicipiosBen($dep_mun);
            http_response_code(200);
            echo json_encode($municipios);
        } catch (Exception $e) {

            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarTropa()
    {
        try {
            $tropa = Tropa::buscarTropa();
            http_response_code(200);
            echo json_encode($tropa);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function verificarDpi()
    {
        try {
            $dpi = filter_var($_GET['dpi'], FILTER_VALIDATE_INT);

            if (!$dpi) {
                http_response_code(400);
                echo json_encode([
                    'existe' => false,
                    'mensaje' => 'No se proporcionó un DPI válido'
                ]);
                return;
            }
            $existe = Tropa::verificarDpi($dpi);
            http_response_code(200);
            echo json_encode([
                'existe' => $existe
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al verificar el DPI',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function generarCatalogo()
    {
        try {

            $sql = "SELECT ASC_CATALOGO FROM ASIG_CAT WHERE ASC_TIPO = 'T'";
            $data = ActiveRecord::fetchFirst($sql);

            if ($data && isset($data['asc_catalogo'])) {

                $catalogo = (int)$data['asc_catalogo'];
                $numero_aleatorio = rand(0, 9);
                $catalogo_nuevo = (int)($catalogo . $numero_aleatorio);
                $catalogo_tabla_asig = $catalogo + 10;

                // Devolver la respuesta como JSON
                echo json_encode([
                    "mensaje" => "Éxito",
                    "codigo" => 1,
                    "catalogo_nuevo" => $catalogo_nuevo,
                    "catalogo_insertar" => $catalogo_tabla_asig
                ]);
            }
        } catch (Exception $e) {

            echo json_encode([
                "detalle" => $e->getMessage(),
                "mensaje" => "Error en la Base de Datos",
                "codigo" => 0,
            ]);
        }
    }

    public static function darAlta()
    {
        if (isset($_POST['beneficiarios'])) {
            $beneficiarios = json_decode($_POST['beneficiarios'], true);
        }

        // echo json_encode($per_catalogo);
        // return;

        $per_catalogo = htmlspecialchars($_POST['per_catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $per_grado = htmlspecialchars($_POST['per_grado']) ?? '';
        $per_nom1 = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_nom1'], 'UTF-8'))));
        $per_nom2 = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_nom2'], 'UTF-8'))));
        $per_nom3 = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_nom3'], 'UTF-8')))) ?? '';
        $per_ape1 = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_ape1'], 'UTF-8'))));
        $per_ape2 = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_ape2'], 'UTF-8'))));
        $per_fec_ext_ced = date('Y-m-d', strtotime(($_POST['per_fec_ext_ced'])));
        $per_ext_ced_lugar = htmlspecialchars($_POST['per_ext_ced_lugar']);
        $per_est_civil = htmlspecialchars($_POST['per_est_civil']);
        $per_direccion = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_direccion'], 'UTF-8'))));
        $per_zona = htmlspecialchars($_POST['per_zona']) ?? '';
        $per_dir_lugar = htmlspecialchars($_POST['per_dir_lugar']);
        $per_telefono = htmlspecialchars($_POST['per_telefono'], FILTER_SANITIZE_NUMBER_INT);
        $per_sexo = htmlspecialchars($_POST['per_sexo']);
        $per_fec_nac = date('Y-m-d', strtotime(($_POST['per_fec_nac'])));
        $per_nac_lugar = htmlspecialchars($_POST['per_nac_lugar']);
        $per_sangre = htmlspecialchars($_POST['per_sangre']);
        $per_plaza = filter_var($_POST['per_plaza'], FILTER_SANITIZE_NUMBER_INT);
        $per_desc_empleo = htmlspecialchars($_POST['per_desc_empleo']);
        $per_fec_nomb = date('Y-m-d', strtotime(($_POST['per_fec_nomb'])));
        $per_dpi = filter_var($_POST['per_dpi'], FILTER_SANITIZE_NUMBER_INT);
        $oper_nit = htmlspecialchars($_POST['oper_nit'], FILTER_SANITIZE_NUMBER_INT);
        $oper_correo_personal = filter_var($_POST['oper_correo_personal'], FILTER_SANITIZE_EMAIL);

        $catalogo_insertar = filter_var($_POST['catalogo_insertar'], FILTER_SANITIZE_NUMBER_INT);

        $org_jerarquia = filter_var($_POST['org_jerarquia'], FILTER_SANITIZE_NUMBER_INT);
        $org_ceom = filter_var($_POST['org_ceom'], FILTER_SANITIZE_NUMBER_INT);

        try {

            $conexion = Tropa::getDB();
            $conexion->beginTransaction();

            $datos_mper = new Tropa([
                'per_catalogo' => $per_catalogo,
                'per_nom1' => $per_nom1,
                'per_nom2' => $per_nom2,
                'per_nom3' => $per_nom3,
                'per_ape1' => $per_ape1,
                'per_ape2' => $per_ape2,
                'per_dpi' => $per_dpi,
                'per_plaza' => $per_plaza,
                'per_grado' => $per_grado,
                'per_arma' => 0,
                'per_fec_ext_ced' => $per_fec_ext_ced,
                'per_ext_ced_lugar' => $per_ext_ced_lugar,
                'per_est_civil' => $per_est_civil,
                'per_direccion' => $per_direccion,
                'per_zona' => $per_zona,
                'per_dir_lugar' => $per_dir_lugar,
                'per_telefono' => $per_telefono,
                'per_sexo' => $per_sexo,
                'per_fec_nac' => $per_fec_nac,
                'per_nac_lugar' => $per_nac_lugar,
                'per_sangre' => $per_sangre,
                'per_desc_empleo' => $per_desc_empleo,
                'per_fec_nomb' => $per_fec_nomb,
                'per_situacion' => 'T0',
                'per_bienal' => 0
            ]);

            $insertar_mper = $datos_mper->crear();

            if ($insertar_mper) {

                $datos_oper = new MperOtros([
                    'oper_catalogo' => $per_catalogo,
                    'oper_nit' => $oper_nit,
                    'oper_correo_personal' => $oper_correo_personal,
                    'oper_desc1' => '',
                    'oper_desc2' => '',
                    'oper_desc3' => ''
                ]);


                $insertar_oper = $datos_oper->crear();

                if ($insertar_oper) {

                    foreach ($beneficiarios as $datos) {

                        $datos_beneficiario = new TropaBeneficiarios([
                            'ben_catalogo' => $per_catalogo,
                            'ben_nombre' => $datos['nombre'],
                            'ben_direccion' => $datos['direccion'],
                            'ben_celular' => $datos['celular'],
                            'ben_parentesco' => $datos['parentesco'],
                            'ben_porcentaje' => $datos['porcentaje'],
                            'ben_situacion' => 1,
                            'ben_sexo' => $datos['sexo'],
                            'ben_estado_civil' => $datos['estadoCivil'],
                            'ben_fecha_nacimiento' => $datos['fechaNacimiento'],
                            'ben_depto_nacimiento' => $datos['departamentoNacimiento'],
                            'ben_mun_nacimiento' => $datos['municipioNacimiento'],
                            'ben_dpi' => $datos['dpi']
                        ]);


                        $insertar_tropa_beneficiarios = $datos_beneficiario->crear();
                    }

                    if ($insertar_tropa_beneficiarios) {
                        $catalogo = (int)$catalogo_insertar;

                        $update_asignacion_catalogo = AsigCat::UpdateAsignacionCatalogo($catalogo);

                        $per_dependnecia = $_SESSION['dep_llave'];

                        if ($update_asignacion_catalogo) {

                            $fecha_actual = date('Y-m-d');
                            $datos_dpue = new Dpue([

                                'pue_catalogo' => $per_catalogo,
                                'pue_grado' => $per_grado,
                                'pue_arma' => 0,
                                'pue_jerarquia' => $org_jerarquia,
                                'pue_dependencia' => $per_dependnecia,
                                'pue_plaza' => $per_plaza,
                                'pue_ceom' => $org_ceom,
                                'pue_desc' => $per_desc_empleo,
                                'pue_situacion' => 'T0',
                                'pue_fec_nomb' => $per_fec_nomb,
                                'pue_ord_gral' => 0,
                                'pue_punto_og' => 0,
                                'pue_fec_cese' => $fecha_actual

                            ]);

                            $insertar_dpue = $datos_dpue->crear();

                            if ($insertar_dpue) {


                                $datos_tropa_movimientos = new TropaMovimientos([

                                    'mov_catalogo' => $per_catalogo,
                                    'mov_dependencia' => $per_dependnecia,
                                    'mov_accion' => 'ASIG',
                                    'mov_fecha' => $fecha_actual,
                                    'mov_situacion' => 1
                                ]);

                                $insertar_tropa_movimientos = $datos_tropa_movimientos->crear();
                            }
                        }
                    }
                }
            }
            $conexion->commit();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Alta exitosa',
            ]);
        } catch (Exception $e) {

            $conexion->rollBack();
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar al Soldado',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    // BAJAS

    public static function obtenerDatosBajas()
    {
        try {
            $plaza = filter_var($_GET['plaza'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO_BAJA, TRIM(GRA_DESC_CT) AS GRADO_BAJA, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_BAJA, PER_PLAZA AS PLAZA_BAJA, PER_DESC_EMPLEO AS EMPLEO_BAJA FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO WHERE PER_PLAZA = '$plaza'";

            $data = ActiveRecord::fetchFirst($sql);
            echo json_encode([
                "mensaje" => "Exito",
                "codigo" => 1,
                'datos' => $data
            ]);
        } catch (Exception $e) {

            echo json_encode([
                "detalle" => $e->getMessage(),
                "mensaje" => "Error en la Base de Datos",
                "codigo" => 0,
            ]);
        }
    }


    //CORRECCIONES

    public static function obtenerDatosCorrecciones()
    {
        try {
            $correcciones = filter_var($_GET['catalogo'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO_CORRECCIONES, PER_NOM1 AS PRIMER_NOMBRE_CORRECCIONES, PER_NOM2 AS SEGUNDO_NOMBRE_CORRECCIONES, PER_NOM3 AS TERCER_NOMBRE_CORRECCIONES, PER_APE1 AS PRIMER_APELLIDO_CORRECCIONES, PER_APE2 AS SEGUNDO_APELLIDO_CORRECCIONES, PER_APE3 AS TERCER_APELLIDO_CORRECCIONES, PER_FEC_EXT_CED AS FECH_EXT_DPI_TROPA_CORRECCIONES, DM_DESC_LG AS DEPTO_EXTENCION_DPI_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_EXTENCION_DPI_CORRECCIONES, PER_DPI AS DPI_CORRECCIONES, PER_PLAZA AS PLAZA_CORRECCIONES, GRA_DESC_CT AS GRADO_CORRECCIONES, PER_DESC_EMPLEO AS EMPLEO_CORRECCIONES, PER_FEC_NOMB AS FECH_ALTA_CORRECCIONES, PER_EST_CIVIL AS ESTADO_CIVIL_CORRECCIONES, PER_SANGRE AS TIPO_SANGRE_CORRECCIONES, PER_DIRECCION AS DIRECCION_CORRECCIONES, PER_ZONA AS ZONA_CORRRECCION, DM_DESC_LG AS DEPTO_RESIDENCIA_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_RESIDENCIA_CORRECCIONES, PER_TELEFONO AS TELEFONO_CORRECCIONES, PER_SEXO AS SEXO_CORRECCIONES, PER_FEC_NAC AS FECH_NAC_CORRECCIONES, DM_DESC_LG AS DEPTO_NACIMIENTO_CORRECCIONES, DM_DESC_LG AS MUNICIPIO_NACIMIENTO_CORRECCIONES, OPER_NIT AS NIT_CORRECCIONES, OPER_CORREO_PERSONAL AS CORREO_CORRECCIONES, BEN_NOMBRE AS BEN_NOMBRE_CORRECCIONES, BEN_DPI AS DPI_BEN_CORRECCIONES, BEN_SEXO AS BEN_GENERO_CORRECCIONES, BEN_CELULAR AS TEL_BEN_CORRECCIONES, BEN_PARENTESCO AS PARENTESCO_CORRECCIONES, BEN_ESTADO_CIVIL AS BEN_EST_CIVIL_CORRECCIONES, BEN_FECHA_NACIMIENTO AS BEN_FECH_NACIMIENTO_CORRECCIONES, BEN_DEPTO_NACIMIENTO AS BEN_DEPTO_NACIMIENTO_CORRECCIONES, BEN_MUN_NACIMIENTO AS BEN_MUN_NACIMIENTO_CORRECCIONES, BEN_DIRECCION AS DIRECC_BEN_CORRECCIONES, SIT_DESC_CT AS SITUACION_CORRECCIONES, BEN_SITUACION AS SITUACION_BEN_CORRECCIONES FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO INNER JOIN DEPMUN ON PER_EXT_CED_LUGAR = DM_CODIGO INNER JOIN MPER_OTROS ON PER_CATALOGO = OPER_CATALOGO INNER JOIN TROPA_BENEFICIARIOS ON PER_CATALOGO = ben_nombre WHERE PER_CATALOGO = $correcciones";

            $data = ActiveRecord::fetchFirst($sql);
            echo json_encode([
                "mensaje" => "Exito",
                "codigo" => 1,
                'datos' => $data
            ]);
        } catch (Exception $e) {

            echo json_encode([
                "detalle" => $e->getMessage(),
                "mensaje" => "Error en la Base de Datos",
                "codigo" => 0,
            ]);
        }
    }


    public static function AltaReenganchado()
    {
        if (isset($_POST['beneficiarios'])) {
            $beneficiarios = json_decode($_POST['beneficiarios'], true);
        }

        $per_catalogo = htmlspecialchars($_POST['per_catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $per_grado = htmlspecialchars($_POST['per_grado']) ?? '';
        $per_fec_ext_ced = date('Y-m-d', strtotime(($_POST['per_fec_ext_ced'])));
        $per_ext_ced_lugar = htmlspecialchars($_POST['per_ext_ced_lugar']);
        $per_est_civil = htmlspecialchars($_POST['per_est_civil']);
        $per_direccion = htmlspecialchars(trim(mb_strtoupper(mb_convert_encoding($_POST['per_direccion'], 'UTF-8'))));
        $per_zona = htmlspecialchars($_POST['per_zona']) ?? '';
        $per_dir_lugar = htmlspecialchars($_POST['per_dir_lugar']);
        $per_telefono = htmlspecialchars($_POST['per_telefono'], FILTER_SANITIZE_NUMBER_INT);
        $per_plaza = filter_var($_POST['per_plaza'], FILTER_SANITIZE_NUMBER_INT);
        $per_desc_empleo = htmlspecialchars($_POST['per_desc_empleo']);
        $per_fec_nomb = date('Y-m-d', strtotime(($_POST['per_fec_nomb'])));
        $oper_nit = htmlspecialchars($_POST['oper_nit'], FILTER_SANITIZE_NUMBER_INT);
        $oper_correo_personal = filter_var($_POST['oper_correo_personal'], FILTER_SANITIZE_EMAIL);

        $org_jerarquia = filter_var($_POST['org_jerarquia'], FILTER_SANITIZE_NUMBER_INT);
        $org_ceom = filter_var($_POST['org_ceom'], FILTER_SANITIZE_NUMBER_INT);

        try {

            $conexion = Tropa::getDB();
            $conexion->beginTransaction();

            $datos_mper = Tropa::find($per_catalogo);
            $datos_mper->sincronizar([
                'per_plaza' => $per_plaza,
                'per_grado' => $per_grado,
                'per_arma' => 0,
                'per_fec_ext_ced' => $per_fec_ext_ced,
                'per_ext_ced_lugar' => $per_ext_ced_lugar,
                'per_est_civil' => $per_est_civil,
                'per_direccion' => $per_direccion,
                'per_zona' => $per_zona,
                'per_dir_lugar' => $per_dir_lugar,
                'per_telefono' => $per_telefono,
                'per_desc_empleo' => $per_desc_empleo,
                'per_situacion' => 'T0',
                'per_bienal' => 0
            ]);
            $datos_mper->actualizar();


            if ($datos_mper) {

                $Existe_oper = Tropa::BuscarDatosMperOtros($per_catalogo);

                if ($Existe_oper) {

                    $datos_oper = Tropa::find($per_catalogo);
                    $datos_oper->sincronizar([
                        'oper_catalogo' => $per_catalogo,
                        'oper_nit' => $oper_nit,
                        'oper_correo_personal' => $oper_correo_personal,
                        'oper_desc1' => '',
                        'oper_desc2' => '',
                        'oper_desc3' => ''
                    ]);
                    $datos_oper->actualizar();
                } else {
                    $datos_oper_crear = new MperOtros([
                        'oper_catalogo' => $per_catalogo,
                        'oper_nit' => $oper_nit,
                        'oper_correo_personal' => $oper_correo_personal,
                        'oper_desc1' => '',
                        'oper_desc2' => '',
                        'oper_desc3' => ''
                    ]);
                    $datos_oper = $datos_oper_crear->crear();
                }



                if ($datos_oper) {

                    foreach ($beneficiarios as $datos) {

                        $datos_beneficiario = new TropaBeneficiarios([
                            'ben_catalogo' => $per_catalogo,
                            'ben_nombre' => $datos['nombre'],
                            'ben_direccion' => $datos['direccion'],
                            'ben_celular' => $datos['celular'],
                            'ben_parentesco' => $datos['parentesco'],
                            'ben_porcentaje' => $datos['porcentaje'],
                            'ben_situacion' => 1,
                            'ben_sexo' => $datos['sexo'],
                            'ben_estado_civil' => $datos['estadoCivil'],
                            'ben_fecha_nacimiento' => $datos['fechaNacimiento'],
                            'ben_depto_nacimiento' => $datos['departamentoNacimiento'],
                            'ben_mun_nacimiento' => $datos['municipioNacimiento'],
                            'ben_dpi' => $datos['dpi']
                        ]);


                        $insertar_tropa_beneficiarios = $datos_beneficiario->crear();
                    }

                    if ($insertar_tropa_beneficiarios) {

                        $fecha_actual = date('Y-m-d');
                        $per_dependencia = $_SESSION['dep_llave'];
                        $datos_dpue = new Dpue([

                            'pue_catalogo' => $per_catalogo,
                            'pue_grado' => $per_grado,
                            'pue_arma' => 0,
                            'pue_jerarquia' => $org_jerarquia,
                            'pue_dependencia' => $per_dependencia,
                            'pue_plaza' => $per_plaza,
                            'pue_ceom' => $org_ceom,
                            'pue_desc' => $per_desc_empleo,
                            'pue_situacion' => 'T0',
                            'pue_fec_nomb' => $per_fec_nomb,
                            'pue_ord_gral' => 0,
                            'pue_punto_og' => 0,
                            'pue_fec_cese' => $fecha_actual

                        ]);

                        $insertar_dpue = $datos_dpue->crear();

                        if ($insertar_dpue) {

                            $datos_tropa_movimientos = new TropaMovimientos([

                                'mov_catalogo' => $per_catalogo,
                                'mov_dependencia' => $per_dependencia,
                                'mov_accion' => 'ASIG',
                                'mov_fecha' => $fecha_actual,
                                'mov_situacion' => 1
                            ]);

                            $insertar_tropa_movimientos = $datos_tropa_movimientos->crear();
                        }
                    }
                }
            };
            $conexion->commit();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Alta exitosa',
            ]);
        } catch (Exception $e) {

            $conexion->rollBack();
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar al Soldado',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function DarBajaAPI()
    {
        $catalogo = filter_var($_POST['catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $motivo_baja = htmlspecialchars($_POST['motivo_baja']);
        $fecha_baja = date('Y-m-d', strtotime($_POST['mov_fecha']));

        try {

            $conexion = Tropa::getDB();
            $conexion->beginTransaction();

            $baja_descripcion = Tropa::ObtenerMotivoBaja($motivo_baja);
            $descripcion_baja = $baja_descripcion['motivo_baja'];

            $datos_mper = Tropa::find($catalogo);
            $datos_mper->sincronizar([
                'per_plaza' => '9999',
                'per_desc_empleo' => $descripcion_baja,
                'per_situacion' => $motivo_baja
            ]);
            $datos_mper->actualizar();


            if ($datos_mper) {

                if ($datos_mper) {


                    $beneficiarios = Tropa::find($catalogo);
                    $beneficiarios->sincronizar([
                        'ben_situacion' => 0
                    ]);
                    $beneficiarios->actualizar();


                    if ($beneficiarios) {

                        $datos_baja = Tropa::DatosBajaUsuario($catalogo);
                        $per_grado = $datos_baja['per_grado'];
                        $per_arma = $datos_baja['per_arma'];
                        $per_fec_nomb = $datos_baja['per_fec_nomb'];

                        $datos_dpue = new Dpue([
                            'pue_catalogo' => $catalogo,
                            'pue_grado' => $per_grado,
                            'pue_arma' => $per_arma,
                            'pue_dependencia' => 999,
                            'pue_jerarquia' => 999,
                            'pue_plaza' => 9999,
                            'pue_ceom' => 'O99999',
                            'pue_desc' => $descripcion_baja,
                            'pue_situacion' => $motivo_baja,
                            'pue_fec_nomb' => $per_fec_nomb,
                            'pue_ord_gral' => 0,
                            'pue_punto_og' => 0,
                            'pue_fec_cese' => $fecha_baja
                        ]);

                        $insertar_dpue = $datos_dpue->crear();

                        if ($insertar_dpue) {

                            $dependencia = $_SESSION['dep_llave'];

                            $datos_tropa_movimientos = new TropaMovimientos([

                                'mov_catalogo' => $catalogo,
                                'mov_dependencia' => $dependencia,
                                'mov_accion' => $motivo_baja,
                                'mov_fecha' => $fecha_baja,
                                'mov_situacion' => 1
                            ]);

                            $insertar_tropa_movimientos = $datos_tropa_movimientos->crear();
                        }
                    }
                }
            };
            $conexion->commit();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Baja Exitosa',
            ]);
        } catch (Exception $e) {

            $conexion->rollBack();
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar al Soldado',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
