<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\Traslados;

class TrasladosController
{
    public static function index(Router $router){
        $router->render('traslados/index', [
            
        ]);
    }


    public static function ObtenerDatosTraslados_1()
    {
        try {
            $catalogo = filter_var($_GET['catalogo'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "SELECT PER_CATALOGO AS CATALOGO_1, TRIM(GRA_DESC_CT) AS GRADO_1, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_1, PER_PLAZA AS PLAZA_1, PER_DESC_EMPLEO AS EMPLEO_1, PER_SITUACION AS  SITUACION_1, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

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

            $sql = "SELECT PER_CATALOGO AS CATALOGO_2, TRIM(GRA_DESC_CT) AS GRADO_2, TRIM(PER_NOM1) || ' ' || TRIM(PER_NOM2) || ' ' || TRIM(PER_APE1) || ' ' || TRIM(PER_APE2) AS NOMBRE_COMPLETO_2, PER_PLAZA AS PLAZA_2, PER_DESC_EMPLEO AS EMPLEO_2, PER_SITUACION AS  SITUACION_2, SIT_DESC_LG AS SITUACION FROM MPER INNER JOIN GRADOS ON PER_GRADO = GRA_CODIGO INNER JOIN SITUACIONES ON PER_SITUACION = SIT_CODIGO WHERE PER_CATALOGO = '$catalogo'";

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


}