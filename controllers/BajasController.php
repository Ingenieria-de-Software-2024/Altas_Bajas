<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Bajas;

class BajasController
{
    public static function index(Router $router){

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



}