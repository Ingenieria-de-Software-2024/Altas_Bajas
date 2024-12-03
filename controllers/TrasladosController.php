<?php

namespace Controllers;

use Exception;
use Model\Tropa;
use MVC\Router;
use Model\Traslados;
use Model\TropaMovimientos;
use PDOException;

class TrasladosController
{
    public static function index(Router $router)
    {
        $router->render('traslados/index', []);
    }


    public static function ObtenerDatosTraslados_1()
    {
        try {
            $catalogo = filter_var($_GET['catalogo'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO_1, PER_GRADO AS PER_GRADO_1, TRIM(GRA_DESC_CT) AS GRADO_1, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_1, PER_PLAZA AS PLAZA_1, PER_DESC_EMPLEO AS EMPLEO_1, PER_SITUACION AS  SITUACION_1, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

            $data = Traslados::fetchFirst($sql);
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

    public static function ObtenerDatosTraslados_2()
    {
        try {
            $catalogo = filter_var($_GET['catalogo'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO_2, PER_GRADO AS PER_GRADO_2, TRIM(GRA_DESC_CT) AS GRADO_2, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_2, PER_PLAZA AS PLAZA_2, PER_DESC_EMPLEO AS EMPLEO_2, PER_SITUACION AS  SITUACION_2, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

            $data = Traslados::fetchFirst($sql);
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

    public static function TrasladoAPI()
    {
       
        $catalogo_1 = filter_var($_POST['catalogo_1'], FILTER_SANITIZE_NUMBER_INT);
        $catalogo_2 = filter_var($_POST['catalogo_2'], FILTER_SANITIZE_NUMBER_INT);
        $plaza_1 = filter_var($_POST['plaza_1'], FILTER_SANITIZE_NUMBER_INT);
        $plaza_2 = filter_var($_POST['plaza_2'], FILTER_SANITIZE_NUMBER_INT);
        $grado_1 = filter_var($_POST['per_grado_1'], FILTER_SANITIZE_NUMBER_INT);
        $grado_2 = filter_var($_POST['per_grado_2'], FILTER_SANITIZE_NUMBER_INT);

        if (!$catalogo_1 || !$catalogo_2 || !$plaza_1 || !$plaza_2 || !$grado_1 || !$grado_2) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Datos incompletos o inválidos para realizar el traslado.',
            ]);
            return;
        }

        if ($catalogo_1 <= 0 || $catalogo_2 <= 0 || $plaza_1 <= 0 || $plaza_2 <= 0 || $grado_1 <= 0 || $grado_2 <= 0) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Los valores numéricos deben ser mayores a cero.',
            ]);
            return;
        }

        $usuario1 = [
            'catalogo' => $catalogo_1,
            'plaza' => $plaza_2,
            'grado' => $grado_2
        ];

        $usuario2 = [
            'catalogo' => $catalogo_2,
            'plaza' => $plaza_1,
            'grado' => $grado_1
        ];

        $usuarios = [$usuario1, $usuario2];

        try {

            $conexion = Traslados::getDB();
            $conexion->beginTransaction();

            $dependencia = $_SESSION['dep_llave'];
            $fecha_actual = date('Y-m-d');

            foreach ($usuarios as $usuario) {
     
                $datos_mper = Tropa::find($usuario['catalogo']);
                $datos_mper->sincronizar([
                    'per_plaza' => $usuario['plaza'],
                    'per_grado' => $usuario['grado'],
                ]);
                $datos_mper->actualizar();

                $datos_tropa_movimientos = new TropaMovimientos([
                    'mov_catalogo' => $usuario['catalogo'],
                    'mov_dependencia' => $dependencia,
                    'mov_accion' => 'TRAS',
                    'mov_fecha' => $fecha_actual,
                    'mov_situacion' => 1
                ]);
                $datos_tropa_movimientos->crear();
            }

            $conexion->commit();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Traslado efectuado exitosamente.',
            ]);
        } catch (PDOException $e) { 

            $conexion->rollBack();
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error en la base de datos.',
                'detalle' => $e->getMessage(),
            ]);
        } catch (Exception $e) { 

            $conexion->rollBack();
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al efectuar el traslado.',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
