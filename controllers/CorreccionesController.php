<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Correcciones;

class CorreccionesController
{
    public static function index(Router $router){

        $departamentos = Correcciones::buscarDepartamentos();

        $router->render('correcciones/index', [

            'departamentos' => $departamentos 

        ]);
    }

    public static function buscarMunicipios()
    {
        $codigo_municipio = $_GET['municipio'];
        $dep_mun = substr($codigo_municipio, 0, 2);
        
        try {          
            $municipios = Correcciones::buscarMunicipios($dep_mun);
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
            $tropa = Correcciones::buscarTropa();
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