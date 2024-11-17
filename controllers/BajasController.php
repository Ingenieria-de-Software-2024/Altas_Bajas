<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Bajas;

class BajasController
{
    public static function index(Router $router)
    {

        $motivos = Bajas::buscarMotivos();

        $router->render('bajas/index', [
            'motivos' => $motivos
        ]);
    }

    public static function buscarTropa()
    {
        try {
            $tropa = Bajas::buscarTropa();
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

    public static function obtenerDatos()
    {

        try {
            $plaza = filter_var($_GET['plaza'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO, TRIM(GRA_DESC_CT) AS GRADO, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO, PER_PLAZA AS PLAZA, PER_DESC_EMPLEO AS EMPLEO FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO WHERE PER_PLAZA = '$plaza'";

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
}
