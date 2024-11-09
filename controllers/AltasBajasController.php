<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\AltasBajas;

class AltasBajasController
{
    public static function index(Router $router){
        $router->render('altasbajas/index', []);
    }

    public static function buscarTropa()
    {
        try {
            // $sql = "SELECT PER_CATALOGO AS CATALOGO, 
            // GRA_DESC_CT AS GRADO, PER_APE1 || ' ' || PER_APE2 || ' ' || PER_NOM1 || ' ' || PER_NOM2 AS NOMBRE_COMPLETO, 
            // PER_PLAZA AS PLAZA, 
            // PER_DESC_EMPLEO AS EMPLEO, 
            // ORG_CEOM AS CEOM, 
            // DEP_DESC_LG AS DEPENDENCIA
            // FROM MPER 
            // INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO 
            // INNER JOIN MORG ON PER_PLAZA = ORG_PLAZA
            // INNER JOIN MDEP ON ORG_DEPENDENCIA = DEP_LLAVE
            // WHERE PER_CATALOGO = 6531396 AND PER_SITUACION IN ('11', 'TH', 'T0');";
            
            $tropa = AltasBajas::buscarTropa();
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