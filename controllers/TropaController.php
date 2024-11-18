<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Tropa;

class TropaController
{
    public static function index(Router $router)
    {

        $departamentos = Tropa::buscarDepartamentos();

        $router->render('tropa/index', [
            'departamentos' => $departamentos
        ]);
    }

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
            $dpi = filter_var( $_GET['dpi'], FILTER_VALIDATE_INT);

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
}
