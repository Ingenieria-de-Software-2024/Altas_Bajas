<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Altas;

class AltasController
{
    public static function index(Router $router){

        $departamentos = Altas::buscarDepartamentos();

        $router->render('altas/index', [
            'departamentos' => $departamentos 
        ]);
    }

    public static function buscarMunicipios()
    {
        $codigo_municipio = $_GET['municipio'];
        $dep_mun = substr($codigo_municipio, 0, 2);
        
        try {          
            $municipios = Altas::buscarMunicipios($dep_mun);
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
            $tropa = Altas::buscarTropa();
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



}